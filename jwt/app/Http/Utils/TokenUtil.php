<?php
namespace App\Http\Utils;

use App\Exceptions\MyDBException;
use App\Models\Token;
use App\Models\User;
use App\Http\Utils\EncrypUtil;
use Exception;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TokenUtil
{

	// 토큰 생성
	// @param User 입력
	// @return list [$accessToken, $refreshToken]
	public function createTokens(User $userInfo)
	{
		$accessToken = $this->createToken($userInfo, env('TOKEN_EXP_ACCESS')); // TTL : 유효?시간
		$refreshToken = $this->createToken($userInfo, env('TOKEN_EXP_REFRESH'));

		return [$accessToken, $refreshToken];
	}

	public function createToken(User $userInfo, int $ttl) // time to limit
	{
		$header = $this->makeTokenHeader();
		$payload = $this->makeTokenPayload($userInfo, $ttl);
		$signature = $this->makeTokenSignature($header, $payload);

		return $header . '.' . $payload . '.' . $signature;
	}

	protected function makeTokenHeader()
	{
		$arr = [
			'alg' => env('TOKEN_ALG'),
			'typ' => env('TOKEN_TYP'),
		];

		return EncrypUtil::base64UrlEncode(json_encode($arr));
	}

	/** 
	 * 토큰의 페이로드를 리턴
	 * 
	 * @param User $userInfo 유저정보
	 * @param int $ttl 초 단위
	 * @return string JSON
	 */
	protected function makeTokenPayload(User $userInfo, int $ttl)
	{
		$now = time();
		$arr = [
			'upk' => $userInfo->u_pk,
			'name' => $userInfo->u_name,
			'iat' => $now,
			'ttl' => $ttl,
			'ext' => $now + $ttl,
		];

		// Log::debug($arr);

		return EncrypUtil::base64UrlEncode(json_encode($arr));
	}

	/** 
	 * 토큰의 시그니쳐를 리턴
	 * 
	 * @param string $header base64UrlEncode된 헤더
	 * @param string $payload base64UrlEncode된
	 * @return string 시그니쳐
	 */
	protected function makeTokenSignature(string $header, string $payload)
	{
		return EncrypUtil::hashWithSalt(env('TOKEN_ALG'), $header . '.' . $payload . '.' . env('TOKEN_SECRET_KEY'), env('TOKEN_SALT_LENGTH'));
	}

	/** 
	 * 토큰 분리
	 * 
	 * @param string $token
	 * @return list header, payload, signature
	 */
	public function explodeToken(string $token)
	{
		$arrToken = explode('.', $token);

		return [$arrToken[0], $arrToken[1], $arrToken[2]];
	}

	/** 
	 * 토큰에서 페이로드의 특정 키의 값을 리턴
	 * 
	 * @param string $token
	 * @param string $key 페이로드 키
	 * @return string 페이로드 키에 해당하는 값
	 */
	public function getPayloadValueToKey(string $token, string $key)
	{
		list($header, $payload, $signature) = $this->explodeToken($token);
		$payloadDecoded = json_decode(EncrypUtil::base64UrlDecode($payload));
		if (is_null($payloadDecoded) || !isset($payloadDecoded->$key)) {
			throw new Exception('E05');
		}

		return $payloadDecoded->$key;
	}

	/** 
	 * 토큰체크 메소드
	 * 
	 * @param string|null $token Bearer
	 * @return boolean 같냐
	 */
	public function chkToken(string|null $token)
	// 토큰 안넣을 수도 있음
	{
		// 토큰 존재 유무
		if (empty($token)) {
			throw new Exception('E01');
		}

		// 시그니처 체크
		// 토큰 분리
		list($header, $payload, $signature) = $this->explodeToken($token);

		if (
			EncrypUtil::subStrSalt($signature, env('TOKEN_SALT_LENGTH'))
			!== EncrypUtil::subStrSalt($this->makeTokenSignature($header, $payload), env('TOKEN_SALT_LENGTH'))
		) {
			throw new Exception('E03');
		}
		;

		// 유효시간 체크
		if ($this->getPayloadValueToKey($token, 'ext') < time()) {
			throw new Exception('E02');
		}

		return true;
	}

	/** 
	 * 리프레시토큰체크 DB 저장
	 * 
	 * @param string $refreshToken 
	 * @return boolean 저장됐니
	 */
	public function upsertRefreshToken(string $refreshToken)
	{
		// 리플래쉬 토큰 DB 저장: Carbon::createFromTimestamp() => Unix시간으로 날짜생성
        $ext = Carbon::createFromTimestamp($this->getPayloadValueToKey($refreshToken, 'ext')); // now + ttl (second)

        try {
            DB::beginTransaction();

            Token::updateOrInsert( // upsert = insert OR update
                ['u_pk' => $this->getPayloadValueToKey($refreshToken, 'upk')], // ? insert : update
                [
                    't_rt' => $refreshToken,
                    't_ext' => $ext->format('Y-m-d H:i:s'),
                ],
            );

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('리프래쉬 토큰 저장 에러'.$e->getMessage());
            throw new MyDBException('E80');
        }
	}
}
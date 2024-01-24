<?php
namespace App\Http\Utils;

use App\Models\User;
use App\Http\Utils\EncrypUtil;
use Exception;
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

	public function makeTokenHeader()
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
	 * @return array 헤더 배열
	 */
	public function makeTokenPayload(User $userInfo, int $ttl)
	{
		$now = time();
		$arr = [
			'upk' => $userInfo->u_pk,
			'name' => $userInfo->u_name,
			'iat' => $now,
			'ttl' => $ttl,
			'ext' => $now + $ttl,
		];

		return EncrypUtil::base64UrlEncode(json_encode($arr));
	}

	/** 
	 * 토큰의 시그니쳐를 리턴
	 * 
	 * @param string $header base64UrlEncode된 헤더
	 * @param string $payload base64UrlEncode된
	 * @return string 시그니쳐
	 */
	public function makeTokenSignature(string $header, string $payload)
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
		Log::debug('$payloadDecoded');
		Log::debug([$payloadDecoded]);
		if(is_null($payloadDecoded) || !isset($payloadDecoded->$key)){
			throw new Exception('E05');
		}

		return $payloadDecoded->$key;
	}
}
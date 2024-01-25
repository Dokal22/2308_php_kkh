<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use App\Exceptions\MyDBException;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Token;
use App\Http\Utils\TokenUtil;

class AuthController extends Controller
{
    protected $tokenDI;

    // DI처리
    public function __construct(TokenUtil $tokenUtil)
    {
        $this->tokenDI = $tokenUtil;
    }

    /**
     * 로그인처리
     * 
     * @param Illuminate\Http\Request $request 리퀘스트 객체
     * @return string json 엑세스토큰, 쿠키httponly 리플래쉬토큰
     */
    public function login(Request $request)
    {
        // throw new MyDBException('E80');

        // DB 유저정보 획득
        $userInfo = User::where('u_id', $request->u_id)
            ->where('u_pw', $request->u_pw)
            ->first();

        // 유저정보 NULL 확인
        if (is_null($userInfo)) {
            throw new Exception('E20');
        }
        // 토큰생성
        list($accessToken, $refreshToken) = $this->tokenDI->createTokens($userInfo);

        // 리플레쉬 토큰 DB저장
        $this->tokenDI->upsertRefreshToken($refreshToken);

        // 리턴
        return response()->json([
            'access_token' => $accessToken,
        ], 200)->cookie('refresh_token', $refreshToken, env('TOKEN_EXP_REFRESH'));
    }

    /**
     * 엑세스 토큰 재발급
     * 
     * @param Illuminate\Http\Request $request 리퀘스트 객체
     * @return string json 엑세스토큰, 쿠키httponly 리플래쉬토큰
     */
    public function reisstoken(Request $request)
    {
        // 유저가 준게 정상인가
            // 리프레쉬 토큰 획득
            $cookieRefreshToken = $request->cookie('refresh_token');

            // 리프레쉬 토큰 체크
            $this->tokenDI->chkToken($cookieRefreshToken);

            // 페이로드에서 u_pk 획득
                // 나는 컨트롤러에서 에러 정리하는게 편할거 같기도
                // 쌤: 분리한 모듈에서 에러처리
            $u_pk = $this->tokenDI->getPayloadValueToKey($cookieRefreshToken, 'upk');

        // 토큰이 정상인지
            // DB 유저정보 획득
            $userInfo = User::where('u_pk',$u_pk)->first();

            // 유저 정보 획득 체크
            if(is_null($userInfo)){
                throw new Exception('E20');
            }

            // DB에 저장된 리프레쉬 토큰 검색
            $tokenInfo = Token::select('t_rt', 't_ext')
                ->where('u_pk',$u_pk)
                ->first();

            // 토큰 정보 획득 체크
            if(is_null($tokenInfo)){
                throw new Exception('E04');
            }

            // 토큰 유효기간 체크
            if(strtotime($tokenInfo->t_ext) < time()){ // strtotime: String -> time / time(): 현재
                throw new Exception('E02');
            }

            // 토큰 일치 체크
            if($cookieRefreshToken !== $tokenInfo->t_rt){
                throw new Exception('E03');
            }

        // 새 토큰 작성
            // 토큰을 새로 작성
            list($accessToken, $refreshToken) = $this->tokenDI->createTokens($userInfo);

            // 리플레쉬 토큰 DB저장
            $this->tokenDI->upsertRefreshToken($refreshToken);

            // 리턴
            return response()->json([
                'access_token' => $accessToken,
            ], 200)->cookie('refresh_token', $refreshToken, env('TOKEN_EXP_REFRESH'));
    }
}

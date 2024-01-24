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

        // 리플래쉬 토큰 DB 저장
        $ext = Carbon::createFromTimestamp($this->tokenDI->getPayloadValueToKey($refreshToken, 'ext'));

        try {
            DB::beginTransaction();

            // upsert = insert OR update
            Token::updateOrInsert(
                ['u_pk' => $this->tokenDI->getPayloadValueToKey($refreshToken, 'upk')],
                [
                    't_rt' => $refreshToken,
                    't_ext' => $ext->format('Y-m-d H:i:s'),
                ],
            );

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception('E80');
        }

        // 리턴
        return response()->json([
            'access_token' => $accessToken,
        ], 200)->cookie('refresh_token', $refreshToken, env('TOKEN_EXP_REFRESH'));
    }
}

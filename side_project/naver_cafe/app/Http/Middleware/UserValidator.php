<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UserValidator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        Log::debug("***************유저 유효성 체크 시작***************");

        // 항목 리스트
        $arrBaseKey = [
            "email",
            'user_id',
            "name",
            "user_pw",
            "passwordchk"
        ];

        // 유효성 체크 리스트
        $arrBaseValidation = [
            'email' => 'required|email|max:50',
            'user_id' => 'required|regex:/^[a-zA-Z][0-9a-zA-Z]{8,20}$/',
            'name' => 'required|regex:/^[a-zA-Z가-힣]+$/|min:2|max:50',
            'user_pw' => 'required',
            'passwordchk' => 'same:password'
        ];

        // request 파라미터
        $arrRequestParam = [];
        $arrRequest = $request->json()->all();
        foreach ($arrBaseKey as $val) {
            if (array_key_exists($val, $arrRequest)) {
                $arrRequestParam[$val] = $arrRequest[$val];
            } else {
                unset($arrBaseValidation[$val]);
            }
        }
        // $arrRequestParam = $request->all();
        Log::debug("리퀘스트 파라미터 획득", $arrRequestParam);
        Log::debug("유효성 페크 리스트 획득", $arrBaseValidation);

        // // 유효성 검사
        $validator = Validator::make($arrRequestParam, $arrBaseValidation);

        // 유효성에 안맞으면
        if ($validator->fails()) {
            return redirect('/' . $request->path())->withErrors($validator->errors());
        }

        Log::debug("***************유저 유효성 체크 종료***************");
        return $next($request);
    }
}

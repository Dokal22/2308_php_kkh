<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $e) {
        $errMsgList = $this->context();

        $errCode = array_key_exists($e->getMessage(), $errMsgList) ? $e->getMessage() : 'E99';
        return response()->json([
            'code'=>$errCode,
            'msg'=>$errMsgList[$errCode]['msg'],
        ], $errMsgList[$errCode]['status']);
    }

    /**
     * 에러 메세지 저장
     * 
     * @return Array 에러메세지 배열
     */
    public function context() {
        return [
            'E01' => ['status' => 500, 'msg' => 'DB 에러']
            ,'E99' => ['status' => 500, 'msg' => '시스템 이상']
        ];
    }
}

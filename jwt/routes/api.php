<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// 로그인(인증발급)
Route::post('auth/login', [AuthController::class, 'login']);

// 갱신요청
Route::get('auth', [AuthController::class, 'reisstoken']);

// 인증이 필요한 페이지
Route::middleware('my.token.auth')->get('boards', function () {
	return response()->json([
		'code' => '0',
		'msg' => '인증된 유저',
	]);
});
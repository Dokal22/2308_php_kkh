<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\UserController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('users')->group(function () {
    Route::get('/',[UserController::class,'index']); // 전체 조회
    Route::middleware('user_val')->post('/',[UserController::class,'store']); // 작성
    Route::put('/{id}',[UserController::class,'update']); // 수정
    Route::delete('/{id}',[UserController::class,'delete']); // 삭제
});

Route::prefix('boards')->group(function () { 
    Route::get('/',[ApiController::class,'index']); // 전체 조회
    Route::get('/{now_page}/{page_bt_limit}/{}',[ApiController::class,'index']); // 전체 조회
    Route::post('/',[ApiController::class,'store']); // 작성
    Route::put('/{id}',[ApiController::class,'update']); // 수정
    Route::delete('/{id}',[ApiController::class,'delete']); // 삭제
});
Route::get('/board',[ApiController::class,'index_one']); // 하나 조회
Route::get('/total/{cafe_number}',[ApiController::class,'index_total']); // 개수 조회
Route::get('/total/{cafe_number}/{board_type}',[ApiController::class,'index_total']); // 개수 조회
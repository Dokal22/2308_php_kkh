<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::prefix('boards')->group(function () { 
    Route::get('/',[ApiController::class,'index']); // 전체 조회
    Route::post('/',[ApiController::class,'store']); // 작성
    Route::put('/{id}',[ApiController::class,'update']); // 수정
    Route::delete('/{id}',[ApiController::class,'delete']); // 삭제
});
Route::get('/total',[ApiController::class,'index_total']); // 전체 조회
Route::get('/total/{board_type}',[ApiController::class,'index_total']); // 전체 조회
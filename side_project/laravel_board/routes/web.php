<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

// Route::resource('/user', UserController::class); // 확인용? 아님 저 밑에 있는거 쓴다는 명령인가
Route::get('/user/login', [UserController::class, 'loginget'])->name('user.loginget'); // 로그인 화면 이동
Route::post('/user/login', [UserController::class, 'loginpost'])->name('user.loginpost'); // 로그인 처리
Route::get('/user/registration', [UserController::class, 'registrationget'])->name('user.registrationget'); // 회원 가입 화면 이동
Route::post('/user/registration', [UserController::class, 'registrationpost'])->name('user.registrationpost'); // 회원 가입 처리
//   GET|HEAD        user ................... user.index › UserController@index  로그인 화면이동
//   GET|HEAD        user/{user}/edit ......... user.edit › UserController@edit  로그인 처리

//   POST            user ................... user.store › UserController@store  회원 가입 화면 이동
//   GET|HEAD        user/create .......... user.create › UserController@create  회원 가입 처리

//   GET|HEAD        user/{user} .............. user.show › UserController@show  회원 정보 화면 이동
//   PUT|PATCH       user/{user} .......... user.update › UserController@update  회원 정보 수정 처리

//   DELETE          user/{user} ........ user.destroy › UserController@destroy  회원 탈퇴 처리
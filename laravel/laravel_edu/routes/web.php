<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('welcome');
});

// ----------
// 라우트 정의
// ----------

// 문자열 리턴
Route::get('/hi', function () { // 콜백함수 == 클로저(객체 in php) // 따로 객체가 선언되나봄
    return 'ㅎㅇ빵가루.'; // 라라벨은 홑따옴 더 많이 씀
});

// 없는 뷰파일 리턴
Route::get('/myview', function () {
    return view('myview');
});

// -------------------------------
// HTTP 메소드 대응하는 라우터
// 여러 라우터에 해당될 경우 가장 마지막에 정의된 것이 실행
// -------------------------------

// get메소드로 home으로 접속했을 때 부르는 법
Route::get('/home', function () {
    return view('home');
});

// post 요청
Route::post('/home', function () {
    return 'post로 들어오록 해';
});

// put: @method('PUT') 필요
Route::put('/home', function () {
    return 'put으로 들어오록 해';
});

// delete 요청
Route::delete('/home', function () {
    return 'delete으로 들어오록 해';
});

// -----------------------
// 라우트에서 파라미터 제어
// -----------------------

// 쿼리 스트링에 파라미터가 세팅되서 요청이 올 때 파라미터 획득
Route::get('/query', function (Request $request) {
    return $request->id . ", " . $request->name;
}); // 얘는 변수 없어도 걍 됨

// url 세그먼트로 지정 파라미터 획득 : '/'뒤에 바로 숫자?
Route::get('/segment/{id}', function ($id) {
    return $id;
}); // 얘는 변수 없으면 안됨

// 2새 이상 url 세그먼트로 지정 파라미터 획득 : '/'뒤에 바로 숫자?
Route::get('/segment/{id}/{name}', function ($id, $name) {
    return $id . " : " . $name;
}); // 얘는 변수 하나 없으면 위에꺼 함

// 혼합가능
Route::get('/segment2/{id}/{name}', function ($id, Request $request) {
    return $id . " : " . $request->name;
});

// 기본값 설정
Route::get('/segment3/{id?}', function ($id = 'base') {
    return $id;
});

// ----------------------
// 라우트에 없는거 드가면?
// ----------------------
Route::fallback(function () {
    return '이곳은 공허일 뿐...';
});

// ------------------
// 라우트의 이름 지정
// ------------------
Route::get('/name', function () {
    return view('name');
});

Route::get('/name/home/php504/root', function () {
    return '어느 무명의 라우트...';
});

Route::get('/name/home/php504/user', function () {
    return '어느 유명의 라우트...';
})->name('name.user'); // 체이닝 기법 [참고: in JS|promise .then() .catch() <= 체이닝임]

// ------------------
// 컨트롤러
// ------------------
// 커맨드로 컨트롤러 생성 : php artisan make:controller 컨트롤러명
use App\Http\Controllers\TestController;
Route::get('/test', [TestController::class, 'index'])->name('test.index'); // 우리는 컨트롤러의 메소드를 부르고, 컨트롤러가 페이지 부르고

// 자동생성 명령어?
// php artisan make:controller 컴트롤명 --resource
use App\Http\Controllers\TaskController;
Route::resource('/task', TaskController::class); // 이거 하고 php artisan route:list이거 찍으면 ↓
//   GET|HEAD        task ..................................................... task.index › TaskController@index  
//   POST            task ..................................................... task.store › TaskController@store  
//   GET|HEAD        task/create ............................................ task.create › TaskController@create  
//   GET|HEAD        task/{task} ................................................ task.show › TaskController@show  
//   PUT|PATCH       task/{task} ............................................ task.update › TaskController@update  
//   DELETE          task/{task} .......................................... task.destroy › TaskController@destroy  
//   GET|HEAD        task/{task}/edit ........................................... task.edit › TaskController@edit  
//   GET|HEAD        test ..................................................... test.index › TestController@index
                                                                                                        // ↑옛날에 Route::get('/test', TestController@index) 일케 썼다고 함
//                                                                                                                                                                                                                
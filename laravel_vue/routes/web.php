<?php

use Illuminate\Support\Facades\Route;

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
    $data = ['name' => 'root', 'id' => 1];
    return view('welcome')->with('data', json_encode($data)); // 라라벨, 라우터에선 json으로 넘겨야 한다?
});

Route::get('/login', function () {
    $data = ['name' => 'login', 'id' => 1];
    return view('welcome')->with('data', json_encode($data));
});

Route::get('/board', function () {
    $data = ['name' => 'board', 'id' => 1];
    return view('welcome')->with('data', json_encode($data));
});

<?php

use Illuminate\Support\Facades\Route;
use App\Events\broadTest;

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

Route::get('/event', function() {
    event(new broadTest('안녕안녕'));
});

Route::get('/listen', function() {
    return view('listen');
});

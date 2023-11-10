<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function index(){
        return view("test")->with("name","미스터 존"); // with(변수선언, 값)
    }
}

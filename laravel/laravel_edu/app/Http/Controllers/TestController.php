<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    function index(){
        $a=7;
        $b= 8;
        function hamsu($a, $b){
            return $a*$b;
        }
        $result = hamsu($a, $b);
        return view("test")->with("correct",$result); // with(변수선언, 값)
    }
}

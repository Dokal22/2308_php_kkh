<?php

namespace controller;

class ParentsController {
    public function __construct($action) {

        // controller 메소드 호출
        $resultAction = $this->$action(); // => 자식에 있는 메소드 실행하는 코드
        
        // view 호출
        require_once($resultAction);
        exit();
    }
}
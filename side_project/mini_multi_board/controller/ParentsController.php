<?php

namespace controller;

class ParentsController {
    protected $controllerChkUrl;

    public function __construct($action) {
        // 뷰관련  체크 접속 url 셋팅
        $this->controllerChkUrl = $_GET["url"];

        // controller 메소드 호출
        $resultAction = $this->$action(); // => 자식에 있는 메소드 실행하는 코드
        
        // view 호출
        require_once($resultAction);
        exit();
    }
}
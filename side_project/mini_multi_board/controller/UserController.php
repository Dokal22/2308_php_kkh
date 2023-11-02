<?php

namespace controller;

class UserController extends ParentsController {
    // 로그인 페이지 이동
    protected function loginGet() { // 상속가능
        return "view/login.php"; // 리턴을 왜 부모한테 함??
    }

    // 회원가입 페이지 이동
    protected function registGet() { // 상속가능
        return "view/regist"._EXTENSION_PHP; // 리턴을 왜 부모한테 함??
    }

}
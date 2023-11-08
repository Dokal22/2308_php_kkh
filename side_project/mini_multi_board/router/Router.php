<?php
namespace router; // 다른 클래스랑 다르게 주는거

// 사용할 컨트롤러들 지정
use controller\UserController as UC;
use controller\BoardController as BC;

// 라우터 : 유저의 요청을 분석해서 해당 컨트롤러로 연결해주는 클래스
class Router {
    public function __construct() {
        // URL 규칙
        // 1. 회원 정보 관련 URL : 
        //      user/[해당기능]
        //      ex) 로그인 : 호스트/user/login
        //      ex) 회원가입 : 호스트/user/regist
        // 2. 게시판 관련 URL : 
        //      board/[해당기능]
        //      ex) 리스트 : 호스트/board/list
        //      ex) 수정 : 호스트/board/edit
        
        $url = $_GET["url"]; // 접속 URL 획득
        $method = $_SERVER["REQUEST_METHOD"]; // 메소드 획득

        if($url === "user/login") { // 스래쉬 앞에 있는게 클래스명
            if($method === "GET") {
                new UC("loginGet"); // new 클래스 뒤에 빈괄호는 construct 실행?
                        // 만일 자식에게 construct가 있을 경우 자식 먼저-> 부모
            } else {
                new UC("loginPost");
            }
        } else if($url === "user/logout") {
            if($method === "GET") {
                new UC("logoutGet");
            } 
        } else if($url === "user/regist") {
            if($method === "GET") {
                new UC("registGet");
            } else {
                new UC("registPost");
            }
        } else if($url === "user/idchk") {
            if($method === "GET") {
                new UC("idChkGet");
            }
        } else if($url === "board/list") {
            if($method === "GET") {
                new BC("listGet");
            }
        } else if($url === "board/add") {
            if($method === "GET") {
                // 처리 없음
            } else {
                new BC("addPost");
            }
        } else if($url === "board/detail") {
            if($method === "GET") {
                new BC("detailGet");
            }
        }

        echo "이상한url : ".$url; 
        exit();
    }
}

// 오버라이드 : 부모 클래스의 메소드를 (멤버X?)
//              -> 자식클래스에서 재정의 후 사용
<?php

namespace controller;

class ParentsController {
    protected $controllerChkUrl; // 헤더표시 제어용 문자열
    protected $arrErrorMsg = []; // 에러 메세지

    // 로그인 안하면 못가는 곳
    private $arrNeedAuth = [
        "board/list"
    ];

    public function __construct($action) { // 클래스 호출시 넣은 파라미터는 construct로
        // 뷰관련  체크 접속 url 셋팅
        $this->controllerChkUrl = $_GET["url"];

        // 세션 시작
        if(!isset($_SESSION)){
            session_start();
        }

        // 유저 로그인 및 권한 체크
        $this->chkAuthorization();

        // controller 메소드 호출
        $resultAction = $this->$action(); // => 자식에 있는 메소드 실행하는 코드
        
        // view 호출
        $this->callView($resultAction); // 자식들 반환값 자유분방한거 부모가 잡아주는게 편함
        exit();
    }

    // 유저 권한 체크용 메소드
    private function chkAuthorization() {
        $url = $_GET["url"];
        if( !isset($_SESSION["u_id"]) && in_array($url, $this->arrNeedAuth) ) {
            header("Location: /user/login");
            exit();
        }
    }

    // 뷰 호출용 메소드
    private function callView($path) {
        // view/list.php            <
        // Location: /board/list    < 이것들 고려
        if( strpos($path, "Location:") === 0 ) { //strpos : a가 b문자열에 있으면 a자리를 index(int)로 반환 / 없으면 false?
            header($path);
        } else {
            require_once($path);
        }
    }
}
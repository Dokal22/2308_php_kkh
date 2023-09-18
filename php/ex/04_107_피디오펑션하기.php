<?php
// 파일명, 기능, 버전, 날짜 등등~
// --------------------------------
// 함수명   : my_db_conn
// 기능     : 디비 커넥트
// 파라미터 : PDO &$conn
// 리턴     : 없음
function my_db_conn( &$conn ) {
    $db_host = "localhost"; // 127.50...
    $db_user = "root";
    $db_pw = "php504";
    $db_name = "employees";
    $db_charset = "utf8mb4";
    $db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

    $db_options = [ // 스태틱 호출 ::
        PDO::ATTR_EMULATE_PREPARES      => false // ?
        ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION // 에러나도 킵고잉
        ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC // 데이터를 배열화
    ];

    // PDO 클래스로 DB 연동
    $conn=new PDO($db_dns,$db_user,$db_pw,$db_options);
}

// function test1($a){
    
// };
// function test2(&$a){ // 펑션에서 변수를 생성하지 않고 메인으로 바로 입력, += 이거랑 비슷한 느낌인가

// };

// $str = "";


function db_destroy_conn(&$conn){
    $conn = null;
}
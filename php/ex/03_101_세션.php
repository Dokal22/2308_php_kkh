<?php


// 세션 : 데이터를 웹서버에 저장, 쿠키보다 보안성 좋음. 속도도 빠름; 캐시메모리에 저장됨

// 그래도 중요한 정보 넣지 말기







// 특정세션명으로 시작
session_name("login");



// 세션시작
session_start();
$_SESSION["green"] = "PHP"; // 세션 넣으면 쿠키가 같이 만들어놓고 비교하나보다
$_SESSION["green2"] = "JAVA";



// 특정 세션 삭제
// unset($_SESSION["green"]);




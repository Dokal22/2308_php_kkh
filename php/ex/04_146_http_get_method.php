<?php

// Get method
// https://www.google.com/mini_board/src/?page=2&num=10
// 프로토콜 /     도메인      /      패스      / 쿼리스트링, 파라미터

// 프로토콜 : 통신을 하기 위한 규약, 약속, 규칙
// 도메인 : 우리가 접속하고자 하는 서버의 ip 또는 별칭
// 패스 : 실행시키고자 하는 처리의 주소
// 쿼리스트링(파라미터) : get method로 통신할 때 유저가 보내주는 데이터

print_r($_GET);
// $arr = $_GET; 변경할꺼면 담아두고

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="/04_146_http_get_method.php/?page=2&num=10">test</a>
</body>
</html>

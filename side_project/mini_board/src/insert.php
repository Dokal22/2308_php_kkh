<?php

define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");





//post로 리퀘스트가 왔을 때 처리
$http_method=$_SERVER["REQUEST_METHOD"];
// var_dump($http_method);

if($http_method === "POST"){

    try{


        $arr_post = $_POST;
        $conn=null;



        if(!PDO_set($conn)){
            throw new Exception("DB error : PDO instance");
        }

        
        $conn->beginTransaction();


        // 값넣기
        if(!db_insert_boards($conn, $arr_post)){
            throw new Exception("인서트화긴\n");
        }


        $conn->commit(); // 잘 되믄 커밋


        header("Location: list.php"); // 다시 ~하는 명령어 주셈~
        exit; // 어차피 finally는 실행이 된다????


    } catch(Exception $e){

        $conn->rollback(); // 오류 복구야~
        echo $e->getMessage();
        exit;

    } finally {

        PDO_del($conn);

    }    
}











?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">

    <title>작성페이지</title>
</head>
<body>

    <?php
        require_once(FILE_HEADER);
    ?>
    <!-- 나중에 tr로 테이블 주면 css편할듯? -->

    <form action="/mini_board/src/insert.php" method="post">


        <label for="title">제목</label>
        <input type="text" name="title" id="title" size="30">

        <br>

        <label for="content">내용</label>
        <textarea type="txta" name="content" id="content" cols="32" rows="10"></textarea>

        <br>

        <button type="submit">작성</button>
        <a href="/mini_board/src/list.php">취소</a>


    </form>

</body>
</html>
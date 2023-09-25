<?php

define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
define("FILE_ASIDE", ROOT."aside.php");
define("FILE_FOOTER", ROOT."footer.php");
define("FILE_SEARCH", ROOT."search.php");
require_once(ROOT."lib/lib_db.php");



//post로 리퀘스트가 왔을 때 처리
$http_method=$_SERVER["REQUEST_METHOD"];
$ip = $_SERVER['REMOTE_ADDR'];// ip
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
        if(!db_insert_boards($conn, $arr_post, $ip)){
            throw new Exception("인서트화긴좀");
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

    <title>작성 페이지</title>
</head>
<body>
    <div class="baggat">
        <?php
            require_once(FILE_HEADER);
        ?>
        <!-- 나중에 tr로 테이블 주면 css편할듯? -->

        <div class="insert_top">
            <a href="">전체글보기</a>
            <a href="">이미지모아보기</a>
            <a href=""></a>
        </div>

        <form class="insert_form" action="/mini_board/src/insert.php" method="post">

            <div>
                <button type="submit">작성</button>
                <a href="/mini_board/src/list.php">취소</a>
            </div>

            <label for="title">제목</label>

            <div>
                <input type="text" name="title" id="title" size="30" placeholder="제목을 입력해주세요" required>
                <br>
                <textarea type="txta" name="content" id="content" cols="32" rows="10" placeholder="내용을 입력해주세요" required></textarea>
            </div>
            
        </form>
        <?php
            require_once(FILE_FOOTER);
        ?> 
    </div>
</body>
</html>
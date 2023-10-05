<?php
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
define("FILE_ASIDE", ROOT."aside.php");
define("FILE_FOOTER", ROOT."footer.php");
define("FILE_SEARCH", ROOT."search.php");
require_once(ROOT."lib/lib_db.php");

$err_msg = isset($_GET["err_msg"]) ? $_GET["err_msg"] : "";

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
        <div class="never_img"><a href="/mini_board/src/list.php/"><b>NEVER</b></a></div>
        <div class="header_flex">
                <a class="header_a" href="#">카페홈</a>
                <div class="sero"></div>
                <a class="header_a" href="#">이웃</a>
                <div class="sero"></div>
                <a class="header_a" href="#">가입카페</a>
                <div class="sero"></div>
                <a class="header_a" href="#">새글</a>
                <div class="sero"></div>
                <a class="header_a" href="#">내소식</a>
                <div class="sero"></div>
                <a class="header_a" href="#">채팅</a>
                <div class="sero"></div>
                <a class="header_a" href="#">나▼</a>
                <a class="header_a" href="#">💬</a>
                <a class="header_a" href="#">▦</a>
        </div>



        <header class="error">
            
                <!-- <h1>치얼쓰🍷</h1> -->

        </header>


        <!-- 나중에 tr로 테이블 주면 css편할듯? -->

        <p>죄송스 오류.</p>
        <p><?php echo $err_msg; ?></p>
        <a href="/mini_board/src/list.php">나가기</a>

        <?php
            require_once(FILE_FOOTER);
        ?> 
    </div>
</body>
</html>
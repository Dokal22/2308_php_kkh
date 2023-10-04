<?php

define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
define("FILE_ASIDE", ROOT."aside.php");
define("FILE_FOOTER", ROOT."footer.php");
define("FILE_SEARCH", ROOT."search.php");
require_once(ROOT."lib/lib_db.php");

$id="";
$result=[];
$conn=null;
$ip = $_SERVER['REMOTE_ADDR'];
$page_num=isset($_GET["page"]) ? $_GET["page"] : $_POST["page"];



try{
        
    if(!PDO_set($conn)){
        throw new Exception("DB error : PDO instance");
    }



    if(!isset($_GET["id"]) || $_GET["id"] === ""){
        throw new Exception("파라미터 에러임 : 없 아이디");
    }



    $id = $_GET["id"];


    $conn->beginTransaction();
    // 게시글 리스트 조회
    $result = db_select_boards_id($conn, $id);
    if($result === false){
        throw new Exception("DB error : SQL 확인점여");
    } else if(!(count($result) === 1)) {
        throw new Exception("DB error : 읎엉");
    }
    $conn->commit();


    $item=$result[0];

    
    // if($_COOKIE["myCookie"]!=$id){
    //     $_COOKIE["myCookie"]=$id;
    //     $conn->beginTransaction();
    //     if(!db_update_view_cnt($conn, $id)){
    //         throw new Exception("DB error : 업데이트 안됐음");
    //     }
    //     $conn->commit();
    // }
    $conn->beginTransaction();
    if(!db_update_view_cnt($conn, $id)){
        throw new Exception("DB error : 업데이트 안됐음");
    }
    $conn->commit();
    
    

} catch(Exception $e) {
    echo $e->getMessage(); // 예외발생 메세지 출력
    exit;
} finally {
    PDO_del($conn);
}


?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <title>상세 페이지</title>
</head>
<body>
    <div class="baggat">
        <?php
        // var_dump($_COOKIE["myCookie"]);
        // var_dump($cookie_rem);
            require_once(FILE_HEADER);
        ?>
        
        <form class="search" method="post" action="/mini_board/src/list.php">
        <!-- <form class="search" method="post" action="search.php"> -->
            <input type="text" name="search" id="search">
            <button type="submit" class="search">검색</button>
        </form>
        
        <main>
            <?php
                require_once(FILE_ASIDE);
            ?>

            <div class="detail_con">
                <!-- <colgroup>
                    <col width=10%>
                    <col width=90%>
                </colgroup> -->

                <div>
                    <div>
                        <a href="/mini_board/src/list.php">자유게시판 ></a>
                        <br>
                        <h3><?php echo $item["title"]; ?></h3>   
                    </div>
                    <div>
                        <a class="profile_detail" href=""></a>
                        <div class="after_profile_detail">
                            <div>
                                <span><?php echo $item["ip"]; ?></span> 
                                <span>수강생</span>
                                <a>+ 구독</a>
                                <a>1:1 채팅</a>
                            </div>
                            <div>
                                <span><?php echo substr($item["create_at"],0,16); ?></span>
                                <span>조회 <?php echo $item["view_cnt"]; ?></span>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                    <p><?php echo $item["content"]; ?></p>
                </div>
                    

                <div>
                    <?php
                    if($ip==$item["ip"]){
                    ?>
                        <a href="/mini_board/src/update.php/?id=<?php echo $id; ?>&page=<?php echo $page_num; ?>">수정</a>
                    <?php
                    } else {
                    ?>
                        <a href="" onclick="alert('같은 아이피가 아니면 수정할 수 없습니다!','아이피다름','width=100','height=100')">수정</a>
                    <?php
                    }
                    ?>
                    <a href="/mini_board/src/list.php/?page=<?php echo $page_num; ?>">목록</a>
                    <?php
                    if($ip==$item["ip"]){
                    ?>
                    <a href="/mini_board/src/delete.php/?page=<?php echo $page_num; ?>&id=<?php echo $id; ?>">삭제</a>
                    <?php
                    } else {
                    ?>
                    <a href="" onclick="alert('같은 아이피가 아니면 삭제할 수 없습니다!','아이피다름','width=100','height=100')">삭제</a>
                    <?php
                    }
                    ?>
                </div>

                <div class="super_ad">
                    파워링크 광고입니다.
                    <a href="">광고안내</a>
                    <p></p>
                    광고
                </div>

            </div>
        </main>
        <?php
            require_once(FILE_FOOTER);
        ?> 
    </div>
</body>
</html>
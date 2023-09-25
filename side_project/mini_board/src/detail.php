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
        throw new Exception("DB error : 아예 못불러왓음");
    } else if(!(count($result) === 1)) {
        throw new Exception("DB error : 먼가 불러오는 데이터 몇 개 빠진거 아임?");
    }
    $conn->commit();


    $item=$result[0];

    
    if($_COOKIE["myCookie"]!=$id){
        $_COOKIE["myCookie"]=$id;
        $conn->beginTransaction();
        if(!db_update_view_cnt($conn, $id)){
            throw new Exception("DB error : 업데이트 안됐음");
        }
        $conn->commit();
    }
    
    
    

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
        var_dump($_COOKIE["myCookie"]);
        var_dump($cookie_rem);
            require_once(FILE_HEADER);
        ?>

        <?php
            require_once(FILE_SEARCH);
        ?>

        <main>
            <?php
                require_once(FILE_ASIDE);
            ?>

            <div class="detail_con">
                <!-- <colgroup>
                    <col width=10%>
                    <col width=90%>
                </colgroup> -->

                <table>
                    <tr>
                        <th>글 번호</th>
                        <td><?php echo $item["id"]; ?></td>
                    </tr>
                    <tr>
                        <th>제목</th>
                        <td><?php echo $item["title"]; ?></td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td><?php echo $item["content"]; ?></td>
                    </tr>
                    <tr>
                        <th>작성일자</th>
                        <td><?php echo $item["create_at"]; ?></td>
                    </tr>
                </table>

                <div>
                    <?php
                    if($ip==$item["ip"]){
                    ?>
                        <a href="/mini_board/src/update.php/?id=<?php echo $id; ?>&page=<?php echo $page_num; ?>">수정</a>
                    <?php
                    } else {
                    ?>
                        <a href="" onclick="alert('url','name','width=100','height=100')">수정</a>
                    <?php
                    }
                    ?>
                    <a href="/mini_board/src/list.php/?page=<?php echo $page_num; ?>">목록</a>
                    <a href="#">삭제</a>
                </div>
            </div>
        </main>
        <?php
            require_once(FILE_FOOTER);
        ?> 
    </div>
</body>
</html>
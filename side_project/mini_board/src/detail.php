<?php

define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");

$id="";
$result=[];
$conn=null;
$page_num=$_GET["page"];

try{
        
    if(!PDO_set($conn)){
        throw new Exception("DB error : PDO instance");
    }



    if(!isset($_GET["id"]) || $_GET["id"] === ""){
        throw new Exception("파라미터 에러임 : 없 아이디");
    }



    $id = $_GET["id"];



    // 게시글 리스트 조회
    $result = db_select_boards_id($conn, $id);
    if($result === false){
        throw new Exception("DB error : 아예 못불러왓음");
    } else if(!count($result) === 1) {
        throw new Exception("DB error : 먼가 불러오는 데이터 몇 개 빠진거 아임?");
    }




    $item=$result[0];


    
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
    <?php
        require_once(FILE_HEADER);
    ?>
    <!-- 상세페이지 -->
    <!-- <br> -->
    <?php var_dump($result) ?>
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

    <a href="#">수정</a>
    <a href="/mini_board/src/list.php/?page=<?php echo $page_num; ?>">취소</a>
    <a href="#">삭제</a>

</body>
</html>
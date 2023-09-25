<?php

define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
define("FILE_ASIDE", ROOT."aside.php");
define("FILE_FOOTER", ROOT."footer.php");
define("FILE_SEARCH", ROOT."search.php");
require_once(ROOT."lib/lib_db.php");

$conn=null;

$http_method=$_SERVER["REQUEST_METHOD"];


$id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"];
$page_num=isset($_GET["page"]) ? $_GET["page"] : $_POST["page"];



try{
    if(!PDO_set($conn)){
        throw new Exception("DB error : PDO instance"); // 강제 예외
    }

    if($http_method === "GET"){ //12번 확인
        // $arr_param=[
        //     "id"=>$id
        // ];
        
        $result = db_select_boards_id($conn, $id);        
        if($result === false){
            throw new Exception("DB error : 아예 못불러왓음");
        } else if(!(count($result) === 1)) {
            throw new Exception("DB error : 먼가 불러오는 데이터 몇 개 빠진거 아임?, ".count($result));
        }
        $item=$result[0];

    } else { // if($http_method === "POST")
        $arr_param=[
            "id"=>$id
            ,"title"=>$_POST["title"]
            ,"content"=>$_POST["content"]
        ];



        $conn->beginTransaction();

        if(!db_update_boards_id($conn, $arr_param)){
            throw new Exception("DB error : 업데이트 안됐음");
        }

        $conn->commit();

        header("Location: detail.php/?id={$id}&page={$page_num}");// 바로 이동하는거
        exit;
        
    }


} catch(Exception $e) {
    if($http_method === "POST"){
        $conn->rollback();
    }
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

    <title>수정 페이지</title>
</head>
<body>
    <div class="baggat">
        <?php
            require_once(FILE_HEADER);
        ?>

        <form class="insert_form" action="/mini_board/src/update.php" method="post">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="page" value="<?php echo $page_num; ?>">
            <div>
                <button type="submit" href="/mini_board/src/detail.php/?page=<?php echo $page_num; ?>&id=<?php echo $id; ?>">수정확인</button>
                <a href="/mini_board/src/detail.php/?page=<?php echo $page_num; ?>&id=<?php echo $id; ?>">취소</a>
            </div>    
        
            <table>
                <tr>
                    <th>글 번호</th>
                    <td><?php echo $item["id"]; ?></td>
                </tr>
                <tr>
                    <th>제목</th>
                    <input type="text" name="title" value="<?php echo $item["title"] ?>">
                </tr>
                <tr>
                    <th>내용</th>
                    <textarea name="content" id="content" cols="30" rows="10"><?php echo $item["content"] ?></textarea>
                </tr>
                <tr>
                    <th>작성일자</th>
                    <td><?php echo $item["create_at"]; ?></td>
                </tr>
            </table>

            
        </form>

        <?php
            require_once(FILE_FOOTER);
        ?> 
    </div>
</body>
</html>
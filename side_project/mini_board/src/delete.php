<?php
//설명
define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
define("FILE_ASIDE", ROOT."aside.php");
define("FILE_FOOTER", ROOT."footer.php");
define("FILE_SEARCH", ROOT."search.php");
require_once(ROOT."lib/lib_db.php");

try{
    // 디비 접속
    $conn=null;
    if(!PDO_set($conn)){
        throw new Exception("DB error : PDO instance"); // 강제 예외
    } 

    $http_method=$_SERVER["REQUEST_METHOD"];
    
    if($http_method === "GET"){
        
        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        $page_num = isset($_GET["page"]) ? $_GET["page"] : "";

        $arr_err_msg=[];
        if($id===""){
            $arr_err_msg[]="Parameter Error: ID";
        }			
        if($page_num===""){
            $arr_err_msg[]="Parameter Error: PAGE";
        }	


        if(count($arr_err_msg)>=1){
            throw new Exception(implode("<br>",$arr_err_msg));
        }		

        $result = db_select_boards_id($conn, $id);
        if($result===false){
            throw new Exception("DB Error : Select id");
        }else if(count($result)!=1){
            throw new Exception("DB Error : Select id Count");
        }

        $item=$result[0];


    }else{// POST일 경우	
        	
        $id = isset($_POST["id"]) ? $_POST["id"] : "";
        $page_num = isset($_POST["page"]) ? $_POST["page"] : "";

        $arr_err_msg=[];
        if($id===""){
            $arr_err_msg[]="Parameter Error: ID";
        }			
        if($page_num===""){
            $arr_err_msg[]="Parameter Error: PAGE";
        }	


        if(count($arr_err_msg)>=1){
            throw new Exception(implode("<br>",$arr_err_msg));
        }
        
        $conn->beginTransaction();

        $result = db_delete_boards_id($conn, $id);											
        if(!$result){
            throw new Exception("DB error : 딜리트 안됐음");
        }

        $conn->commit();

        header("Location: list.php/?page={$page_num}");// 바로 이동하는거
        exit;

    }
} catch(Exception $e) {
    if($http_method==="POST"){
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
    <title>삭제 페이지</title>
</head>
<body>
    <div class="baggat">
        <?php
            require_once(FILE_HEADER);
        ?>
        <main>
            <?php
                require_once(FILE_ASIDE);
            ?>
            <div class="contents_delete">
                <table>
                    <caption>삭제 시 영구 복구 불가<br>정말로 삭제?</caption>
                    <tr>
                        <th>게시글 번호</th>
                        <td><?php echo $item["id"]; ?></td>
                    </tr>
                    <tr>
                        <th>작성일</th>
                        <td><?php echo $item["create_at"]; ?></td>
                    </tr>
                    <tr>
                        <th>제목</th>
                        <td><?php echo $item["title"]; ?></td>
                    </tr>
                    <tr>
                        <th>내용</th>
                        <td><?php echo $item["content"]; ?></td>
                    </tr>
                </table>
                <form action="/mini_board/src/delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="hidden" name="page" value="<?php echo $page_num ?>">
                    <input type="submit" class="img-button" value="동의">
                    <a href="/mini_board/src/detail.php/?page=<?php echo $page_num; ?>&id=<?php echo $id; ?>">취소</a>
                </form>
            </div>
        </main>
        
        <?php
            require_once(FILE_FOOTER);
        ?> 
    </div>
</body>
</html>
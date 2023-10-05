<?php

define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("ERROR_MSG_PARAM","%s은 필수사항입니다");
define("FILE_HEADER", ROOT."header.php");
define("FILE_ASIDE", ROOT."aside.php");
define("FILE_FOOTER", ROOT."footer.php");
define("FILE_SEARCH", ROOT."search.php");
require_once(ROOT."lib/lib_db.php");

$conn=null;
$arr_param=[];
$arr_err_msg=[];
$http_method=$_SERVER["REQUEST_METHOD"];


// $id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"];
// $page_num=isset($_GET["page"]) ? $_GET["page"] : $_POST["page"];



try{
    if(!PDO_set($conn)){
        throw new Exception("DB error : PDO instance"); // 강제 예외
    }

    if($http_method === "GET"){ //12번 확인
        // $arr_param=[
        //     "id"=>$id
        // ];
        
        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        $page_num=isset($_GET["page"]) ? $_GET["page"] : "";

        if($id === ""){
            $arr_err_msg[]=sprintf(ERROR_MSG_PARAM,"id");
        }
        if($page_num === ""){
            $arr_err_msg[]=sprintf(ERROR_MSG_PARAM,"page");
        }
        if(count($arr_err_msg) >= 1){
            throw new Exception(implode("<br>",$arr_err_msg));
        }

        $result = db_select_boards_id($conn, $id);        
        if($result === false){
            throw new Exception("DB error : 아예 못불러왓음");
        } else if(!(count($result) === 1)) {
            throw new Exception("DB error : 먼가 불러오는 데이터 몇 개 빠진거 아임?, ".count($result));
        }
        $item=$result[0];

    } else { // if($http_method === "POST")
        
        $id = isset($_POST["id"]) ? $_POST["id"] : "";
        $page_num=isset($_POST["page"]) ? $_POST["page"] : "";
        $title=isset($_POST["title"]) ? trim($_POST["title"]) : "";
        $content=isset($_POST["content"]) ? trim($_POST["content"]) : "";

        if($id === ""){
            $arr_err_msg[]=sprintf(ERROR_MSG_PARAM,"id");
        }
        if($page_num === ""){
            $arr_err_msg[]=sprintf(ERROR_MSG_PARAM,"page");
        }
        if(count($arr_err_msg) >= 1){
            throw new Exception(implode("<br>",$arr_err_msg));
        }
        if($title === ""){
            $arr_err_msg[]=sprintf(ERROR_MSG_PARAM,"title");
        }
        if($content === ""){
            $arr_err_msg[]=sprintf(ERROR_MSG_PARAM,"content");
        }

        $arr_param=[
            "id"=>$id
            ,"title"=>$title
            ,"content"=>$content
        ];

        if(count($arr_err_msg) === 0){
            $conn->beginTransaction();

            if(!db_update_boards_id($conn, $arr_param)){
                throw new Exception("DB error : 업데이트 안됐음");
            }

            $conn->commit();

            header("Location: /mini_board/src/detail.php/?id={$id}&page={$page_num}");// 바로 이동하는거
            exit;
        }
        
    }
    $result = db_select_boards_id($conn, $id);        
    if($result === false){
        throw new Exception("DB error : 아예 못불러왓음");
    } else if(!(count($result) === 1)) {
        throw new Exception("DB error : 먼가 불러오는 데이터 몇 개 빠진거 아임?, ".count($result));
    }
    $item=$result[0];

} catch(Exception $e) {
    if($http_method === "POST"){
        $conn->rollback();
    }
    // echo $e->getMessage(); // 예외발생 메세지 출력
    header("Location: /mini_board/src/error.php/?err_msg={$e->getMessage()}");
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

        <div class="insert_top">
            <a href="">전체글보기</a>
            <span>·</span>
            <a href="">이미지모아보기</a>
            <span>·</span>
            <a href="">카페태그보기</a>
        </div>
        <?php
            foreach($arr_err_msg as $val){
        ?>
                <p><?php echo $val ?></p>
        <?php
            }
        ?>
        <form class="insert_form" action="/mini_board/src/update.php" method="post">

            <div>
                <button type="submit" href="/mini_board/src/detail.php/?page=<?php echo $page_num; ?>&id=<?php echo $id; ?>"><b>등록</b></button>
                <a href="/mini_board/src/detail.php/?page=<?php echo $page_num; ?>&id=<?php echo $id; ?>">취소</a>
            </div>

            <h2>카페 글쓰기</h2>
            
            <div class="jaksung_up">
                <div class="jaksung">
                    <select name="" id="">
                        <option value="">자유게시판</option>
                    </select>
                    <select name="" id="" disabled='disabled'>
                        <option value="">말머리선택</option>
                    </select>
                    <br>
                    <?php if(isset($title)){ ?> <input type="text" name="title" id="title" size="30" value="<?php echo $title; ?>">
                    <?php }else{ ?><input type="text" name="title" id="title" size="30" value="<?php echo $item["title"]; ?>"><?php } ?>
                    <br>
                    <?php if(isset($content)){ ?>
                    <textarea name="content" id="content" cols="32" rows="10"><?php echo trim($content); ?></textarea>
                    <?php }else{ ?>
                    <textarea name="content" id="content" cols="32" rows="10"><?php echo trim($item["content"]); ?></textarea>
                    <?php } ?>
                </div>
                <div class="jaksung_inside">
                    <div>
                        <p>공개설정<span>></span></p>
                        <p>└  멤버공개</p>
                        <p>└  검색·네에버 서비스 공개</p>
                    </div>
                    <div>
                        <input type="checkbox" id=""  name="" checked="checked">
                        <label for="">댓글허용</label>
                        <br>
                        <input type="checkbox" id=""  name="" checked="checked">
                        <label for="">블로그·카페 공유 허용<span>?</span></label>
                        <br>
                        <input type="checkbox" id=""  name="" checked="checked">
                        <label for="">외부 공유 허용<span>?</span></label>
                        <br>
                        <input type="checkbox" id=""  name="" checked="checked">
                        <label for="">복사·저장 허용<span>?</span></label>
                        <br>
                        <input type="checkbox" id=""  name="">
                        <label for="">자동출처 사용<span>?</span></label>
                        <br>
                        <input type="checkbox" id=""  name="">
                        <label for="">CCL 사용<span>?</span></label>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <input type="hidden" name="page" value="<?php echo $page_num; ?>">
        </form>

        <?php
            require_once(FILE_FOOTER);
        ?> 
    </div>
</body>
</html>
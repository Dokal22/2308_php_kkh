<?php

define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("ERROR_MSG_PARAM","%s은 필수사항입니다");
define("FILE_HEADER", ROOT."header.php");
define("FILE_ASIDE", ROOT."aside.php");
define("FILE_FOOTER", ROOT."footer.php");
define("FILE_SEARCH", ROOT."search.php");
require_once(ROOT."lib/lib_db.php");



//post로 리퀘스트가 왔을 때 처리
$http_method=$_SERVER["REQUEST_METHOD"];
$ip = $_SERVER['REMOTE_ADDR'];// ip
$conn=null;
$arr_err_msg=[];
$title="";
$content="";
// var_dump($http_method);

if($http_method === "POST"){ // !is_numeric(변수) : 변수가 숫자가 아니면 참 (sql인셉션? 방어) 

    try{


        $arr_post = $_POST;

        //파라미터 획득
        $title=isset($_POST["title"])?trim($_POST["title"]):"";
        $content=isset($_POST["content"])?trim($_POST["content"]):"";

        if($title === ""){
            $arr_err_msg[]=sprintf(ERROR_MSG_PARAM,"제목");
        }
        if($content === ""){
            $arr_err_msg[]=sprintf(ERROR_MSG_PARAM,"내용");
        }
        // if(count($arr_err_msg) >= 1){
        //     throw new Exception(implode("<br>",$arr_err_msg));
        // }

        if(count($arr_err_msg) === 0){
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
        }

    } catch(Exception $e){

        // if($conn !== null){
            $conn->rollback(); // 오류 복구야~
        // }
        // echo $e->getMessage(); // 예외발생 메세지 출력
        header("Location: error.php/?err_msg={$e->getMessage()}");
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
        <form class="insert_form" action="/mini_board/src/insert.php" method="post">

            <div>
                <a href=""><b>임시등록</b> | <b>0</b></a>
                <button type="submit"><b>등록</b></button>
                <a href="/mini_board/src/list.php">취소</a>
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
                    <input type="text" name="title" id="title" size="30" placeholder="제목을 입력해주세요" value=""<?php echo $title; ?>>
                    <br>
                    <textarea name="content" id="content" cols="32" rows="10" placeholder="내용을 입력해주세요" ><?php echo $content; ?></textarea>
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
            
            
        </form>
        
        <?php
            require_once(FILE_FOOTER);
        ?> 
    </div>
</body>
</html>
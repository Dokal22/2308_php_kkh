<?php


define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
define("FILE_ASIDE", ROOT."aside.php");
define("FILE_FOOTER", ROOT."footer.php");
define("FILE_SEARCH", ROOT."search.php");
define("FILE_SECTION", ROOT."section.php");
require_once(ROOT."lib/lib_db.php");
// var_dump($_SERVER);




$list_cnt=5; // 한 페이지 최대 표시 수
$page_num=1; // 페이지 번호 초기화
$offset = 0;
$page_list=10; // 밑에 페이지이동버튼 개수
$ip = $_SERVER['REMOTE_ADDR'];// ip
$http_method=$_SERVER["REQUEST_METHOD"];
$page_name=$_SERVER["PHP_SELF"];
// $chk_detail=isset($_GET["test"]) ? $_GET["test"] : "update";


// setcookie("myCookie", "", time()+60, "/mini_board/src/");
// cookie.setDomain("192.168.0.157");
// setcookie("myCookie", "", time()+1);


try{
    $conn=null;
    // 디비 접속
    if(!PDO_set($conn)){
        throw new Exception("DB error : PDO instance"); // 강제 예외
    }

    
    $boards_cnt = db_select_boards_cnt($conn);
    if($boards_cnt === false){
        throw new Exception("DB Error : select count");
    }

    $max_page_num = ceil($boards_cnt / $list_cnt);









    if(isset($_GET["page"])){
        $page_num = $_GET["page"]; // 유저가 보내온 페이지 번호
    }
    $offset = ($page_num-1) * $list_cnt; // 오프셋 계산

    // DB 조회시 사용할 데이터 배열
    $arr_param=[
        "list_cnt"=>$list_cnt
        ,"offset"=>$offset
    ];

    // 게시글 리스트 조회
    $result = db_select_boards_paging($conn, $arr_param);
    if($result === false){
        throw new Exception("DB error : 셀렉트보드");
    }

    if($http_method === "POST"){

        $arr_post= $_POST;
        if($arr_post === false || count($arr_post) != 3){
            throw new Exception("DB error : 검색오류");
        }
        $result = db_search_boards_paging($conn, $arr_param, $arr_post);
        if(!$result){
            throw new Exception("DB error : 서치보드");
        }

        $boards_cnt = db_search_boards_cnt($conn, $arr_param, $arr_post);
        if($boards_cnt === false){
            throw new Exception("DB Error : select count");
        }

        $max_page_num = ceil($boards_cnt / $list_cnt);
    }
    

    // if(){
    //     $conn->beginTransaction();
    //     if(!db_update_view_cnt($conn, $id)){
    //         throw new Exception("DB error : 업데이트 안됐음");
    //     }
    //     $conn->commit();
    // }


} catch(Exception $e) {
    // echo $e->getMessage(); // 예외발생 메세지 출력
    header("Location: error.php/?err_msg={$e->getMessage()}");
    exit;
} finally {
    PDO_del($conn);
}

$prev_page_num = $page_num - 1;
if($prev_page_num === 0){
    $prev_page_num = 1;
}

$next_page_num = $page_num + 1;
if($next_page_num > $max_page_num){
    $next_page_num = $max_page_num;
}


// $a = db_select_boards_cnt($conn);

// var_dump($result);
?>



<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <title>리스트 페이지</title>
    <style>
        
    </style>
</head>
<body>
    <div class="baggat">
        <?php
        // var_dump($_POST);
        // var_dump($arr_post);
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

            <div class="contents">

                <h3>자유게시판</h3>
                <a href="" class="favorate">★</a>

                <form class="sort" method="post" action="list.php">
                    <a href="" class="sort_a">새글 구독</a>
                    <div class="slider"></div>
                    <!-- <input type="range" id="gudok" name="gudok" min="0" max="1" step="1" style="width:25px;"> -->
                    <a href="" class="sort_a">□ 공지 숨기기</a>
                    <div class="sero"></div>
                    <a href="" class="sort_a">▤</a>
                    <a href="" class="sort_a">▦</a>
                    <a href="" class="sort_a">📄</a>
                    <select name="gaeshick" id="gaeshick">
                        <button type="submit" value="" class="gaeshick"><option value="5">5개씩</option></button>
                        <button type="submit" value="" class="gaeshick"><option value="10">10개씩</option></button>
                        <option value="15"><button type="submit" value="" class="gaeshick">15개씩</button></option>
                        <option value="20"><button type="submit" value="" class="gaeshick">20개씩</button></option>
                        <option value="30"><button type="submit" value="" class="gaeshick">30개씩</button></option>
                        <option value="40"><button type="submit" value="" class="gaeshick">40개씩</button></option>
                        <option value="50"><button type="submit" value="" class="gaeshick">50개씩</button></option>
                    </select>
                    <!-- <details>
                        <summary>몇개씩</summary>
                        <ul class="gaeshick">
                            <li><a href="http://localhost/mini_board/src/list.php/?gaeshick=5">5개씩</a></li>
                            <li><a href="http://localhost/mini_board/src/list.php/?gaeshick=10">10개씩</a></li>
                            <li><a href="http://localhost/mini_board/src/list.php/?gaeshick=15">15개씩</a></li>
                            <li><a href="http://localhost/mini_board/src/list.php/?gaeshick=20">20개씩</a></li>
                            <li><a href="http://localhost/mini_board/src/list.php/?gaeshick=30">30개씩</a></li>
                            <li><a href="http://localhost/mini_board/src/list.php/?gaeshick=40">40개씩</a></li>
                            <li><a href="http://localhost/mini_board/src/list.php/?gaeshick=50">50개씩</a></li>
                        </ul>
                    </details> -->
                </form>

                <table>

                    <colgroup>
                        <col width=10%>
                        <col width=49%>
                        <col width=13%>
                        <col width=12%>
                        <col width=8%>
                        <col width=8%>
                    </colgroup>


                    <tr class="table-title">
                        <th>번호</th>
                        <th>제목</th>
                        <th>작성자</th>
                        <th>작성일자</th>
                        <th>조회</th>
                        <th>좋아요</th>
                    </tr>

                    
        
                    
                    <!-- if(count($result) === false){ -->
                    
                    <!-- <tr><td>검색조건에 맞는 게시글을 찾을 수 없습니다.</td></tr> -->
                    <?php
                    // } else{
                        foreach($result as $item){ ?>

                            <tr>
                                <td><?php echo $item["id"]; ?></td>
                                <td id="title">
                                    <a href="/mini_board/src/detail.php/?id=<?php echo $item["id"]; ?>&page=<?php echo $page_num; ?>">
                                    <?php echo $item["title"]; ?></a>
                                </td>
                                <td><?php echo $item["ip"]; ?></td>
                                <td>
                                    <?php
                                        if(date("Y-m-d") == substr($item["create_at"],0,10)){
                                            echo substr($item["create_at"],10,6);
                                        }
                                        else {echo substr($item["create_at"],0,10);}
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        echo $item["view_cnt"] ;
                                    ?>
                                </td>
                                <td>0</td>
                            </tr>

                    <?php 
                        }
                    // } 
                    ?>

                    
                </table>
                
                <a href="/mini_board/src/insert.php" id="insert" class="jagseong"><div class="pen">✏</div>글쓰기</a>
                <?php
                    require_once(FILE_SECTION);
                ?>
                </form>       
                <div class="whspac">               
                    <?php
                        require_once(FILE_SEARCH);              
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


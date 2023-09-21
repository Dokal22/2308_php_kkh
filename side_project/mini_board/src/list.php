<?php


define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
define("FILE_HEADER", ROOT."header.php");
require_once(ROOT."lib/lib_db.php");
// var_dump($_SERVER);



$conn=null;
// 디비 접속
    if(!PDO_set($conn)){
        echo "DB error : PDO instance";
        PDO_del($conn);
        exit;
    }



// $a = db_select_boards_cnt($conn);

// 페이징 처리
$list_cnt=5; // 한 페이지 최대 표시 수
// 총 게시글 수 검색
$boards_cnt = db_select_boards_cnt($conn);
    if($boards_cnt === false){
        echo "DB Error : select count";
        PDO_del($conn);
        exit;
    }
$max_page_num = ceil($boards_cnt / $list_cnt);



$page_num=1; // 페이지 번호 초기화
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
                if(!$result){
                    echo "DB error : 셀렉트보드";
                    PDO_del($conn);
                    exit;
                }




        // 이전버튼
        $prev_page_num = $page_num - 1;
            if($prev_page_num === 0){
                $prev_page_num = 1;
            }

        // 다음 버튼
        $next_page_num = $page_num + 1;
            if($next_page_num > $max_page_num){
                $next_page_num = $max_page_num;
            }





PDO_del($conn); // 디비 잘가
// var_dump($result);
?>



<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mini_board/src/css/common.css">
    <title>리스트 페이지</title>
</head>
<body>

    <?php
        require_once(FILE_HEADER);
    ?>

    <main>

        <table>

            <colgroup>
                <col width=10%>
                <col width=70%>
                <col width=20%>
            </colgroup>


            <tr class="table-title">
                <th>번호</th>
                <th>제목</th>
                <th>
                    작성일자 
                    <a href="/mini_board/src/insert.php" id="insert" class="page-btn">작성</a>
                </th>
                
            </tr>

            
 
            <?php foreach($result as $item){ ?>

                <tr>
                    <td><?php echo $item["id"]; ?></td>
                    <td><?php echo $item["title"]; ?></td>
                    <td><?php echo $item["create_at"]; ?></td>
                </tr>

            <?php } ?>

            
        </table>
        <section>

            <a class="page-btn" id="page-btn-L" href="http://localhost/mini_board/src/list.php/?page=<?php echo $prev_page_num ?>"></a>

            
                <?php
                // if($page_num%5==1){
                //     for($i=$page_num;$i<=$page_num+4;$i++){  
                $culc=(((ceil($page_num/5))-1)*5);
                $i=$culc+1;
                        for($i;$i<=$culc+5;$i++){
                            if($i>$max_page_num){
                            break;}
                ?>        
                    <a class="page-btn" id="page-btn" href="http://localhost/mini_board/src/list.php/?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                <?php
                }
                ?>



            <a class="page-btn" id="page-btn-R" href="http://localhost/mini_board/src/list.php/?page=<?php echo $next_page_num ?>"></a>

        </section>

        

    </main>

</body>
</html>


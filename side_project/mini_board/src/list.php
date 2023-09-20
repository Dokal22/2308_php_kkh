<?php


define("ROOT",$_SERVER["DOCUMENT_ROOT"]."/mini_board/src/");
require_once(ROOT."lib/lib_db.php");
// var_dump($_SERVER);



$conn=null;
// 디비 접속
if(!PDO_set($conn)){
    echo "DB error : PDO instance";
    exit;
}

// 게시글 리스트 조회
$result = db_select_boards_paging($conn);
if(!$result){
    echo "DB error : 셀렉트보드";
    exit;
}

PDO_del($conn); // 디비 잘가



var_dump($result);



?>


<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <title>리스트 페이지</title>
</head>
<body>

    <header>
       
        <h1>mini Board</h1>

    </header>

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
                <th>작성일자</th>
            </tr>
            <tr>
                <td>5</td>
                <td>오번게시글</td>
                <td>2023/09/20 14:50</td>
            </tr>
            <tr>
                <td>4</td>
                <td>사번게시글</td>
                <td>2023/09/20 13:50</td>
            </tr>
            <tr>
                <td>3</td>
                <td>삼번게시글</td>
                <td>2023/09/20 12:50</td>
            </tr>
            <tr>
                <td>2</td>
                <td>이번게시글</td>
                <td>2023/09/20 11:50</td>
            </tr>
            <tr>
                <td>1</td>
                <td>일번게시글</td>
                <td>2023/09/20 10:50</td>
            </tr>
        </table>
        <section>
            <a href="#">이전</a>
            <a href="#">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">4</a>
            <a href="#">5</a>
            <a href="#">다음</a>
        </section>
    </main>

</body>
</html>


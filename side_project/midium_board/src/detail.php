<?php

define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/midium_board/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib/lib.php");

$conn = null;
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$param["id"] = $id;

try {
    PDO_in($conn);

    $result = select_detail($conn, $param);
} catch(Exception $e) {
    $e->getMessage();
    exit;
} finally {
    PDO_out($conn);
}
// var_dump($result);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="/midium_board/src/css/common.css"> -->
    <title>상세</title>
</head>
<body class="vh-100">
    <?php require_once(FILE_HEADER); ?>

    <div class="d-flex flex-column justify-content-center h-100">
        <div class="container-md d-flex align-items-center"> <!--여기하다 말음-->
            <table class="table">
                <colgroup>
                    <col width="12.5%"/>
                    <col width="27.5%"/>
                    <col width="12.5%"/>
                    <col width="27.5%"/>
                </colgroup>
            <thead>
                <tr>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                <th class="table-secondary text-center" scope="row">제목</th>
                <td><?php echo $result[0]["title"]; ?></td>
                <th class="table-secondary text-center">글번호</th>
                <td><?php echo $result[0]["id"]; ?></td>
                </tr>
                <tr>
                <th class="table-secondary text-center" scope="row">작성일</th>
                <td><?php echo $result[0]["created_at"]; ?></td>
                <th class="table-secondary text-center">수정일</th>
                <td><?php echo $result[0]["modified_at"]; ?></td>
                </tr>
                <tr>
                <th class="table-secondary text-center" scope="row">내용</th>
                <td colspan="3"><?php echo $result[0]["contents"]; ?></td>
                </tr>
            </tbody>
            </table>
        </div>
        
        <nav aria-label="Page navigation example">
            <ul class="pagination d-flex justify-content-end me-5"> <!--d-flex justify-content-end me-5-->
                <li class="page-item">
                <a class="page-link" href="/midium_board/src/update.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">수정</a>
                </li>
                <li class="page-item">
                <a class="page-link" href="/midium_board/src/delete.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">삭제</a>
                </li>
                <li class="page-item">
                <a class="page-link" href="/midium_board/src/list.php/?page=<?php echo $page; ?>">취소</a>
                </li>
            </ul>
        </nav>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
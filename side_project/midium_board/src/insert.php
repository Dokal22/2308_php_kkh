<?php

define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/midium_board/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib/lib.php");

$conn = null;
$method = isset($_SERVER["REQUEST_METHOD"]) ? $_SERVER["REQUEST_METHOD"] : "";
$page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"];
$nowTime = new DateTime(date("Y-m-d"));

if($method === "POST"){
    $title = isset($_POST["title"]) ? trim($_POST["title"]) : "";
    $contents = isset($_POST["contents"]) ? trim($_POST["contents"]) : "";
    $param = [
        "title" => $title
        ,"contents" => $contents
    ];

    try {
        PDO_in($conn);

        $conn->beginTransaction();
            insert($conn, $param);
        $conn->commit();

        header("Location: list.php");
        exit;
    } catch(Exception $e) {
        if($conn !== null){
            $conn->rollBack();
        }
        $e->getMessage();
        exit;
    } finally {
        PDO_out($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="/midium_board/src/css/common.css"> -->
    <title>수정</title>
</head>
<body class="vh-100">
    <?php require_once(FILE_HEADER); ?>

    <div class="d-flex flex-column justify-content-center h-100">
        <form action="/midium_board/src/insert.php" method="post">
            <input type="text" name="page" value="<?php echo $page ?>" hidden>
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
                        <td>
                            <input type="text" name="title" style="width: 100%" require>
                        </td>
                        <th class="table-secondary text-center">글번호</th>
                        <td> - </td>
                        </tr>
                        <tr>
                        <th class="table-secondary text-center" scope="row">작성일</th>
                        <td><?php echo $nowTime->format("Y-m-d"); ?></td>
                        <th class="table-secondary text-center">수정일</th>
                        <td> - </td>
                        </tr>
                        <tr>
                        <th class="table-secondary text-center" scope="row">내용</th>
                        <td colspan="3">
                        <textarea name="contents" cols="80" rows="4" require></textarea>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <nav aria-label="Page navigation example">
                <ul class="pagination d-flex justify-content-end me-5"> <!--d-flex justify-content-end me-5-->
                    <li class="page-item">
                    <button type="submit" class="btn btn-primary">작성</button>
                    </li>
                    <li class="page-item">
                    <a class="page-link" href="/midium_board/src/list.php/?page=<?php echo $page; ?>">취소</a>
                    </li>
                </ul>
            </nav>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
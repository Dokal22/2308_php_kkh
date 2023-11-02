<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/midium_board/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib/lib.php");

$conn = null;
$method = isset($_SERVER["REQUEST_METHOD"]) ? $_SERVER["REQUEST_METHOD"] : "";
$page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"];

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
<body>
    <form action="/midium_board/src/insert.php" method="post">
        <input type="text" name="page" value="<?php $page ?>" hidden>
        <input type="text" name="title" placeholder="제목">
        <textarea name="contents" cols="30" rows="10" placeholder="내용"></textarea>
        <button type="submit">완료</button>
        <a href="/midium_board/src/list.php/?page=<?php echo $page; ?>">취소</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
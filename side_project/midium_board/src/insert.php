<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/midium_board/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib/lib.php");

$conn = null;
$method = isset($_SERVER["REQUEST_METHOD"]) ? $_SERVER["REQUEST_METHOD"] : "";

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

// var_dump($result);
// var_dump($_POST);
var_dump($param);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/midium_board/src/css/common.css">
    <title>수정</title>
</head>
<body>
    <form action="./insert.php" method="post">
        <input type="text" name="title" placeholder="제목">
        <textarea name="contents" cols="30" rows="10" placeholder="내용"></textarea>
        <button type="submit">완료</button>
        <a href="./list.php">취소</a>
    </form>
</body>
</html>
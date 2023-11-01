<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/midium_board/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib/lib.php");

$conn = null;
$method = isset($_SERVER["REQUEST_METHOD"]) ? $_SERVER["REQUEST_METHOD"] : "";
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$param_select["id"] = $id;



try {
    PDO_in($conn);

    if($method === "POST"){
        $title = isset($_POST["title"]) ? trim($_POST["title"]) : "";
        $contents = isset($_POST["contents"]) ? trim($_POST["contents"]) : "";
        $param_update = [
            "title" => $title
            ,"contents" => $contents
            ,"id" => $id
        ];
        
        $conn->beginTransaction();
            update($conn, $param_update);
        $conn->commit();

        header("Location: list.php");
    } else {
        $result = select_detail($conn, $param_select);
        $item = $result[0];
    }
} catch(Exception $e) {
    $e->getMessage();
    exit;
} finally {
    PDO_out($conn);
}

// var_dump($result);
// var_dump($_POST);
var_dump($param_update);
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
    <form action="/midium_board/src/update.php/?id=<?php echo $id; ?>" method="post">
        <input type="text" name="title" <?php if($method === "GET"){ ?>
            value="<?php echo $item["title"]; ?>"
            <?php } ?>>
        <textarea name="contents" cols="30" rows="10"><?php if($method === "GET"){echo $item["contents"];} ?></textarea>
        <button type="submit">완료</button>
        <a href="/midium_board/src/detail.php/?id=<?php echo $id; ?>">취소</a>
    </form>
</body>
</html>
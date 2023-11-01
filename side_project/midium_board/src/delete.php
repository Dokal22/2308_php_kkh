<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/midium_board/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib/lib.php");

$conn = null;
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$param["id"] = $id;

try {
    PDO_in($conn);

    if(isset($_POST["deleted_at"])){
        $conn->beginTransaction();
            $result = update_delete($conn, $param);
        $conn->commit();

        header("Location: list.php");
        exit;
    } else {
        $result = select_detail($conn, $param);
    }
} catch(Exception $e) {
    $e->getMessage();
    exit;
} finally {
    PDO_out($conn);
}
var_dump($result);
var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/midium_board/src/css/common.css">
    <title>상세</title>
</head>
<body>
    <p>삭제?</p>
    <form action="../delete.php/?id=<?php echo $id; ?>" method="post">
        <input type="text" name="deleted_at" value="1" hidden>
        <button type="submit">삭제</button>
        <a href="../detail.php/?id=<?php echo $id; ?>">취소</a>
    </form>
</body>
</html>
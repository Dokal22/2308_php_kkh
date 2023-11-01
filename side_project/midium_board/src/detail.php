<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/midium_board/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib/lib.php");

$conn = null;
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
var_dump($result);
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
    <a href="../update.php/?id=<?php echo $id; ?>">수정</a>
    <a href="../delete.php/?id=<?php echo $id; ?>">삭제</a>
    <a href="../list.php">취소</a>
</body>
</html>
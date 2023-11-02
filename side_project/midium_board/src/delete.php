<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/midium_board/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib/lib.php");

$conn = null;
$page = isset($_GET["page"]) ? $_GET["page"] : $_POST["page"];
$id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"];
$param["id"] = $id;

try {
    PDO_in($conn);

    if(isset($_POST["id"])){
        $conn->beginTransaction();
            $result = update_delete($conn, $param);
        $conn->commit();

        header("Location: list.php/?page=".$page);
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="/midium_board/src/css/common.css"> -->
    <title>상세</title>
</head>
<body>
    <p>삭제?</p>
    <form action="/midium_board/src/delete.php" method="post">
        <input type="text" name="page" value="<?php echo $page ?>" hidden>
        <input type="text" name="id" value="<?php echo $id ?>" hidden>
        <button type="submit">삭제</button>
        <a href="/midium_board/src/detail.php/?id=<?php echo $id; ?>&page=<?php echo $page; ?>">취소</a>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
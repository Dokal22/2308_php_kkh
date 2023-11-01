<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/midium_board/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib/lib.php");

$conn = null;

try {
    PDO_in($conn);

    $result = select_list($conn);
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
    <link rel="stylesheet" href="/midium_board/src/css/common.css">
    <title>리스트</title>
</head>
<body>
    <?php require_once(FILE_HEADER); ?>

    <?php foreach( $result as $item ) { ?>
              <a href="/midium_board/src/detail.php/?id=<?php echo $item["id"] ?>"><?php echo $item["id"] ?></a>
    <?php } ?>
</body>
</html>
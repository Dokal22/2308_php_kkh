<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/midium_board/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib/lib.php");

$conn = null;
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$one_page_cnt = 5;

try {
    PDO_in($conn);

    $result = select_list($conn);
    $list_cnt = count_list($conn);
    $page_cnt = ceil($list_cnt/$one_page_cnt);
} catch(Exception $e) {
    $e->getMessage();
    exit;
} finally {
    PDO_out($conn);
}
var_dump($page_cnt);
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
              <a href="./detail.php/?id=<?php echo $item["id"] ?>"><?php echo $item["id"] ?></a>
    <?php } ?>
    
    <?php $start_page = $page - ($page % $one_page_cnt); ?>
    <?php for($i=1;$i<=$one_page_cnt;$i++){ ?>
    <?php     if($start_page + $i > $page_cnt) { break; } ?>
              <a href="../list.php/?page=<?php echo $start_page + $i; ?>"><?php echo $start_page + $i; ?></a>
    <?php } ?>
    <a href="../list.php/?page=<?php echo $start_page + $one_page_cnt; ?>">다음</a>
    <a href="./insert.php">작성</a>
    <?php var_dump($start_page); ?>
</body>
</html>
<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/midium_board/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib/lib.php");

$conn = null;
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$one_page_cnt = 5;
$pl_cnt = 5;
$half_pl_offset = ceil($page / $pl_cnt);
$pl_offset = ($half_pl_offset - 1) * $pl_cnt;
$param_list = [
    "offset" => ($page - 1) * $one_page_cnt
    ,"limit" => $one_page_cnt
];

try {
    PDO_in($conn);

    $result = select_list($conn, $param_list);
    $list_cnt = count_list($conn);
    $page_cnt = ceil($list_cnt/$one_page_cnt);
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
    <title>리스트</title>
</head>
<body>
    <?php require_once(FILE_HEADER); ?>

    <?php foreach( $result as $item ) { ?>
              <a href="/midium_board/src/detail.php/?id=<?php echo $item["id"] ?>&page=<?php echo $page ?>"><?php echo $item["id"] ?>번</a>
    <?php } ?>
    
    <?php if($half_pl_offset > 1){ ?>
              <a href="/midium_board/src/list.php/?page=<?php echo $pl_offset; ?>">이전</a>
    <?php } ?>

    <?php for($i=1;$i<=$pl_cnt;$i++){ ?>
    <?php     if($pl_offset + $i > $page_cnt) { break; } ?>
              <a href="/midium_board/src/list.php/?page=<?php echo $pl_offset + $i; ?>"><?php echo $pl_offset + $i; ?></a>
    <?php } ?>

    <?php if($pl_offset + $pl_cnt < $page_cnt){ ?>
              <a href="/midium_board/src/list.php/?page=<?php echo $pl_offset + 6; ?>">다음</a>
    <?php } ?>

    <a href="/midium_board/src/insert.php/?page=<?php echo $page ?>">작성</a>
</body>
</html>
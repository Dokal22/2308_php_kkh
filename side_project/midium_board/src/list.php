<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/midium_board/src");
define("FILE_HEADER", ROOT."/header.php");
require_once(ROOT."/lib/lib.php");

$conn = null;
$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$one_page_cnt = 10;
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
// var_dump($result);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="/midium_board/src/css/common.css"> -->
    <title>리스트</title>
</head>
<body>
    <?php require_once(FILE_HEADER); ?>

    <table class="table table-striped w-75 mx-auto mt-5">
        <colgroup>
            <col width="10%"/>
            <col width="50%"/>
            <col width="20%"/>
            <col width="20%"/>
        </colgroup>
    <thead>
        <tr>
        <th scope="col">id</th>
        <th scope="col">제목</th>
        <th scope="col">작성일</th>
        <th scope="col">수정일</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach( $result as $item ) { ?>
              <tr>
              <th scope="row">
                <?php echo $item["id"] ?>
              </th>
              <td><a href="/midium_board/src/detail.php/?id=<?php echo $item["id"] ?>&page=<?php echo $page ?>">
              <?php echo $item["title"]; ?>
              </a></td>
              <td><?php echo $item["created_at"]; ?></td>
              <td><?php echo $item["modified_at"]; ?></td>
              </tr>              
    <?php } ?>
    </tbody>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination d-flex justify-content-end me-5"> <!--d-flex justify-content-end me-5-->
            <li class="page-item">
                <a class="page-link" href="/midium_board/src/insert.php/?page=<?php echo $page ?>">작성</a>
            </li>
        </ul>
    </nav>

    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <?php if($half_pl_offset > 1){ ?>
                <li class="page-item"><a class="page-link" href="/midium_board/src/list.php/?page=<?php echo $pl_offset; ?>">이전</a></li>
            <?php } ?>

            <?php for($i=1;$i<=$pl_cnt;$i++){ ?>
            <?php     if($pl_offset + $i > $page_cnt) { break; } ?>
                <li class="page-item"><a class="page-link" href="/midium_board/src/list.php/?page=<?php echo $pl_offset + $i; ?>"><?php echo $pl_offset + $i; ?></a></li>
            <?php } ?>
            
            <?php if($pl_offset + $pl_cnt < $page_cnt){ ?>
                <li class="page-item"><a class="page-link" href="/midium_board/src/list.php/?page=<?php echo $pl_offset + 6; ?>">다음</a></li>
            <?php } ?>
        </ul>
    </nav>   

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
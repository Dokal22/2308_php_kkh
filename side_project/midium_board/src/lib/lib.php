<?php
function PDO_in(&$conn) {
    $host = "localhost";
    $user = "root";
    $name = "midium_board";
    $pw = "php504";
    $charset = "utf8mb4";
    $dns = "mysql:host=".$host.";dbname=".$name.";charset=".$charset;

    $option = [
        PDO::ATTR_EMULATE_PREPARES => false
        ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    try {
        $conn = new PDO($dns,$user,$pw,$option);
        // echo "연결 됨";
        return true;
    } catch(Exception $e) {
        $conn = null;
        // echo "연결안됨";
        return false;
    }
}

function PDO_out(&$conn) {
    $conn = null;
}

function select_list($conn) {
    $sql =
    " SELECT "
    ."     * "
    ." FROM "
    ."     board "
    // ." WHERE "
    // ."     deleted_at IS NULL "
    ;

    try {
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll();
        
        return $result;
    } catch(Exception $e) {
        echo $e->getMessage();
        return false;
    }
}
?>
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
    ." WHERE "
    ."     deleted_at IS NULL "
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

function count_list($conn) {
    $sql =
    " SELECT "
    ."     COUNT(id) cnt "
    ." FROM "
    ."     board "
    ." WHERE "
    ."     deleted_at IS NULL "
    ;

    try {
        $stmt = $conn->query($sql);
        $result = $stmt->fetchAll();
        
        return (int)$result[0]["cnt"];
    } catch(Exception $e) {
        echo $e->getMessage();
        return false;
    }
}

function select_detail($conn, $param) {
    $sql =
    " SELECT "
    ."     * "
    ." FROM "
    ."     board "
    ." WHERE "
    ."     deleted_at IS NULL "
    ."   and "
    ."     id = :id "
    ;

    $execute = [
        ":id" => $param["id"]
    ];

    try {
        $stmt = $conn->prepare($sql);
        $stmt->execute($execute);
        $result = $stmt->fetchAll();
        
        return $result;
    } catch(Exception $e) {
        echo $e->getMessage();
        return false;
    }
}

function update($conn, $param) {
    $sql =
    " UPDATE "
    ."     board "
    ." SET "
    ."     title = :title "
    ."     ,contents = :contents "
    ."     ,modified_at = NOW() "
    ." WHERE "
    ."     deleted_at IS NULL "
    ."   and "
    ."     id = :id "
    ;

    $execute = [
        ":title" => $param["title"]
        ,":contents" => $param["contents"]
        ,":id" => $param["id"]
    ];

    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($execute);
        
        return $result;
    } catch(Exception $e) {
        echo $e->getMessage();
        return false;
    }
}

function update_delete($conn, $param) {
    $sql =
    " UPDATE "
    ."     board "
    ." SET "
    ."     deleted_at = NOW() "
    ." WHERE "
    ."     deleted_at IS NULL "
    ."   and "
    ."     id = :id "
    ;

    $execute = [
        ":id" => $param["id"]
    ];

    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($execute);
        
        return $result;
    } catch(Exception $e) {
        echo $e->getMessage();
        return false;
    }
}

function insert($conn, $param) {
    $sql =
    " INSERT INTO board ( "
    ."     title "
    ."     ,contents "
    ."     ,created_at "
    ." ) VALUES ( "
    ."     :title "
    ."     ,:contents "
    ."     ,NOW() "
    ." ) "
    ;

    $execute = [
        ":title" => $param["title"]
        ,":contents" => $param["contents"]
    ];

    try {
        $stmt = $conn->prepare($sql);
        $result = $stmt->execute($execute);
        
        return $result;
    } catch(Exception $e) {
        echo $e->getMessage();
        return false;
    }
}
?>
<?php

namespace model;

use PDO; // 그냥 쓰면 php에 있는거
use Exception;

class ParentsModel {
    protected $conn;

    // 생성자?
    public function __construct() {
        $db_dns="mysql:host="._DB_HOST.";dbname="._DB_NAME.";charset="._DB_CHARSET;


        try {
            $db_option=[
                PDO::ATTR_EMULATE_PREPARES => false // Preppared Statement 를 데이터베이스가 지원 하지 않을 경우 에뮬레이션 하는 기능
                ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];

            // PDO class로 연동
            $this->conn = new PDO($db_dns,_DB_USER,_DB_PW,$db_option);
        }
        catch (Exception $e){
            echo "DB Connect Error: ".$e->getMessage();
            exit();
        }
    }

    // DB 파기
    public function destroy() {
        $this->conn = null; // 원래 해주는데 연습?
    }

    // beginTransaction
    public function beginTransaction() {
        $this->conn->beginTransaction();
    }

    // commit
    public function commit() {
        $this->conn->commit();
    }

    // rollBack
    public function rollBack() {
        $this->conn->rollBack();
    }
}
<?php

namespace model;

class BoardModel extends ParentsModel
{
    public function getBoardList($arrBoardInfo)
    {
        $sql =
            " SELECT "
            . "     id "
            . "     ,u_pk "
            . "     ,b_title "
            . "     ,b_content "
            . "     ,b_img "
            . "     ,created_at "
            . "     ,updated_at "
            . " FROM board "
            . " WHERE "
            . "     b_type = :b_type "
            . "   AND "
            . "     deleted_at IS NULL "
            . " ORDER BY "
            . "     id DESC "
        ;

        $prepare = [
            ":b_type" => $arrBoardInfo["b_type"]
        ];

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $e) {
            echo "BoardModel->getBoardList Error: " . $e->getMessage();
            exit();
        }
    }

    // 작성글 인서트
    public function addBoard($arrAddBoardInfo)
    {
        $sql =
            " INSERT INTO board ( "
            . "     u_pk "
            . "     ,b_type "
            . "     ,b_title "
            . "     ,b_content "
            . "     ,b_img "
            . " ) VALUES ( "
            . "     :u_pk "
            . "     ,:b_type "
            . "     ,:b_title "
            . "     ,:b_content "
            . "     ,:b_img "
            . " ) "
        ;

        $prepare = [
            ":u_pk" => $arrAddBoardInfo["u_pk"]
            ,
            ":b_type" => $arrAddBoardInfo["b_type"]
            ,
            ":b_title" => $arrAddBoardInfo["b_title"]
            ,
            ":b_content" => $arrAddBoardInfo["b_content"]
            ,
            ":b_img" => $arrAddBoardInfo["b_img"]
        ];

        try {
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute($prepare);
            return $result;
        } catch (Exception $e) {
            echo "BoardModel->addBoard Error: " . $e->getMessage();
            exit();
        }
    }

    public function getBoardDetail($arrBoardDetailInfo)
    {
        $sql =
            " SELECT "
            . "     id "
            . "     ,u_pk "
            . "     ,b_type "
            . "     ,b_title "
            . "     ,b_content "
            . "     ,b_img "
            . "     ,created_at "
            . "     ,updated_at "
            . " FROM board "
            . " WHERE "
            . "     id = :id "
        ;

        $prepare = [
            ":id" => $arrBoardDetailInfo["id"]
        ];

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($prepare);
            $result = $stmt->fetchAll();
            return $result;
        } catch (Exception $e) {
            echo "BoardModel->getBoardDetail Error: " . $e->getMessage();
            exit();
        }
    }

    public function setBoardUpdate($arrBoardDeleteInfo, $updateFlg = false)
    {
        $sql =
        " UPDATE board "
        . " SET "
        ;

        $sql_end =
        " WHERE "
        . "     id = :id "
        . "   AND "
        . "     u_pk = :u_pk "
        ;

        $prepare = [
            ":id" => $arrBoardDeleteInfo["id"]
            ,":u_pk" => $arrBoardDeleteInfo["u_pk"]
        ];

        if($updateFlg === true) {
            $sql .=
            "     b_type = :b_type "
            . "     b_title = :b_title "
            . "     b_content = :b_content "
            . "     b_img = :b_img "
            . "     updated_at = NOW() "
            ;

            $prepare2 = [
                ":b_type" => $arrBoardDeleteInfo["b_type"]
                ,":b_title" => $arrBoardDeleteInfo["b_title"]
                ,":b_content" => $arrBoardDeleteInfo["b_content"]
                ,":b_img" => $arrBoardDeleteInfo["b_img"]
            ];

            $prepare[] = $prepare2;

        } else {
            $sql .=
            "     deleted_at = NOW() "
            ;
        }
        
        try {
            $stmt = $this->conn->prepare($sql.$sql_end);
            $stmt->execute($prepare);
            $result = $stmt->rowCount(); // 레코드 개수 세기
            return $result; // 리턴 int
        } catch (Exception $e) {
            echo "BoardModel->getBoardDetail Error: " . $e->getMessage();
            exit();
        }
    }
}
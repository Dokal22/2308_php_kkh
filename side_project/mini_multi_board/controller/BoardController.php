<?php

namespace controller;

use model\BoardModel as BM;

class BoardController extends ParentsController {
    protected $arrBoardInfo;
    protected $titleBoardName;
    protected $boardType;
    
    // 게시판 리스트 페이지 이동
    protected function listGet() {
        // 파라미터 셋팅
        $b_type = isset($_GET["b_type"]) ? $_GET["b_type"] : "0";
        
        $arrBoardInfomation = [
            "b_type" => $b_type
        ];
        
        // 페이지의 제목 셋팅 + 페이지 당 타입 변수에 지정
        foreach($this->arrBoardNameInfo as $item) { // 반복할게 적어서 포이치 => 돌릴게 많으면 모델 새로 부르는게 나음
            if($item["b_type"] === $b_type) {
                $this->titleBoardName = $item["b_name"];
                $this->boardType = $item["b_type"];
                break;
            }
        }

        // 모델 인스턴스
        $boardModel = new BM();
        
        // board 리스트 획득
        $this->arrBoardInfo = $boardModel->getBoardList($arrBoardInfomation);
        
        // 사용 모델 파기
        $boardModel->destroy();

        return "view/list.php";
    }

    // 글 작성
    protected function addPost() {
        // 적성 데이터 작성
        $u_pk = $_SESSION["u_pk"];
        $b_type = $_POST["b_type"];
        $b_title = $_POST["b_title"];
        $b_content = $_POST["b_content"];
        $b_img = $_FILES["b_img"]["name"];

        $arrAddBoardInfo = [
            "u_pk" => $u_pk
            ,"b_type" => $b_type
            ,"b_title" => $b_title
            ,"b_content" => $b_content
            ,"b_img" => $b_img
        ];
        
        // 이미지 파일 저장
        move_uploaded_file($_FILES["b_img"]["tmp_name"], _PATH_USERIMG.$b_img);
        
        // 인서트 처리
        $boardModel = new BM();
        
        $boardModel->beginTransaction();
        $result = $boardModel->addBoard($arrAddBoardInfo);
        if($result !== true) {
            $boardModel->rollBack();
        } else {
            $boardModel->commit();
        }

        $boardModel->destroy();

        return "Location: /board/list?b_type=".$b_type;
    }
}
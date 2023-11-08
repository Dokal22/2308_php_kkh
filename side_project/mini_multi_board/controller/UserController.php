<?php

namespace controller;

use lib\Validation;
use model\UserModel as UM;
use lib\Validation as VD;

class UserController extends ParentsController
{
    // 로그인 페이지 이동
    protected function loginGet()
    { // 상속가능
        return "view/login.php"; // 리턴을 왜 부모한테 함??
    }

    // 로그인 처리 : 원래세션(관리자쿠키같은거)에서 처리한나봄
    protected function loginPost()
    { // 상속가능
        $inputData = [
            "u_id" => $_POST["u_id"]
            ,
            "u_pw" => $_POST["u_pw"]
        ];

        // 유효성 체크
        if (!VD::userChk($inputData)) {
            $this->arrErrorMsg = VD::getArrErrorMsg();
            return "view/login" . _EXTENSION_PHP;
        }

        // ID, PW 설정(DB에서 사용할 데이터 가공)
        $arrInput = [];
        $arrInput["u_id"] = $_POST["u_id"];
        $arrInput["u_pw"] = $this->encryptionPassword($_POST["u_pw"]);

        //유저 정보 획득
        $userModel = new UM();
        $resultUserInfo = $userModel->getUserInfo($arrInput, true);

        // 유저 유무 체크
        if (count($resultUserInfo) === 0) {
            $this->arrErrorMsg[] = "아이디와 비밀번호를 다시 확인해주세요.";
            // 로그인 페이지로 리턴
            return "view/login.php";
        }

        // 세션에 u_id 저장
        $_SESSION["u_pk"] = $resultUserInfo[0]["id"];

        return "Location: /board/list?b_type=0";
    }

    // 로그아웃 처리
    protected function logoutGet()
    {
        session_unset(); // 버전에 따라 destroy만 하면 남을 수도
        session_destroy();

        // 로그인 페이지 리턴
        return "Location: /user/login";
    }

    // 회원가입 페이지 이동
    protected function registGet()
    { // 상속가능
        return "view/regist" . _EXTENSION_PHP; // 리턴을 왜 부모한테 함??
    }

    protected function registPost()
    { // 상속가능
        $inputData = [
            "u_id" => $_POST["u_id"]
            ,
            "u_pw" => $_POST["u_pw"]
            ,
            "u_name" => $_POST["u_name"]
        ];

        $arrAddUserInfo = [
            "u_id" => $_POST["u_id"]
            ,
            "u_pw" => $this->encryptionPassword($_POST["u_pw"])
            ,
            "u_name" => $_POST["u_name"]
        ];

        // TODO: 아이디 중복 체크 필요

        // 유효성 체크
        if (!VD::userChk($inputData)) {
            $this->arrErrorMsg = VD::getArrErrorMsg();
            return "view/regist" . _EXTENSION_PHP;
        }

        //인서트 처리
        $userModel = new UM();
        $userModel->beginTransaction();
        $result = $userModel->addUserInfo($arrAddUserInfo);

        if ($result !== true) {
            $userModel->rollBack();
        } else {
            $userModel->commit();
        }
        $userModel->destroy();

        return "Location: /user/login";
    }

    protected function idChkGet()
    {
        $errFlg = "0";
        $errMsg = "";
        $u_id = $_GET["u_id"];

        $inputData["u_id"] = $u_id;

        // 유효성 체크
        if (!VD::userChk($inputData)) {
            $errFlg = "1";
            $errMsg = VD::getArrErrorMsg()[0];
        }

        // 모델 인스턴스
        $userModel = new UM();
        
        // idChk 결과 획득
        $result = $userModel->getUserInfo($inputData);
        
        // 사용 모델 파기
        $userModel->destroy();

        if(count($result) > 0) {
            $errFlg = "1";
            $errMsg = "중복된 아이디입니다.";
        }

        $response = [
            "errflg" => $errFlg
            ,"msg" => $errMsg
        ];

        // response 처리
        header('Content-type: application/json');
        echo json_encode($response); // 값을 출력해서 그냥 주는 듯
        exit();
    }

    // 비밀번호 암호화
    private function encryptionPassword($pw)
    {
        return base64_encode($pw);
    }

    // 비밀번호 머시기 할 예정
    private function encrrd($pw)
    {
        return base64_encode($pw);
    }
}
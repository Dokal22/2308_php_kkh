<?php

namespace lib;

class Validation
{
    private static $arrErrorMsg = []; //스태틱의 this => self

    // getter : 에러메세지 반환
    public static function getArrErrorMsg(){
        return self::$arrErrorMsg;
    }

    // setter : 에러메세지 저장
    public static function setArrErrorMsg($msg){ // 여러 클래스 가져올 때 멤버이름이 같을 경우를 대비한 고정 변수컨트롤
        self::$arrErrorMsg[]=$msg;
    }

    //유효성 체크 메소드
    public static function userChk(array $inputData): bool
    {
        $patternId = "/^[a-zA-Z0-9]{8,20}$/";
        $patternPw = "/^[a-zA-Z0-9!@]{8,20}$/";
        $patternName = "/^[a-zA-Z가-힣]{2,20}$/u";

        //아이디 체크
        if(array_key_exists("u_id", $inputData)){
            if (preg_match($patternId, $inputData["u_id"], $match) === 0) {
                $msg ="아이디는 숫자, 영어 대소문자를 포함하여 8~20자로 입력해주세요";
                self::setArrErrorMsg($msg);
            }
        }

        //비밀번호 체크
        if(array_key_exists("u_pw", $inputData)){
            if (preg_match($patternPw, $inputData["u_pw"], $match) === 0) {
                self::$arrErrorMsg[] = "비밀번호는 숫자, 영어 대소문자, !, @를 포함하여 8~20자로 입력해주세요";
            }
        }

        //이름 체크
        if(array_key_exists("u_name", $inputData)){
            if (preg_match($patternName, $inputData["u_name"], $match) === 0) {
                self::$arrErrorMsg[] = "이름은 한글, 영어 대소문자를 포함하여 2~50자로 입력해주세요";
            }
        }

        //리턴처리
        if(count(self::$arrErrorMsg)>0){
            return false;
        }

        return true;
    }
}
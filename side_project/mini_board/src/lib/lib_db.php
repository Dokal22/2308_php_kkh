<?php

function PDO_set(&$conn){
	$db_host="localhost";
	$db_user="root";
	$db_port="3306";
	$db_pw="php504";
	$db_name="mini_board";
	$db_charset="utf8mb4";
	$db_dns="mysql:host=".$db_host.";port=".$db_port.";dbname=".$db_name.";charset=".$db_charset;


    try {
        $db_option=[
            PDO::ATTR_EMULATE_PREPARES => false // Preppared Statement 를 데이터베이스가 지원 하지 않을 경우 에뮬레이션 하는 기능
            ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $conn=new PDO($db_dns,$db_user,$db_pw,$db_option);
        return true;
    }
    catch (Exception $e){
        $conn = null;
        return false;
    }
}

function PDO_del(&$conn){
	$conn=null;
}


// -----------------------------------------------------------
// 함수명 : db_select_boards_paging
// 기능 : boards paging 조회
// 파라미터 : PDO &$conn
// 리턴 : array / false
// -----------------------------------------------------------
function db_select_boards_paging($conn){

	try{
		$sql="
		select
			 id
			,title
			,create_at
		from 
			boards
		order by 
			id desc
	   ";	
		$arr_ps=[];

		$stmt=$conn->prepare($sql);
		$stmt->execute($arr_ps);
		$result=$stmt->fetchAll();

		return $result;

	} catch(Exception $e){
		return false;
	}
}
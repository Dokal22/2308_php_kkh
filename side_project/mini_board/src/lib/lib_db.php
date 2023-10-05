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
// 파라미터 : PDO   &$conn
//			 array &$arr_param 쿼리 작성용 배열
// 리턴 : array / false
// -----------------------------------------------------------
function db_select_boards_paging(&$conn, &$arr_param){

	try{
		$sql="
		 select
			 id
			 ,title
			 ,create_at
			 ,ip
			 ,view_cnt
			 ,favorate
		 from 
			 boards
			 ";
		$a="			 
		 where
		 	 delete_flg = 0
		 order by 
			 id desc
		 limit :list_cnt offset :offset
	   ";	
		$arr_ps=[
			":list_cnt" => $arr_param["list_cnt"]
			,":offset" => $arr_param["offset"]
		];

		$stmt=$conn->prepare($sql.$a);
		$stmt->execute($arr_ps);
		$result=$stmt->fetchAll();

		return $result;

	} catch(Exception $e){
		return false;
	}
}


// -----------------------------------------------------------
// 함수명 : db_select_bottom_list
// 기능 : boards paging 조회
// 파라미터 : PDO   &$conn
//			 array &$arr_param 쿼리 작성용 배열
// 리턴 : array / false
// -----------------------------------------------------------
function db_select_bottom_list(&$conn, &$arr_param){

	try{
		$sql="
		 select
			 id
			 ,title
			 ,create_at
			 ,ip
			 ,view_cnt
			 ,favorate
		 from 
			 boards
			 ";
		$a="			 
		 where
		 	 delete_flg = 0
		 order by 
			 id desc
		 limit :list_cnt offset :offset
	   ";	
		$arr_ps=[
			":list_cnt" => $arr_param["list_cnt"]
			,":offset" => $arr_param["offset"]
		];

		$stmt=$conn->prepare($sql.$a);
		$stmt->execute($arr_ps);
		$result=$stmt->fetchAll();

		return $result;

	} catch(Exception $e){
		return false;
	}
}




// -----------------------------------------------------------
// 함수명 : db_select_boards_cnt
// 기능 : boards paging 조회
// 파라미터 : PDO   &$conn
// 리턴 : int / false
// -----------------------------------------------------------
function db_select_boards_cnt(&$conn){

	
	$sql="
	 SELECT 
	 	 COUNT(id) cnt 
	 FROM 
	 	 boards
	 where
		 delete_flg = 0
	";	

	try{

		$stmt=$conn->query($sql);
		$result=$stmt->fetchAll();

		return (int)$result[0]["cnt"];

	} catch(Exception $e){
		return false;
	}
}



// -----------------------------------------------------------
// 함수명 : db_select_boards_cnt
// 기능 : boards paging 조회
// 파라미터 : PDO   &$conn
// 리턴 : int / false
// -----------------------------------------------------------
function db_more_than_me(&$conn, $id){

	
	$sql="
	 SELECT 
	 	 COUNT(id) cnt 
	 FROM 
	 	 boards
	 where
		 delete_flg = 0
		 and id > :id
	";	

	$arr_ps=[
		":id" => $id
	];

	try{

		$stmt=$conn->prepare($sql);
		$stmt->execute($arr_ps);
		$result=$stmt->fetchAll();

		return (int)$result[0]["cnt"];

	} catch(Exception $e){
		return false;
	}
}





// -----------------------------------------------------------
// 함수명 : db_insert_boards
// 기능 : boards 레코드 작성
// 파라미터 : PDO   &$conn   
//			 array  &$arr_param   쿼리작성용 배열 
// 리턴 : boolean
// -----------------------------------------------------------
function db_insert_boards(&$conn, &$arr_param, $ip){

	
	$sql="
	 insert into
		 boards (
			 title
			 ,content
			 ,ip
			 ) 
	 values (
		 :title
		 ,:content
		 ,:ip
		 )	
	";	
	
	$arr_ps=[
		":title" => $arr_param["title"]
		,":content" => $arr_param["content"]
		,":ip" => $ip
	];

	try{

		$stmt=$conn->prepare($sql);
		$result=$stmt->execute($arr_ps);

		return $result;

	} catch(Exception $e){
		echo $e->getMessage(); // Exception 메세지 출력
		return false;
	}
}


// -----------------------------------------------------------
// 함수명 : db_select_boards_id
// 기능 : 게시글 열기
// 파라미터 : PDO   &$conn   
//			 인트  &$id   쿼리용 
// 리턴 : boolean
// -----------------------------------------------------------
function db_select_boards_id(&$conn, $id){

	
	$sql="
	 select
		 id
		 ,title
		 ,content
		 ,create_at 
		 ,ip
		 ,view_cnt
		 ,favorate
	 from
		 boards
	 where
	 	 id = :id
	 and delete_flg = 0		 	
	";	
	
	$arr_ps=[
		":id" => $id
	];

	try{

		$stmt=$conn->prepare($sql);
		$stmt->execute($arr_ps);
		$result=$stmt->fetchAll();

		return $result;

	} catch(Exception $e){
		echo $e->getMessage(); // Exception 메세지 출력
		return false;
	}
}




// -----------------------------------------------------------
// 함수명 : db_update_boards_id
// 기능 : 수정
// 파라미터 : PDO   &$conn   
//			 배열  &$arr_param   쿼리용 
// 리턴 : 불린
// -----------------------------------------------------------
function db_update_boards_id(&$conn, &$arr_param){

	
	$sql="
	 update
	 	 boards
	 set
		 title = :title
		 ,content = :content
	 where
	 	 id = :id		 	
	 ";	
	
	$arr_ps=[
		":id" => $arr_param["id"]
		,":title" => $arr_param["title"]
		,":content" => $arr_param["content"]

	];

	try{

		$stmt=$conn->prepare($sql);
		$result=$stmt->execute($arr_ps);

		return $result;

	} catch(Exception $e){
		echo $e->getMessage(); // Exception 메세지 출력
		return false;
	}
}





// -----------------------------------------------------------
// 함수명 : db_update_view_cnt
// 기능 : 수정
// 파라미터 : PDO   &$conn   
//			 배열  &$id?   쿼리용 
// 리턴 : 불린
// -----------------------------------------------------------
function db_update_view_cnt(&$conn, &$id){

	
	$sql="
	 update
	 	 boards
	 set
		 view_cnt = view_cnt + 1
	 where
	 	 id = :id		 	
	 ";	
	
	$arr_ps=[
		":id" => $id
	];

	try{

		$stmt=$conn->prepare($sql);
		$result=$stmt->execute($arr_ps);

		return $result;

	} catch(Exception $e){
		echo $e->getMessage(); // Exception 메세지 출력
		return false;
	}
}


// -----------------------------------------------------------
// 함수명 : db_delete_boards_id
// 기능 : 삭제
// 파라미터 : PDO   &$conn   
//			 배열  &$어레파라   쿼리용 
// 리턴 : 불린
// -----------------------------------------------------------
function db_delete_boards_id(&$conn, &$id){

	
	$sql="
		 UPDATE boards					
		 SET					
			 delete_at = now()				
			 ,delete_flg = 1				
		 WHERE					
			 id = :id	
	 ";	
	
	$arr_ps=[
		":id" => $id
	];

	try{

		$stmt=$conn->prepare($sql);
		$result=$stmt->execute($arr_ps);

		return $result;

	} catch(Exception $e){
		echo $e->getMessage(); // Exception 메세지 출력
		return false;
	}
}

// -----------------------------------------------------------
// 함수명 : db_search_boards_paging
// 기능 : boards paging 검색
// 파라미터 : PDO   &$conn
//			 array &$arr_post 쿼리 작성용 배열
// 리턴 : array / false
// -----------------------------------------------------------
function db_search_boards_paging(&$conn, &$arr_param, &$arr_post){

	$sql="
	 select
		 id
		 ,title
		 ,create_at
	 	 ,ip
		 ,view_cnt
		 ,favorate
	 from 
		 boards		 
	 where
		 delete_flg = 0
	";

		// $search="
		//  and "
		//  .substr('$_POST["titlecomments"]',0,5)
		//  ." like '%"
		//  .$arr_post[검색내용]
		//  ."%' or "
		//  .substr('$_POST["titlecomments"]',5,13)
		//  ." like '%"
		//  .$arr_post[검색내용]
		//  ."%'"
		//  ;
		
	$search=" AND "
			." create_at "
			." >= "
			.$arr_post["create_at"]
			." AND "
			.$arr_post["search_titcon"]
			." LIKE '%"
			.$arr_post["search"]
			."%' "
	;
	$sql_2="
	 order by 
	 	id desc
	 limit :list_cnt offset :offset
	";	

	$arr_ps=[
		":list_cnt" => $arr_param["list_cnt"]
		,":offset" => $arr_param["offset"]
	];


	try{
		$stmt=$conn->prepare($sql.$search.$sql_2);
		$stmt->execute($arr_ps);
		$result=$stmt->fetchAll();

		return $result;

	} catch(Exception $e){
		return false;
	}
}



// -----------------------------------------------------------
// 함수명 : db_search_boards_paging
// 기능 : boards paging 검색
// 파라미터 : PDO   &$conn
//			 array &$arr_post 쿼리 작성용 배열
// 리턴 : array / false
// -----------------------------------------------------------
function db_search_boards_cnt(&$conn, &$arr_param, &$arr_post){

	$search=" AND "
			." create_at "
			." >= "
			.$arr_post["create_at"]
			." AND "
			.$arr_post["search_titcon"]
			." LIKE '%"
			.$arr_post["search"]
			."%' "
	;
	$sql_2="
	 order by 
	 	id desc
	 limit :list_cnt offset :offset
	";	
	$sql_3="
	 SELECT 
	 	 COUNT(id) cnt 
	 FROM 
	 	 boards
	 where
		 delete_flg = 0
	";	

	$arr_ps=[
		":list_cnt" => $arr_param["list_cnt"]
		,":offset" => $arr_param["offset"]
	];


	try{
		$stmt=$conn->prepare($sql_3.$search.$sql_2);
		$stmt->execute($arr_ps);
		$result=$stmt->fetchAll();

		return (int)$result[0]["cnt"];

	} catch(Exception $e){
		return false;
	}
}






// -----------------------------------------------------------
// 함수명 : db_delete_boards_id
// 기능 : 검색
// 파라미터 : PDO   &$conn   
//			 배열  &$어레파라   쿼리용 
// 리턴 : 불린
// -----------------------------------------------------------
// function db_delete_boards_id(&$conn, &$id){

	
// 	$sql="
// 		 select
// 		 	 count(id) as cnt					
// 		 from					
// 			 boards							 				
// 		 WHERE					
// 			 delete_flg = '0'	
// 	 ";	
// 	 $where="";
// 	foreach($arr_param as $key => $val){
// 		$where .= " AND ".$key. "like '%'" .$val;
// 	}
// 	// $str=strlen($where)>=1?$where

// 	$arr_ps=[
// 		":id" => $id
// 	];

// 	try{

// 		$stmt=$conn->prepare($sql);
// 		$result=$stmt->execute($arr_ps);

// 		return $result;

// 	} catch(Exception $e){
// 		echo $e->getMessage(); // Exception 메세지 출력
// 		return false;
// 	}
// }


?>








<!-- // 확인용
// $conn=null;
// PDO_set($conn);
// echo db_select_boards_cnt($conn); -->
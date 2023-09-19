<?php

require_once ("./04_107_과제.php");



function my_sel(){
	PDO_set($conn);
	$sql="select * from employees where emp_no=:emp_no;";
	$arr_ps=[
		":emp_no"=>500000
	];

	$stmt=$conn->prepare($sql);
	$stmt->execute($arr_ps);
	$result=$stmt->fetchAll(); // 셀렉트
	return $result;
}

function my_ins(){
	PDO_set($conn);
	$sql="insert into employees( emp_no, birth_date, first_name, last_name, gender, hire_date ) 
		values( :emp_no, :birth_date, :first_name, :last_name, :gender, :hire_date )";
	$arr_ps=[
		":emp_no"=>500011
		,":birth_date"=>20020329
		,":first_name"=>"김"
		,":last_name"=>"관호"
		,":gender"=>"M"
		,":hire_date"=>20230817
	];

	$stmt=$conn->prepare($sql);
	$result=$stmt->execute($arr_ps); // 인서트, 딜리트
	return $result; // 인서트
}

function my_up(){
	PDO_set($conn);
	$sql="update employees set first_name = :first_name, last_name = :last_name where emp_no = :emp_no";
	$arr_ps=[
		":first_name"=>'호이'
		,":last_name"=>'둘리'
		,":emp_no"=>500000
	];

	$stmt=$conn->prepare($sql);
	$result=$stmt->execute($arr_ps); // 인서트, 딜리트
	return $result; // 인서트
}

function my_del(){
	PDO_set($conn);
	$sql="delete from employees where emp_no=:emp_no;";
	$arr_ps=[
		":emp_no"=>500000
	];

	$stmt=$conn->prepare($sql);
	$result=$stmt->execute($arr_ps); // 인서트, 딜리트
	$res_cnt=$stmt->rowCount(); // 딜리트
	return $res_cnt;
}






$conn=null;
$result=[];
$a;



// --------------------------------------------

// $a=my_del();
	PDO_set($conn);
	$sql="delete from employees where emp_no=:emp_no;";
	$arr_ps=[
		":emp_no"=>500000
	];
	// PDO_set($conn);
	// $sql="select * from employees where emp_no=:emp_no;";
	// $arr_ps=[
	// 	":emp_no"=>500000
	// ];

	$stmt=$conn->prepare($sql);
	// $stmt->execute($arr_ps);
	// $result=$stmt->fetchAll(); // 셀렉트
	// $stmt=$conn->prepare($sql);
	// $stmt->execute($arr_ps);
	// $result=$stmt->fetchAll(); // 셀렉트
	// print_r($result);
	$result=$stmt->execute($arr_ps); // 인서트, 딜리트
	var_dump($result); // 인서트
	// $res_cnt=$stmt->rowCount(); // 딜리트
	// var_dump($a);
	

	// $conn->commit();


// ----------------------------------------------
	PDO_del($conn);
	
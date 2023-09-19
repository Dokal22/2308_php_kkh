<?php


function PDO_set(&$conn){
	$db_host="localhost";
	$db_user="root";
	$db_port="3306";
	$db_pw="php504";
	$db_name="employees";
	$db_charset="utf8mb4";
	$db_dns="mysql:host=".$db_host.";port=".$db_port.";dbname=".$db_name.";charset=".$db_charset;

	$db_option=[
		PDO::ATTR_EMULATE_PREPARES => false // Preppared Statement 를 데이터베이스가 지원 하지 않을 경우 에뮬레이션 하는 기능
		,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
		,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
	];

	$conn=new PDO($db_dns,$db_user,$db_pw,$db_option);
}

function PDO_del(&$conn){
	$conn=null;
}


// -----------------------------------------------------------

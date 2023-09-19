<?php


require_once("04_107_과제.php");

$conn=null;

PDO_set($conn);
// -------------------------------------------


$sql=" 
 SELECT *
 FROM employees e
 WHERE e.emp_no NOT IN (SELECT emp_no FROM titles)
 ";
$arr_ps=[
];

$stmt=$conn->prepare($sql);
$stmt->execute($arr_ps);
$no_title=$stmt->fetchAll();


// 리절트값 확인용
// var_dump($no_title);

// foreach($no_title as $val){
	
// 	echo $val['emp_no'];
// 	// echo $val['birth_date'];
// 	// echo $val['first_name'];
// 	// echo $val['last_name'];
// 	// echo $val['gender'];
// 	// echo $val['hire_date'];
	
// }

// -----------------------------------------------

$sql2="
 INSERT INTO titles
 VALUES(
	:emp_no
	,'green'
	,NOW()
	,99990101
 ) 
";

// $sql2=" // 테스트
//  select emp_no
//  from employees
//  where emp_no = :emp_no
// ";

$stmt2=$conn->prepare($sql2);


foreach($no_title as $val){

    $arr_ps2=[
        ":emp_no"=>$val['emp_no']
    ];

	// $stmt2->execute($arr_ps2); // 테스트
	// $result=$stmt2->fetchAll();
	// var_dump($result);


    // $stmt2=$conn->prepare($sql2);
    $result=$stmt2->execute($arr_ps2);
    var_dump($result);
    
}






// ------------------------------------------
PDO_del($conn);

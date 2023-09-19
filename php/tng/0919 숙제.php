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
var_dump($no_title);

// -----------------------------------------------

$sql="
 INSERT INTO titles
 VALUES(
	:emp_no
	,'green'
	,NOW()
	,99990101
 ) 
";
foreach($no_title as $val){
    $arr_ps=[
        ":emp_no"=> $val
    ];

    $stmt=$conn->prepare($sql);
    $result=$stmt->execute($arr_ps);
    var_dump($result);
    $conn->commit();
}

// ------------------------------------------
PDO_del($conn);

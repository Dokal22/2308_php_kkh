<?php


require_once("./04_107_피디오펑션하기.php");

$conn = null; // 객체 받을 놈은 null로 선언해둔다

my_db_conn($conn);

$sql = " SELECT " 
    ."          sal.salary "
    ."          ,emp.emp_no "
    ."          ,emp.birth_date "
    ." FROM "
    ."          employees emp "
    ." JOIN "
    ."          salaries sal "
    ." ON "
    ."          emp.emp_no = sal.emp_no "
    ."          AND sal.to_date >= NOW() "
    ."          AND (emp.emp_no = :emp_no OR emp.emp_no = :emp_no2); "
    ; 


$arr_ps = [
    ":emp_no" => 10001
    ,":emp_no2" => 10002
];


$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps); 
// $res_cnt = $stmt->rowCount();
// if($res_cnt >= 2){ 
    // $obj_conn->rollBack();
// } 

$result = $stmt->fetchAll(); 
print_r($result);

// var_dump($result);
// $obj_conn->commit();


db_destroy_conn($conn); 

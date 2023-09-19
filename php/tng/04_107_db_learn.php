<?php


function db_conn(&$a){
    $db_host="localhost";
    $db_user="root";
    $db_pw="php504";
    $db_name="employees";
    $db_charset="utf8mb4";
    $db_dns="mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

    $db_option=[
        PDO::ATTR_EMULATE_PREPARES => false
        ,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    $a=new PDO($db_dns,$db_user,$db_pw,$db_option);
}


$conn=null;


db_conn($conn);
$sql=" select emp_no, salary "
." from salaries "
." where to_date >= NOW() "
."  and salary >= :salary "
;
$arr_ps=[
    ":salary" => 80000
];

$stmt=$conn->prepare($sql);
$stmt->execute($arr_ps);
$result=$stmt->fetchAll();
// var_dump($result);


$b=0;
foreach($result as $val){
    if($val["salary"]>=100000){
        echo "사원번호 : {$val["emp_no"]} / 월급 : {$val["salary"]}\n";
        $b++;
    }
}

echo $b;
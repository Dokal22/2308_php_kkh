<?php


$db_host = "localhost"; // 127.50...
$db_user = "root";
$db_pw = "php504";
$db_name = "employees";
$db_charset = "utf8mb4";
$db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;


$db_options = [ // 스태틱 호출 ::
    PDO::ATTR_EMULATE_PREPARES      => false // ?
    ,PDO::ATTR_ERRMODE              => PDO::ERRMODE_EXCEPTION // 에러나도 킵고잉
    ,PDO::ATTR_DEFAULT_FETCH_MODE   => PDO::FETCH_ASSOC // 데이터를 배열화
];

// PDO 클래스로 DB 연동
$obj_conn=new PDO($db_dns,$db_user,$db_pw,$db_options);

// // SQL 작성
// $sql = " SELECT " // sql 짤 때는 앞뒤에 공백 넣어주기
//     ."          * "
//     ." FROM "
//     ."          EMPLOYEES "
//     ." WHERE "
//     ."          emp_no = :emp_no "
//     ; // 보안상 안에 세미콜론을 넣지 않는다

// //프리페어드 스테이트먼트
// $arr_ps = [
//     ":emp_no" => 10004
// ];


// --------------------셀렉트 10001~2 연봉, 사번, 생일--------------------

// SQL 작성
// $sql = " SELECT " // sql 짤 때는 앞뒤에 공백 넣어주기
//     ."          sal.salary "
//     ."          ,emp.emp_no "
//     ."          ,emp.birth_date "
//     ." FROM "
//     ."          employees emp "
//     ." JOIN "
//     ."          salaries sal "
//     ." ON "
//     ."          emp.emp_no = sal.emp_no "
//     ."          AND sal.to_date >= NOW() "
//     ."          AND (emp.emp_no = :emp_no OR emp.emp_no = :emp_no2); "
//     ; // 보안상 안에 세미콜론을 넣지 않는다

// //프리페어드 스테이트먼트-
// $arr_ps = [
//     ":emp_no" => 10001
//     ,":emp_no2" => 10002
// ];


// ------------------------------
// insert


// $sql =
// " INSERT INTO departments ( "
// 	." dept_no "
// 	." ,dept_name "
// ." ) "
// ." VALUE ( "
// ."	:dept_no "
// 	." ,:dept_name "
// ." ) ";

// $arr_ps = [
//     ":dept_no" => "d010"
//     ,":dept_name" => "php504"
// ];


// ------------------------------
// delete

$sql =
" DELETE FROM "
."      departments "
." WHERE "
."      dept_no = :dept_no; ";

$arr_ps = [
    ":dept_no" => "d010"
];

// ----------------------------작동------------------------------

// 프리페어드 스텥먼 생성
$stmt = $obj_conn->prepare($sql);
$result = $stmt->execute($arr_ps); // 쿼리실행
$res_cnt = $stmt->rowCount();
if($res_cnt >= 2){ // 영향받은 행이 2개 이상일 때 오류대처?(pk)
    $obj_conn->rollBack();
} // else로 커밋하등가

// $result2 = $stmt->fetchAll(); // 쿼리 경과를 fetch, select때만?
// print_r($result);

var_dump($result);

$obj_conn->commit();
$obj_conn = null; // 무거워서 빼기?



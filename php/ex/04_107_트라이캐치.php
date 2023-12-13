<?php
require_once("./04_107_피디오펑션하기.php");
$conn = null;


// 트라이캐치 : 예외를 처리하기위한거
// try {
//     // 우리가 실행할거
//     my_db_conn($conn);

//     $sql = " SELECT " 
//         ."          sal.salary "
//         ."          ,emp.emp_no "
//         ."          ,emp.birth_date "
//         ." FROM "
//         ."          employees emp "
//         ." JOIN "
//         ."          salaries sal "
//         ." ON "
//         ."          emp.emp_no = sal.emp_no "
//         ."          AND sal.to_date >= NOW() "
//         ."          AND (emp.emp_no = :emp_no OR emp.emp_no = :emp_no2); "
//         ; 


//     $arr_ps = [
//         ":emp_no1" => 10001 // 여기 오류줬음
//         ,":emp_no2" => 10002
//     ];


//     $stmt = $conn->prepare($sql);
//     $stmt->execute($arr_ps); 
//     // $res_cnt = $stmt->rowCount();
//     // if($res_cnt >= 2){ 
//         // $obj_conn->rollBack();
//     // } 

//     $result = $stmt->fetchAll(); 
//     print_r($result);
// }
// catch(Exception $e){
//     // 예외일 경우
//     echo "예외 ", $e->getMessage();
// }
// finally{
//     // 정상이든 아니든 실행
//     db_destroy_conn($conn); 
//     echo "피날리";
// }



// -----------------------------------

try{
    // 예외상황이 나올만한 코드
    echo "Try 실행\n";

    throw new Exception("ㅇㅇㅇㅇ"); // Throwable [인터페이스] 로 넣어도 됨(+5버전 이후 가능)
    echo "Try 종료\n";
}
catch(Exception $e){ // 여기에도 Throwable 넣고하면
    // 예외 상황 발생 시 실행
    echo "Catch 실행\n";
    echo $e->getMessage(),"\n";
} 
finally{
    // 암튼 실행
    echo "Finally 실행\n";
}




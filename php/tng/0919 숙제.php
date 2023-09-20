<?php


require_once("04_107_과제.php");



try{
    $conn=null;

    PDO_set($conn);
    // -------------------------------------------


    $sql=" 
    SELECT *
    FROM employees e
    WHERE e.emp_no NOT IN (SELECT emp_no FROM titles)
    ";

    $stmt=$conn->query($sql); // prepare, execute 말고 배열 안넣고 바로 하는 법


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
        ,:title
        ,:from_date
        ,:to_date
    ) 
    ";

    // $sql2=" // 테스트
    //  select emp_no
    //  from employees
    //  where emp_no = :emp_no
    // ";

    $stmt2=$conn->prepare($sql2);


    foreach($no_title1 as $val){ // 오류

        $arr_ps2=[
            ":emp_no"=>$val['emp_no']
            ,":title"=>"green"
            ,":from_date"=>date("Y-m-d")
            ,":to_date"=>99990101
        ];

        // $stmt2->execute($arr_ps2); // 테스트
        // $result=$stmt2->fetchAll();
        // var_dump($result);


        // $stmt2=$conn->prepare($sql2);
        $result=$stmt2->execute($arr_ps2);
        if(!$result){
            throw new Exception("인서트에러");
        }
        var_dump($result);
        
    }



    $conn->commit();
}
catch ( Exception $e ) {
    $conn->rollback();
    echo $e->getMessage();
}
// ------------------------------------------
finally{
    PDO_del($conn);
}


<?php

// 몇개일지 모르는 숫자를 다 더해주는 함수를 만들어주세요.
// function DDH(...$i){
// 	$sum = 0; // 스코프가 다르다 = 메모리 위치가 다르다
// 	foreach($i as $v){
// 		$sum += $v;
// 	}
// 	return $sum;
// }
// echo DDH(4,8,9,7,2,4,6,6);

// function jgw($a){
// 	$c=0;
// 	for($a;$a>0;$a--){
// 		$c+=$a;
// 	}
// 	return $c;
// }
// echo jgw(10000);


// 교재용 재귀함수
// function recurs($i) {
// 	if($i===0){
// 		return 0;
// 	}
// 	if($i===1) {
// 		return 1;
// 	}
// 	return $i + recurs($i-1);
// }
// echo recurs(12);


// function a($a){
// 	settype($a,"int");
// 	$c=0;
// 	$d=0;
// 	for($b=strlen($a);$b>0;$b--){ 		// 4 	3 	2

// 		$c=floor($a/pow(10,($b-1)));  	// 4	5	
// 		$a-=$c*pow(10,($b-1));  		// 565	65
// 		$d+=$c;							// +4	+5

// 	}
// 	return $d;
// }
// echo a("4565");
// echo floor(4565/pow(10,(4-1)));  	// 4	5	
// $a-=$c*pow(10,($b-1));  // 565	65

// 쌤방식
// function my_test(string $str) {
// 	$sum=0;
// 	$len = mb_strlen($str);
// 	for($idx=0;$idx<=$len-1;$idx++){
// 		$sum+=(int)mb_substr($str,$idx,1);
// 	}
// 	return $sum;
// }
// echo my_test("738291");

// 젤빠른게 어레이섬(php에서 만들어논거 쓰세요)
// <return array_sum($arr)>
// function a($a){
// 	$b=str_split($a);
// 	return array_sum($b);
// }
// echo a("928374");

	
// 학생분들꺼
// function a($a){
// 	$b=str_split($a);
// 	$c=0;
// 	foreach($b as $k => $v){
// 		$c+=$v;
// 	}
// 	return $c;
// }
// echo a("285519");
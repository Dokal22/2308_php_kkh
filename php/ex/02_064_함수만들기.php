<?php

// 두 숫자를 받아서 더해주는 함수만들기
// 리턴이 없다????
function Gwan_sum($a, $b){
	echo $a+$b;
}
// 리턴이 있다!!!!
function Ho_sum($a, $b){
	return $a+$b;
}

function GwanHo($a,$b){
	return $c=[
		$a-$b
		,$a*$b
		,$a/$b
		,$a%$b
		];
}

// Gwan_sum(45,65);
// echo Ho_sum(23,87);

// var_dump(GwanHo(2,4));
// echo GwanHo(2,4)[3],"\n";
foreach(GwanHo(2,4) as $k => $v ){
	if ($k===2) {
		echo $k, " => ", $v, "\n";
	}
}


//파라미터의 기본값이 설정되어 있는 함수
function my_sum3($a,$b=5){ // 고정값은 뒤에서부터 나열 => 앞에 띡 있으면 안댐
	return $a+$b;
}
echo my_sum3(3,7),"\n";


//가변 파라미터
//php-5.6 이상 가능
function mAp(...$itms){
	echo $itms[2];
}
mAp("a","b","c");
// 옛날꺼
// function mAp(){
// 	$itms = func_get_args();
// 	print_r($itms);
// }
// mAp("a","b","c");


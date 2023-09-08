<?php


$arr1 = ["치킨","피자","삼겹살","감자탕","보쌈"];

$arr2 = ["치킨"=>"닭","피자"=>"밀","삼겹살"=>"돼지","감자탕"=>"소"];
echo count($arr2),"\n";


// 배열요소 삭제

unset($arr1[2]);
print_r($arr1);


// 배열의 정렬 - 값순, 주소순
// a/ar/k/kr)sort

$arr3 =["c","f","o","d"];
arsort($arr3);
print_r($arr3);

krsort($arr2);
print_r($arr2);


echo count($arr2);


// 같은거 안출력

$arr4 = [1,2,3];
$arr5 = [2,5,6];
$arr6 = array_diff($arr5,$arr4); // 앞에놈을 출력, 뒤에놈과 같지 않은.
print_r($arr6);


// 배열에 값추가

array_push($arr1, "스파게티", "돈까스"); //array_push
print_r($arr1);

$arr3[]="u"; // 쉬운거
print_r($arr3);
$arr2["돈까스"]="돼지또는소";
print_r($arr2);


?>
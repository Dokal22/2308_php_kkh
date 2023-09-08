<?php

// 산술 연산자

echo "더한다", 1+1, "\n";
echo "뺀다", 2-1, "\n";
echo "곱한다", 128*486, "\n";
echo "나눈다", 3.14/5.55, "\n";
echo "나머지", 9%2, "\n";

// 증감 연산자

$num = 8;
$num++;
echo $num,"\n";
$num--;
echo $num,"\n";

++$num;
echo $num,"\n";
--$num;
echo $num,"\n";

echo "선입 후입\n";
echo $num++,"\n";
echo --$num,"\n";

// 산술대입연산자

$num=5;
$num += 2;
// -=, *=, /=, %=

echo $num,"\n";


echo "---------------------------------\n";


$tng_num = 10;
echo $tng_num += 10, "\n";
echo $tng_num /= 5, "\n";
echo $tng_num -= 4, "\n";
echo $tng_num %= 7, "\n";
echo $tng_num *= 3, "\n";

// 비교연산자 (boolean?)

$a = 1;
$b = "1";

var_dump($a == $b); //형태비교
var_dump($a === $b); //타입까지 비교

// 논리연산자

var_dump(1==1&&2==2);
var_dump(4==8||3==3);
var_dump(!(1==1));
?>
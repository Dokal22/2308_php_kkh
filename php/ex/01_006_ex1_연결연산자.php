<?php

$str1 = "배가\n";
$str2 = "고파요\n";
$str3 = $str1.$str2;
echo $str3;

$str4 = "문자\n";
$num1 = 1;
$str5 = $str4.$num1;
echo $str5, "\n";

// 상수

define("NUM", 100); /* 상수이름은 무조건 대문자(약속) */
define("MAL", "말".NUM);
echo NUM,"\n", MAL;
// $NTR = $num1 + $str1;

?>
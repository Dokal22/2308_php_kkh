<?php

echo trim("     그아아아ㅏㅅ   "); // 공백꺼져
// rtrim ltrim

echo strtoupper("\ndfjkasd;fiah\n"); // 캡스
echo strtolower("FDAFIHALF;DI\n");

echo strlen("DontShootMe"),"\n"; // 글자수
echo mb_strlen("김수황문거북이와두루미삼철갑산"),"\n";

echo str_replace("a","/","asdfqefdzfadqeda"),"\n"; // 바꿔주는거

echo substr("asdFiuoAshdng",3,5),"\n";
echo mb_substr("함흥차사납시오",2,3),"\n";

echo strpos("zhncuvhdoiuqewhfasdlhfuiapogih", "f"),"\n"; // substr랑 함수에서 섞어서 사용가능

$anything=1;
var_dump(isset($anything)); // 있냐
var_dump(empty($anything)); // 비었냐

$a;
settype($a,"string"); // 너이거임
echo gettype($a),"\n";

echo time(),"\n"; //1970년 이후 경과 초

echo date("Y-m-d H:i:s",time() +60*60*24*30),"\n"; // 날짜

echo rand(1,10); // 랜덤값
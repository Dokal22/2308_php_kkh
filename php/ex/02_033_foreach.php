<?php

// foreach : 배열의 길이만큼 루프하는 문법
$r = [5,6,7];
$r2 = [
	"감"=>"침"
	,"다"=>"착"
	,"뒤"=>"맨"
];

for($i=0; $i<=count($r)-1; $i++){
	echo $r[$i],"\n";
}

foreach($r2 as $k => $v){
	echo "{$k} : {$v}\n";
}

foreach($r2 as $v){ // 키 없앰
	echo $v;
}

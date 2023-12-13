<?php


$r=[
	[
		"id" => "kkh3290"
		,"pw" => "php504"
	]
	,[
		"id" => "kkhj3290"
		,"pw" => "php505"
	]
	,[
		"id" => "kkhi3290"
		,"pw" => "php506"
	]
	];

foreach($r as $k => $v){
	// var_dump($k);
	// echo $k;
	if($k != 1){
		echo $v["id"],"\n";
	}
}

// for($i=0;$r<=count($r)-1;$i++){
// 	echo $r[$i,"id"], "뭐야";
// }

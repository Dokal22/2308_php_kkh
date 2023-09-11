<?php

$deung=5;
$award="";
switch ($deung) {
	case "1등":
		echo "금상"; // 쌤은 여따가 변수값으로 넣고 마지막에 에코로 출력함
		break;
	case "2등":
		echo "은상";
		break;
	case "3등":
		echo "동상";
		break;
	case "4등":
		echo "장려상";
		break;					
	default:
		echo "노력상";
		break;
}

if($deung===1){
	$award="금상";
}
else if($deung===2){
	$award="은상";
}
else if($deung===3){
	$award="동상";
}
else if($deung===4){
	$award="장려상";
}
else {
	$award="노력상";
}

echo $award;
<?php


$aa="";
$bb="";
$r=0; // 1 이김 2 짐 3 비김
$a=trim(fgets(STDIN)); // 스탠다드 인풋

$b = rand(1,3); // -1 가위 0 바위 1 보



switch($a){
	case "s":
		switch($b){
			case 1:
			$r=3;
				break; 
			case 2:
			$r=2;
				break;
			case 3:
			$r=1;
				break;
		}
	break; 
	case "r":
		switch($b){
			case 1:
			$r=1;
				break; 
			case 2:
			$r=3;
				break;
			case 3:
			$r=2;
				break;
		}
		break; 
	break;
	case "p":
		switch($b){
			case 1:
			$r=2;
				break; 
			case 2:
			$r=1;
				break;
			case 3:
			$r=3;
				break;
		}
		break; 
	break;
}

switch($a){
	case "s":
	$aa="가위";
		break; 
	case "r":
	$aa="바위";
		break;
	case "p":
	$aa="보";
		break;
}
switch($b){
	case 1:
	$bb="가위";
		break; 
	case 2:
	$bb="바위";
		break;
	case 3:
	$bb="보";
		break;
}
switch($r){
	case 1:
	echo "나 : $aa, 상대 : $bb, 이김";
		break; 
	case 2:
	echo "나 : $aa, 상대 : $bb, 짐";
		break;
	case 3:
	echo "나 : $aa, 상대 : $bb, 비김";
		break;
}


// 구글링


// $rsp=[1=>"가위",2=>"바위",3=>"보"];
// $aa="";
// $bb="";
// $r=0; // 1 이김 2 짐 3 비김
// $a=trim(fgets(STDIN)); // 스탠다드 인풋

// $b = rand(1,3); // -1 가위 0 바위 1 보


// if($a==$b){
// 	echo "{$rsp[$a]} 비김\n";
// }
// else if($a==1&&$b==2 || $a==2&&$b==3 || $a==3&&$b==1){
// 	echo "{$rsp[$a]} 짐\n";
// }
// else {
// 	echo "{$rsp[$a]} 이김\n";
// }
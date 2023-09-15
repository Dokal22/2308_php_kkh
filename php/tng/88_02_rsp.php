<?php

// 가위바위보 겜
// $aa="";
// $bb="";
// $r=0; // 1 이김 2 짐 3 비김
//  // 스탠다드 인풋
// $c="";



// while(true){
// 	$b = rand(1,3); // -1 가위 0 바위 1 보
// 	$a="";
// 	$a=trim(fgets(STDIN));
// 	if($a=="finish"){
// 		break;
// 	}


// switch($a){
// 	case "s":
// 		switch($b){
// 			case 1:
// 			$r=3;
// 				break; 
// 			case 2:
// 			$r=2;
// 				break;
// 			case 3:
// 			$r=1;
// 				break;
// 		}
// 	break; 
// 	case "r":
// 		switch($b){
// 			case 1:
// 			$r=1;
// 				break; 
// 			case 2:
// 			$r=3;
// 				break;
// 			case 3:
// 			$r=2;
// 				break;
// 		}
// 		break; 
// 	break;
// 	case "p":
// 		switch($b){
// 			case 1:
// 			$r=2;
// 				break; 
// 			case 2:
// 			$r=1;
// 				break;
// 			case 3:
// 			$r=3;
// 				break;
// 		}
// 		break; 
// 	break;
// }

// switch($a){
// 	case "s":
// 	$aa="가위";
// 		break; 
// 	case "r":
// 	$aa="바위";
// 		break;
// 	case "p":
// 	$aa="보";
// 		break;
// }
// switch($b){
// 	case 1:
// 	$bb="가위";
// 		break; 
// 	case 2:
// 	$bb="바위";
// 		break;
// 	case 3:
// 	$bb="보";
// 		break;
// }
// switch($r){
// 	case 1:
// 	echo "나 : $aa, 상대 : $bb, 이김\n";
// 		break; 
// 	case 2:
// 	echo "나 : $aa, 상대 : $bb, 짐\n";
// 		break;
// 	case 3:
// 	echo "나 : $aa, 상대 : $bb, 비김\n";
// 		break;
// }
// }

// 구글링
// $rsp=["s"=>1,"r"=>2,"p"=>3,"scissors"=>1,"rock"=>2,"paper"=>3, "finish"=>0];
// $re_rsp=[1=>"scissors",2=>"rock",3=>"paper"];
// while(true){

// 	$b = rand(1,3); // -1 가위 0 바위 1 보
// 	$a="";
// 	$a=trim(fgets(STDIN));
// 	$aa=$rsp[$a];

// 	if($aa==0){
// 		break;
// 	}
// 	else if($aa==$b){
// 		echo "나 : {$re_rsp[$aa]} 상대 : {$re_rsp[$b]} 비김\n";
// 	}
// 	else if($aa==1&&$b==2 || $aa==2&&$b==3 || $aa==3&&$b==1){
// 		echo "나 : {$re_rsp[$aa]} 상대 : {$re_rsp[$b]} 짐\n";
// 	}
// 	else {
// 		echo "나 : {$re_rsp[$aa]} 상대 : {$re_rsp[$b]} 이김\n";
// 	}
// }

// 숫자게임
$anham=0;
while(!$anham){
	$ran_val=rand(1,100);
	$chance=6;
	echo "숫자 함 불러보셈 ㅇㅇ. 싫음 no\n";
	for($chance;$chance>0;$chance--){
		$try=trim(fgets(STDIN));


		if($try=="no"){
			$anham=1;
			$chance=0;
			break;
		}
		else if($ran_val==$try){
			break;
		}
		else if($ran_val<$try){
			echo "그건 쫌 큰데...\n";
		}
		else{
			echo "그건 쫌 작은데...\n";
		}
		
	}
	if($chance==0){
		echo "왤케 못함? ㅉㅉ {$ran_val}인데...\n다시 ";
	}
	else{
		echo "{$ran_val} 맞음... 어케 맞춤?ㄷㄷ\n";
	}
}
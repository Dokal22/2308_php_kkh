<?php

//첫번째
// for($i=1;$i<=10;$i++){
// 	echo $i,"\n";
// }

//두번째
// $b;
// for($a=1;$a<10;$a++){
// 	echo $b=$a*2,"\n";
// }


//자습
// $c=sqrt($a);
// for($a=2;$a<700;$a*=2){
// 	printf( "%.3f\n",$c);
// }
//자습2
// for($a=2;$a<700;$a*=2){
// 	echo $a," - ", sqrt($a),"\n";
// }


// break 이거 if 구문 안에서 가능 ******DB에서 좀 씀


// continue 스킵 ******DB에서 좀 씀

// for($i=1;$i<=10;$i++){
// 	echo $i,"\n";
// 	continue; // 이 밑으로 스킵
// 	echo "55";
// }


//이중 루프

// for($i=0;$i<2;$i++){
// 	for($j=9;$j>7;$j--){
// 		echo "{$i} - {$j}\n";
// 	}
// }


// 이중루프활용

// for($a=1;$a<10;$a++){
// 	for($d=1;$d<10;$d++){
// 		$e = $a*$d;
// 		echo "$a x $d = $e\n";
// 	}
// }


// 활용2

// for($a=1;$a<10;$a++){
// 	if($a>1 && $a<9){
// 		continue;
// 	}
// 	else{
// 		for($d=1;$d<10;$d++){
// 			$e = $a*$d;
// 			echo "$a x $d = $e\n";
// 		}
// 	}
// }

// 2-2
// for($a=1;$a<10;$a+=8){
// 	for($d=1;$d<10;$d++){
// 		$e = $a*$d;
// 		echo "$a x $d = $e\n";
// 	}
// }

//활용3

// for( $a = 1; $a < 10; $a++ ) {
// 	if( $a % 2 == 0 ) {
// 		for( $d = 1; $d < 10; $d++ ){
// 			$e = $a * $d;
// 			echo "{$a} x {$d} = {$e} \n";
// 		}
// 	}	
// }


// 0913 활용
// for($i=1;$i<=5;$i++){
// 	for($j=1;$j<=5;$j++){
// 		if($i>=$j){
// 			echo "*";
// 		}
		
// 	}
// 	echo "\n";
// }

// 활용 2
// for($i=1;$i<=5;$i++){
// 	for($j=4;$j>=$i;$j--){
// 			echo " ";
// 	}
// 	for($k=1;$k<=$i;$k++){
// 		echo "*";
// 	}
// 	echo "\n";
// }

// 학생분들꺼 1
// $num=5;
// for($i=1;$i<=$num;$i++){
// 	for($j=$num-$i;$j>=1;$j--){
// 		echo " ";
// 	}
// 	for($k=$num-$i;$k<=4;$k++){
// 		echo "*";
// 	}
// 	echo "\n";
// }

// 학생분들꺼 11
// $num=5;
// for($i=1;$i<=$num;$i++){
// 	for($j=$num-$i;$j>=1;$j--){
// 		echo " ";
// 	}
// 	for($k=0;$k<$i;$k++){
// 		echo "*";
// 	}
// 	echo "\n";
// }

// 학생분들꺼 2
// $num=5;
// for($i=1;$i<=$num;$i++){
// 	for($j=$num-$i;$j>=1;$j--){
// 		echo " ";
// 	}
// 	for($k=0;$k<2*$i-1;$k++){
// 		echo "*";
// 	}
// 	echo "\n";
// }

// 마름모(from 학생분)
// $num=5;
// for($i=1;$i<=5;$i++){
// 	for($j=$num-$i;$j>=1;$j--){
// 		echo " ";
// 	}
// 	for($k=0;$k<2*$i-1;$k++){
// 		echo "*";
// 	}
// 	echo "\n";
// }
// for($i=4;$i>=1;$i--){
// 	for($j=0;$j<$num-$i;$j++){
// 		echo " ";
// 	}
// 	for($k=0;$k<2*$i-1;$k++){
// 		echo "*";
// 	}
// 	echo "\n";
// }

// 활용 3
// for($i=1;$i<=5;$i++){
// 	for($j=5;$j>-4;$j--){
// 		if($i>=$j && $j>1-$i){
// 			echo "*";
// 		}
// 		else {
// 			echo " ";
// 		}
// 	}
// 	echo "\n";
// }

// for($i=1;$i<=5;$i++){
// 	for($j=5;$j>-4;$j--){
// 		if(true){
// 			echo "*";
// 		}
// 		else {
// 			echo " ";
// 		}
// 	}
// 	echo "\n";
// }

// 활용 4
// for($i=-3;$i<=3;$i++){
// 	for($j=3;$j>=-3;$j--){
// 		if($i+4>$j && $j>-$i-4 && 4-$i>$j && $i-4<$j){
// 			echo "*";
// 		}
// 		else{
// 			echo " ";
// 		}
// 	}
// 	echo "\n";
// }

//별도전1
// $num=6;
// for($i=1;$i<=$num;$i++){
// 	if($i<($num*1/3) && $i>($num*2/3)){
// 		for($m=0;$m>$num*1/3;$m++){
// 			echo " ";
// 		}
// 		for($l=1;$l<=$i;$l++){
// 			echo "*";
// 		}
// 	}
// 	else{
// 		for($j=$num-$i;$j>=1;$j--){
// 			echo " ";
// 		}
// 		for($k=0;$k<2*$i-1;$k++){
// 			if($i>($num*2/3)){
// 				echo "*";
// 			}
// 			else{
// 				{echo "*";}
// 			}
// 		}
// 	}
// 	echo "\n";
// }

//별도전2
// $num=5;
// for($i=1;$i<=2;$i++){
// 	for($j=$num-$i;$j>=1;$j--){
// 		echo " ";
// 	}
// 	for($k=0;$k<2*$i-1;$k++){
// 		echo "*";
// 	}
// 	echo "\n";
// }
// for($i=5;$i>=4;$i--){
// 	for($j=0;$j<$num-$i;$j++){
// 		echo " ";
// 	}
// 	for($k=0;$k<2*$i-1;$k++){
// 		echo "*";
// 	}
// 	echo "\n";
// }
// for($i=2;$i>=1;$i--){
	
// 	for($j=0;$j<$i-1;$j++){
// 		echo " ";
// 	}
// 	for($k=0;$k<$i;$k++){
// 		echo "*";
// 	}
// 	for($l=0;$l<(1/$i)*6;$l++){
// 		echo " ";
		
// 	}
// 	if($i==1){
// 		echo " ";
// 	}
// 	for($m=0;$m<$i;$m++){
// 		echo "*";
// 	}
// 	echo "\n";
// }

// 별 다리 만듬 
$scale=10;
for($i=1;$i<=$scale;$i++){
	for( $blank1=$scale;$blank1>$i;$blank1-- ){
			echo " ";
	}
	for( $starL=$i;$starL<$scale;$starL++ ){
		echo "*";
	}
	for( $blank2=0;$blank2<4*$i-4;$blank2++ ){
		echo " ";
	}
	for( $starR=$i;$starR<$scale;$starR++ ){
		echo "*";
	}
	echo "\n";
}






















// echo "\n\n\n\n\n\n\n\n\n\n\n 17 12 16, 12:33 3배?/ 22:20 별로 증가안함 
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢠⡆⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣾⣷⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣰⣿⣿⣦⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢠⣿⣿⣿⣿⡄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣾⣿⣿⣿⣿⣧⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⣿⣿⣿⣿⣿⣿⡆⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢀⣿⣿⣿⣿⣿⣿⣿⣿⡄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣾⣿⣿⣿⣿⣿⣿⣿⣿⣷⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⢀⣀⣀⣀⣀⣀⣀⣀⣀⣀⣀⣀⣀⣀⣀⣀⢸⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣆⣀⣀⣀⣀⣀⣀⣀⣀⣀⣀⣀⣀⣀⣀⣀⣀⣀⠀9⠀
// ⠀⠀⠉⠻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠟⠋⠀⠀
// ⠀⠀⠀⠀⠀⠙⠻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠟⠋⠁⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠈⠙⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡿⠛⠁⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠈⠻⢿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠟⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠉⠻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡿⠟⠉⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀5
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡆⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣾⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣸⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⣧⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀3
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢠⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⠟⠻⣿⣿⣿⣿⣿⣿⣿⣿⣿⣿⡄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣾⣿⣿⣿⣿⣿⣿⣿⠿⠋⠀⠀⠀⠀⠙⠿⣿⣿⣿⣿⣿⣿⣿⣿⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣸⣿⣿⣿⣿⣿⡿⠛⠁⠀⠀⠀⠀⠀⠀⠀⠀⠈⠛⢿⣿⣿⣿⣿⣿⣇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢠⣿⣿⣿⡿⠟⠉⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠉⠛⢿⣿⣿⣿⣧⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⣼⣿⠟⠋⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠉⠻⢿⣿⣧⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
// ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠸⠛⠁⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠙⠻⠂⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀6
// ";

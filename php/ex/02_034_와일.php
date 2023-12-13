<?php

// $i=0;
// while($i<=2){
// 	echo "$i\n";
// 	$i++;
// }

// $i=1;
// $j=1;
// while($i<10){
// 	echo "2 x {$i} = ", 2*$i, "\n";
// 	$i++;
// }



// $i=0;
// $j=0;

// while(true){
// 	$j++;
// 	while(true){
// 		$i++;
// 		$hap=$j*$i;
// 		echo "{$j} x {$i} = ", $hap, "\n";
// 		if($i===9){
// 			$i=0;
// 			break;
// 		}
// 	}
// 	if($j===9){
// 		break;
// 	}
// }

$j=1;
$i=1;
while($j<10){ // 왜 이러면 무한궤도임
	while($i<10){
		$hap=$j*$i; // 이렇게 하면 좋대나
		echo "{$j} x {$i} = ", $hap, "\n";
		$i++;
	}
	$i=1;
	$j++;
}

// $i=0;
// do{
// 	echo"ttt";// 이거 하고 와일 드가라
// }
// while($i<0);
<?php

//버블 정렬

$r=[4,28,2,17];

// asort($r);
// print_r($r);
// $tmp=0;

// for($j=1;$j<count($r);$j++){
// 	for($i=1;$i<=count($r)-$j;$i++){
// 		$tmp=$r[$i-1];	
// 		if($tmp>$r[$i]){
// 			$r[$i-1]=$r[$i];
// 			$r[$i]=$tmp;
// 		}			
// 	}
// }
// print_r($r);


// while로 하기
// $i=1;

// while($j<count($r)){
//  $j=1;
// 	while($i<=count($r)-$j){
// 		$tmp=$r[$i-1];	
// 		if($tmp>$r[$i]){
// 			$r[$i-1]=$r[$i];
// 			$r[$i]=$tmp;
// 		}	
// 		$i++;		
// 	}
// 	$j++;
// }
// print_r($r);


// while --$i로 하기
// $r=[4,28,2,17];

// $j=0;
// while($j<count($r)-1){
// 	++$j;
// 	$i=0;
// 	while($i<count($r)-$j){
// 		++$i;
// 		$tmp=$r[$i-1];	
// 		if($tmp>$r[$i]){
// 			$r[$i-1]=$r[$i];
// 			$r[$i]=$tmp;
// 		}			
// 	}
// }
// print_r($r);
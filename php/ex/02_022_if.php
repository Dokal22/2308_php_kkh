<?php


// if

$a = 4;
if($a===1){
	echo "1등";
}
else if($a===2){
	echo "2등";
}
else if($a===3){
	echo "3등";
}
else{
	if($a===5){
		echo "특별상";
	}
	else{
		echo "순위 외";
	}
}


?>
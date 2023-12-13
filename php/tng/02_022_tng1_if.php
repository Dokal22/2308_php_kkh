<?php


$jumsu=64;
$grade;
$answer = "당신의 점수는 %u점 입니다. %s"; // 쌤꺼
// $a=20;
// $b=44;
if($jumsu>=0 && $jumsu<=100){
	if($jumsu>=100){ // 적었던거 지우기말고 코멘트하는걸 추천
		$grade="A+";
	}
	else if($jumsu>=90){
		$grade="A";
	}
	else if($jumsu>=80){
		$grade="B";
	}
	else if($jumsu>=70){
		$grade="C";
	}
	else if($jumsu>=60){
		$grade="D";
	}
	else{
		$grade="F";
	}
	// echo "당신의 점수는 {$jumsu}점 입니다. <$grade>";
	$muzi =  sprintf($answer,$jumsu,$grade); // 그냥 printf하면 D38이라 출력되는데 왜지
	echo $muzi;
	// printf("\n값%d, 값%u",$a,$b);
}
else{
	echo "잘못된 값을 입력했습니다.";
}
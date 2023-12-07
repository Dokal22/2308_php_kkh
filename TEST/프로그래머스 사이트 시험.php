<?php
// $num=626331;
// $answer=0;
// while($num!=1){
//     if($num%2 == 0){
//         $num /= 2;
//         echo "$answer : $num \n";
//     }
//     else{
//         $num = ($num*3)+1;
//         echo "$answer : $num \n";
//     }
//     $answer++;
//     if($answer>500){
//         $answer = -1;
//         break;
//     }
// } 
// echo $answer;

$ingredient = [2, 1, 1, 2, 3, 1, 2, 3, 1];
$ingredient_len = count($ingredient);
// echo $ingredient_len;
    $answer = 0;
    $i = 0;
    $a=[];
    for($i=0;$i<$ingredient_len-2;$i++){
        echo $ingredient[$i], $ingredient[$i+1], $ingredient[$i+2],"\n";
        if($ingredient[$i]==1 && $ingredient[$i+1]==2 && $ingredient[$i+2]==3){
            $answer++;
        }
    } 
    
echo $answer;

?>
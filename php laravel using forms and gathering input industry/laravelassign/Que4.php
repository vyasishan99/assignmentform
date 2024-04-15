<?php

$physics=90;
$chemistry=90;
$biology=90;
$mathematics=90;
$computer=90;

$totalmarks=$physics+$chemistry+$biology+$mathematics+$computer;
$percentage=($totalmarks/500)*100;

 // Grade

 if($percentage>=90)
 {
    $grade='A';
 }
 else
 if($percentage<=80)
 {
    $grade='B';
 }
 else
 if($percentage<=70)
 {
    $grade='C';
 }
 else
 if($percentage<=60)
 {
    $grade='D';
 }
 else
 if($percentage<=50)
 {
    $grade='E';
 }
 else
 {
    $grade='F';
 }
  




 echo "Percentage:$percentage <br>";
 echo "Your grade is :$grade <br>";

?>
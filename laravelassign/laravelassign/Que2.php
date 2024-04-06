<?php
 $n1=15;
 $n2=16;
 $n3=17;

 if($n1>$n2)
 {
   $largest=($n1>$n3) ? $n1:$n3;
 }
 else
 {
    $largest=($n2>$n3) ? $n2:$n3;
 }
  echo "The Largest number is :".$largest;



  ?>
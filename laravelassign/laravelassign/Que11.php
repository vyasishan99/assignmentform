<?php

 $numbers=array(20,10,15,34,51);
 $count=count($numbers);
 $total=0;

 for($i=0;$i<$count;$i++)
 {
    $total+=$numbers[$i]; // $total=$total+$numbers[$i];
 }
  echo "Total of five element is :".$total;
  
?>
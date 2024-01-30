<?php
    // past date , future date and current date
   // $today=mktime(0,0,0,date("m"),date("d"),date("Y"));
  //echo "Today the date is :".date("d/m/Y",$today);


  
    // $tomorrow=mktime(0,0,0,date("m"),date("d")+1,date("Y"));
     // echo "Tomorrow the date is :".date("d/m/Y",$tomorrow);

  $before=mktime(0,0,0,date("m"),date("d")-15,date("Y"));
  echo "Before 15 days the date is :".date("d/m/Y",$before);





?>
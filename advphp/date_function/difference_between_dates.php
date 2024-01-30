<?php
  $rent=1500;
  echo "Room rent of 1 day is :".$rent."<br>";
 $today=mktime(0,0,0,date("m"),date("d"),date("Y"));
 echo "Check in date :".date("d/m/Y",$today)."<br>";
 $tomorrow=mktime(0,0,0,date("m"),date("d")+2,date("Y"));
 echo "Check out date :".date("d/m/Y",$tomorrow)."<br>";

 $diff=($tomorrow-$today)/86400;
 // echo $diff;
 echo "Total rent of staying in hotels :".$diff*$rent;


?>
<?php
 
 echo "Today the date is :".date("d/m/y")."<br>";
 echo "Today the date is :".date("d.m.y")."<br>";
 echo "Today the date is :".date("d-m-y")."<br>";

 echo "Today the date is :".date("y-d-m")."<br>";

 echo "Today the date is :".date("d/m/Y")."<br>";

 echo "Today is :".date("D")."<br>";
 echo "Today is :".date("j")."<br>";
 echo "Today is :".date("M")."<br>";
 echo "Today is :".date("Y")."<br>";
 echo "Today is :".date("l")."<br>";


 echo $today = date("F j, Y, g:i a")."<br>";                 // March 10, 2001, 5:16 pm
 echo $today = date("m.d.y")."<br>";                         // 03.10.01
 echo $today = date("j, n, Y")."<br>";                       // 10, 3, 2001
 echo $today = date("Ymd")."<br>";                           // 20010310
 echo $today = date('h-i-s, j-m-y, it is w Day')."<br>";     // 05-16-18, 10-03-01, 1631 1618 6 Satpm01
 echo $today = date('\i\t \i\s \t\h\e jS \d\a\y.')."<br>";   // it is the 10th day.
 echo $today = date("D M j G:i:s T Y")."<br>";               // Sat Mar 10 17:16:18 MST 2001
 echo $today = date('H:m:s \m \i\s\ \m\o\n\t\h')."<br>";     // 17:03:18 m is month
 echo $today = date("H:i:s")."<br>";                         // 17:16:18
 echo $today = date("Y-m-d H:i:s")."<br>";                   // 2001-03-10 17:16:18 (the MySQL DATETIME format)


?>
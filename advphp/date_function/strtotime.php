<?php
// strtotime() : convert string into date format
echo "Tomorrow is :".date("d/m/Y",strtotime("+1day"))."<br>";
echo "After 15 day the date is :".date("d/m/Y",strtotime("+15day"))."<br>";
echo "Before 15 days the date is :".date("d/m/Y",strtotime("-15day"))."<br>";
 

?>
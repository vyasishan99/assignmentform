<?php
$today=mktime(0,0,0,date("m"),date("d"),date("Y"));
$tomorrow=mktime(0,0,0,date("m"),date("d")+1,date("Y"));
$diff=($tomorrow-$today)/86400;
echo $diff;




?>
<?php

$num=153;
$total=0;
$a=$num;
 while($a!=0)
 {
    $rem=$a%10;
    $total=$total+$rem*$rem*$rem;
    $a=$a/10;

 }
 if($num==$total)
 {
    echo "The number is an Armstrong number";

}
else
{
    echo "The number is not an Armstrong number";
}


?>
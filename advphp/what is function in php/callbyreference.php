<?php
 function test(&$fname) //&$fname is an function call by reference
 {
    $fnm="My firstname is :Brijesh"."<br>";
    echo $fnm;
 }
 $lname="My last name is :Pandey";
 test($fname);
 echo $lname;

?>
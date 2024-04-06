<?php
 // JSON string to decode

 $json_str='{"name":"Sachin Tendulkar","age":50,"city":"India"}';

 // Decode JSON string to array

  $array=json_decode($json_str,true);
   
  // Print the array 

  echo "Name:".$array['name'] ."<br>";
  echo "Age:".$array['age'] ."<br>";
  echo "City:".$array['city'] ."<br>";
  
  ?> 











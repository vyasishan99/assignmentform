 
  // Types of array
  <br>

  <h4>Numeric array</h4>
  
  
  <?php
     $arr=array("Keyur","Kohli","Sachin","Dhoni");
     print_r($arr);

?>
<br>
  <h4>Associative array</h4>


  <?php
   $arr=array("a"=>"Keyur","b"=>"Kohli");
   print_r($arr);
  

?>
     


  <h4>Multidimentional array</h4>

  <?php
   $arr=array("non-technical"=>array("WD","SEO","ST","DM"),"technical"=>array("php","react","angular","node js"));
   print_r($arr);
   print_r($arr["technical"][2]);
   print_r($arr["non-technical"][3]);
  ?>
 <br><br>


 <h4>Convert a JSON string to array:</h4>

 <?php
 // JSON string to decode

 $json_str='{"name":"Sachin Tendulkar","age":50,"city":"India"}';

 // Decode JSON string to array

  $array=json_decode($json_str,true);
   
  // Print the array

  print_r($array);





?>


  






    




   






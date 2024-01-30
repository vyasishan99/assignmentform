<?php
/*

 foreach() : foreach is a loop i.e used to convert an array as values and return data in values there we used foreach

  Note : array is an collection of multiple data in a single element there we used array.

   $name="Ishan";
   $name=array("ishan","parth","jayesh","deep");

   key => values

   */


//    $name=array(0=>"ishan",1=>"parth",2=>"jayesh",3=>"deep",4=>"dev");
//    print_r($name);

  $name=array("ishan","parth","jayesh","deep");
//   print_r($name);

//  foreach(array as value)
//  {
//     statements;
//  }
   
    foreach($name as $value)
    {
        echo $value."<br>";
    }


   ?>
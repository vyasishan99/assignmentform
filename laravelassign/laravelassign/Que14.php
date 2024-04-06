<?php
  function print_program()
  {
    $num=array("56","2610","3711","4812");
     $length=count($num);
     for($i=0;$i<$length;$i++)
     {
        echo $num[$i] ."<br>";
     }
  }
  
    print_program();
    ?>
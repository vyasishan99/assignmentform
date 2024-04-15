<?php
 
 for($year=1901;$year<=2016;$year++)
 {
    if($year%4==0)
    {
    
        
    
            if($year%100!=0 || $year%400==0)
            {
                echo $year."year is a leap year <br>";
            }
            else
          {
            // if year is divisible by 100 but not divisible by 400,it is not a leap year
            echo $year."year is not a leap year <br>";
          }
        }
           
        
        else
        {
             // if year is not divisible by 4,it is not a leap year
               echo $year."year is not a leap year <br>";
        }
    
 
}





?>
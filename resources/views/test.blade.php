<?php
// Declare and define two dates 
$date1 = strtotime("2019-9-30 22:45:00");  
$date2 = strtotime("2019-11-2 10:44:01");  
  
// Formulate the Difference between two dates 
$diff = abs($date2 - $date1);  
$c = date("Y-m-d");
 $k = abs($date1);
  
// To get the year divide the resultant date into 
// total seconds in a year (365*60*60*24) 
$years = floor($diff / (365*60*60*24));  
  
  
// To get the month, subtract it with years and 
// divide the resultant date into 
// total seconds in a month (30*60*60*24) 
$months = floor(($diff - $years * 365*60*60*24) 
                               / (30*60*60*24));  
  
  
// To get the day, subtract it with years and  
// months and divide the resultant date into 
// total seconds in a days (60*60*24) 
$days = floor(($diff - $years * 365*60*60*24 -  
             $months*30*60*60*24)/ (60*60*24)); 

var_dump($c);
?>
<i class="fab fa-accessible-icon"></i>

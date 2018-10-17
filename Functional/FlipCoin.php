<?php
/**
 * Program to flip the coin desired times  and show results
 */

 /**
  *  require the methods tin utility class   
  */  
require("Utility.php");
echo "enter no of times to flip ";
//var n to store no times to flip
$times = Utility::getInt() ;
//passing variable to the method
Utility::flip($times);
?>
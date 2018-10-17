<?php 
/**
 * calculates the monthly payments you would have to make over Y years to pay 
 * off a P principal loan amount at R per cent interest compounded monthly.
 * 
 * @author chiragkatare
 * @version 2.0   
 * @since 15-10-2018
 */ 
require("Utility.php");
class MonthlyPayment{

    /**
     * function to calculate the monthly payment using compund interest formula
     */
     static function monthPayment($p,$y,$r0){
         $r = $r0/(12*100);
         $n = 12* $y;
         $pay = ($p*$r)/(1-(1+$r)**(-$n));
         return $pay ;
     } 

     /**
      * function to test the function
      */
     static function main(){ 
         echo "enter principal ";
         $p = Utility::getInt();
         echo "enter year ";
         $y = Utility::getInt();
         echo "enter rate ";
         $r0 = Utility::getInt();
         $pay = MonthlyPayment::monthPayment($p,$y,$r0);
         echo "Monthly payment is ".$pay;
     }
}
MonthlyPayment::main();
?>
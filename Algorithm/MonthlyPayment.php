<?php 
class MonthlyPayment{

     static function monthPayment($p,$y,$r0){
         $r = $r0/(12*100);
         $n = 12* $y;
         $pay = ($p*$r)/(1-(1+r)**(-$n));
         return $pay ;
     } 
     static f
}
?>
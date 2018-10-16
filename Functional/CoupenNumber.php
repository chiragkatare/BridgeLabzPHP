<?php
/**
 * program to give unique coupens
 */
require("Utility.php");
Class CoupenNumbers{
    function coupens(){
        // to generate alpha numeric coupens
        $code = "1 2 3 4 5 6 7 8 9 0 a s d f g h j k l z x c v b n m q w e r t y u i o p";
        $arr = explode(" " , $code);
        $arrlen = count($arr); 
         $rand = rand(100000 , 10000000);
         $coupen = "cp";
         /**
          * get unique value from array and saving it in coupen
          */
         while($rand>1){
             $coupen = $coupen.$arr[$rand%$arrlen];
             $rand /=$arrlen; 
         }
         echo "Coupen is : ".$coupen."\n";
    }
}
//calling the method
CoupenNumbers::coupens();

?>
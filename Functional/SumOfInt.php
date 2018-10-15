<?php
require("Utility.php");
class SumOfInt{

    function sum(){
        $arr = Utility::getIntArr();
        for($i = 0 ; $i < count($arr); $i++){
            for($j = 0 ; $j < count($arr); $j++){
                for($k = 0 ; $k < count($arr); $k++){
                    if($i!=$j&&$i!=$k){
                        if($arr[$i]+$arr[$j]+$arr[$k]==0){
                        echo " \n".$arr[$i]." ".$arr[$j]." ".$arr[$k];
                    }
                    }
                }   

            }
        }
    }
}
SumOfInt::sum();
?>
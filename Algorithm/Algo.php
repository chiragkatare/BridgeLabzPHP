<?php
require("Utility.php");
class CheckAlgo{
    function sort($arr){
        var_dump($arr);
        $arr = Utility::bubbleSort($arr);
        var_dump($arr);     
    }
}
$arr = Utility::getIntArr();
CheckAlgo::sort($arr);
?>
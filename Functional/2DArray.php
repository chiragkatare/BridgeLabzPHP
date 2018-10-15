<?php
require("Utility.php");
class Array2D{

    function print($arr){
        for($i = 0 ;$i<count($arr);$i++){
            echo "\n";
            for($j = 0 ;$j <count($arr[$i]);$j++){
                echo $arr[$i][$j]."  ";
            }
        }
    }


    function getArr($l , $b){
        $arr = array();
        for($i = 0 ;$i<$l;$i++){
            $aa = array();
            for($j = 0 ;$j <$b ;$j++){
                $aa[$j]=Utility::getInt() ;
            }
            array_push($arr , $aa);
        }
        return $arr ;
    }
}
echo "Enter column ";
$column = Utility::getInt();
echo "enter Row ";
$row = Utility::getInt();
echo "enter values";
$arr = Array2D::getArr($column, $row);
Array2D::print($arr);
?>
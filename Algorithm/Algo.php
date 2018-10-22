<?php
require("Utility.php");
class CheckAlgo{
    static function sort($arr){
        //Bubble Sort 
        $start = Utility::startTime();
        Utility::bubbleSort($arr);
        $stop = Utility::stopTime();
        //var_dump($arr);
        echo "Bubble sorted in ".Utility::elapsedTime($start , $stop); 
        
        //insertion sort 
        $start = Utility::startTime();
        $arr = Utility::insertionSort($arr);
        $stop = Utility::stopTime();
        echo "Insertion sorted in ".Utility::elapsedTime($start , $stop); 
        
        //Binary Search
        echo "enter element to search in binary search ";
        $n = Utility::getInt();
        $start = Utility::startTime();
        $arr = Utility::binarySearch($n ,$arr);
        $stop = Utility::stopTime();
        echo "binary searched in ".Utility::elapsedTime($start , $stop);  
    }
}
$arr = Utility::getStrArr();
CheckAlgo::sort($arr);
?>
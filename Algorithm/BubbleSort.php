<?php
/**
 * Reads in integers prints them in sorted order using Bubble Sort
 * 
 * @author chiragkatare
 * @version 1.0   
 * @since 15-10-2018
 */
require("Utility.php");
class BubbleSort{

    /**
     * static function to read an integer array , sort them and print them 
     */
    static function sort(){
        //getting integer array using method in Utility
        $arr = Utility::getIntArr();
        //sorting using bubble sort 
        $arr = Utility::bubbleSort($arr);
        echo "sorted array is ";
        //printing the array 
        echo Utility::printArr($arr);

    }
}
BubbleSort::sort();

?>
<?php 
/**
 * Reads in strings from standard input and prints them in sorted order
 * @author chiragkatare
 * @version 2.0   
 * @since 15-10-2018
 */
require("Utility.php");
class InsertionString{

    /**static function to read string and sort it */
    static function insertion(){
        //grtting array from the user using function in utility
        $arr = Utility::getStrArr();
        //sorting the array using insertion sort using function in Utility class
        $arr = Utility::insertionSort($arr);
        echo "Sorted array is : ";
        //printing the sorted array
        echo Utility::printArr($arr);
    }
}
//calling function
InsertionString::insertion();
?>
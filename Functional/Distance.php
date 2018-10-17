<?php
/**
 * Program to find the distance between two points on carteisan plain
 */

 //require the methods in Utility class
require("Utility.php");
class Distance{

    /**
     * Function to calculate the distance and print the distance
     */
    function dist(){
        echo"Enter value of x ";
        $x = Utility::getInt();
        echo"Enter value of y ";
        $y = Utility::getInt();
        $sqrt  =sqrt(($x*$x)+($y*$y));
        echo "distance is ".$sqrt."\n";
    }
}
//calling the method
Distance::dist();

?>
<?php
/**
 * Function to print the given no is leap year or not
 */

 //requires method in utility to take input and find leap year
require("Utility.php");

class LeapYear{

    function leap(){
        echo "enter year";
        $year = Utility::getInt();
        if(strlen((string)$year)==4){
            if(Utility::isLeapYear($year))
               echo  "is leap year";
          else

              echo "is not leap";

        }
        else{
            echo "enter valid year";
        }
    }
}
LeapYear::leap();
?>
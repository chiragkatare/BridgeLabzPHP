<?php

/**
 * takes a date as input and prints the day of the week that date falls on
 * 
 * @author chiragkatare
 * @version 1.0   
 * @since 15-10-2018
 */
require("Utility.php");
class DayOf
{

    /**
     * staatic main function to take user input of date and test the other function
     */

    static function main()
    {
        echo "Enter day ";
        $d = Utility::getInt();
        echo "Enter month ";
        $m = Utility::getInt();
        echo "Enter year ";
        $y = Utility::getInt();
        //calculating the day of week 
        $d0 = Utility::dayOfWeek($d, $m, $y);
        //prints the day week
        $d1 = "Sunday Monday Tuesday Wednesday Thursday Friday Saturday";
        $day = explode(" ", $d1);
        echo "day on given date is " . $day[$d0] . "\n";
    }
}
//calling main funtion to test
DayOf::main();

?>
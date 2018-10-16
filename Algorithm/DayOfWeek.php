<?php
require("Utility.php");
class DayOf{
    /** 
     * calculating day of week using below formula and returning it
     * 
     * @return d0 the day of the week
     */
    static function dayOfWeek($d , $m , $y){
        $y0 = floor($y - (14 - $m) / 12) +1 ;
        $x = floor($y0 + $y0/4 - $y0/100 + $y0/400);
        $m0 = ($m + 12 * floor(((14 - $m) / 12)) - 2);
        $d0 = floor(($d + $x + floor((31*$m0) / 12)) % 7) ;
        return $d0;
    }

    /**
     * main function to take user input of date and test the other function
     */

    static function main(){
        echo "Enter day " ;
        $d = Utility::getInt();
        echo "Enter month ";
        $m = Utility::getInt();
        echo "Enter year ";
        $y = Utility::getInt();
        $d0 = self::dayOfWeek($d ,$m,$y);
        $d1 = "Sunday Monday Tuesday Wednesday Thursday Friday Saturday";
        $day = explode(" ", $d1);
        echo "day on given date is ".$day[$d0]."\n";
    }
}

DayOf::main();

?>
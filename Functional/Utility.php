<?php
/**
 * Helper Function containing methods to use in othere php class
 */

class Utility
{
    /**
     * Method to print heads ands and tails by taking input for no of times
     */
    public function flip($times){
        $head = 0 ;
        //loop runs till times
        for($is = 0;$is<$times;$is++)
        {
            //checks for head if true heads get incremented
            if(rand(0,10)>0.5){
                $head++;
            }
        }
        echo "heads is ".$head." \nTails is".($times-$head)."\n";
    }

    public function leapYear($year){}
}
?>
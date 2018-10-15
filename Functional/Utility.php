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

    /**
     * 
     */
    public function isLeapYear($year){
        return (($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0);
    }

    /**
     * to get input unless its an integer
     */
    public function getInt(){

        fscanf(STDIN,"%d\n",$val);
        while(!is_numeric($val)){
            echo "ivalid input try again";
            fscanf(STDIN,"%d\n",$val);
        }
        return $val ;

       /* fscanf(STDIN,"%d\n",$val);
        if(is_numeric($val)){
            return $val;
        }
        else{
            echo "invalid input";
            Utility::getInt() ;
            */
        }

        function getString(){
            fgets(STDIN);
        while(!is_string($val)){
            echo "ivalid input try again";
            fgets(STDIN);
        }
        return $val ;
        }

        /**
         * 
         */
        function getIntArr(){
            echo "enter array size";
            $size = Utility::getInt();
            $arr = array();
            echo "enter array value ";
            for($i = 0 ; $i < $size ; $i++ ){
                $arr[$i] = Utility::getInt(); 
            }
            return $arr ;
       }

   /**
     * prints Power of 2
     * 
     */
    public function powerOf2($power){
        for($s= 1 ; $s<=$power ; $s++){
            $pow = 2**$s ;
            echo "\n".$pow;
        }
    }

    /**
     * Function to find if no is prime or not
     */
    function isPrime($n){
        for ($i = 2; $i <= $n / 2; $i++) {
			if ($n % $i == 0) {
				return false;
			}
        }
        return true ;
    }








}
?>
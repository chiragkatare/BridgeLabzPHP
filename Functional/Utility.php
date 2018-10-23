<?php
/**
 * Helper Function containing methods to use in othere php class
 * @author chiragkatare
 * @version 2.0   
 * @since 15-10-2018
 */
class Utility
{
    /**
     * Method to print heads ands and tails by taking input for no of times
     * @param times the no of times to flip the coin
     */
    static public function flip($times){
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
    static public function isLeapYear($year){
        return (($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0);
    }
    /**
     * to get input unless its an integer
     */
    static public function getInt(){
        fscanf(STDIN,"%d\n",$val);
        while(!is_numeric($val)){
            echo "ivalid input try again\n";
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
        /**
         * Take String input
         */
    static function getString(){
            fscanf(STDIN,"%s\n",$val);
            while(!is_string($val)){
                echo "ivalid input try again";
                fscanf(STDIN,"%s\n",$val);
            }
             return $val ;
        }
        /**
         * takin input as an array and return it
         * @return array the int array by user input
         */
    static function getIntArr(){
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
        * Function to create String array and return the array
        * @return the string array by getting user input
        */
       static function getStrArr(){
        echo "enter array size";
        $size = Utility::getInt();
        $arr = array();
        echo "enter array value ";
        for($i = 0 ; $i < $size ; $i++ ){
            $arr[$i] = Utility::getString(); 
        }
        return $arr ;
   }

   /**
    * Function to print contents of array
    *@param arr the array to print contents of 
    */
   static function printArr($arr){
       $size = sizeof($arr);
       $s = "{ ";
       for($i = 0 ; $i < $size ; $i++){
           $s.= $arr[$i].",";
       }
       $s = $s."}";
       return $s ;
   }

   /**
     * prints Power of 2
     * @param power the value till to count power of 2
     */
    static public function powerOf2($power){
        for($s= 1 ; $s<=$power ; $s++){
            $pow = 2**$s ;
            echo "\n".$pow;
        }
    }
    /**
     * Detects if given strings are anagrams or not
     * @param s1 the first string
     * @param s2 the second string to check
     * @return true/false if anagrram or not
     * 
     */
    static function isAnagram($s1,$s2){
            $arr1 = str_split($s1,1);
            $arr2 = str_split($s2,1);
            if(count($arr1)!=count($arr2)){
                return false ;
            }
            for($i = 0 ; $i < count($arr1);$i++){
                if(array_search($arr1[$i],$arr2)!==false){
                    $key=array_search($arr1[$i],$arr2);
                    unset($arr2[$key]);
                }
                
            }
            if(count($arr2)==0){
                return true ;
            }
            else{
                return false ;
            }
        }
        /**
         * Funtion to check if a string is pallindrome or not 
         * 
         * @param s1 string value to check 
         */
    static function isPallindrome($s1 ){
            $arr1 = str_split($s1,1);
            $arr2 = str_split(strrev($s1),1);
            if(count($arr1)!=count($arr2)){
                return false ;
            }
            $size = count($arr1);
            for($i = 0 ; $i < $size;$i++){
                if($arr1[$i]!=$arr2[--  $size]){
                    return false ;
                }
            }
            return true ;
        }
    /**
     * Function to find if no is prime or not
     * @param n the no to check
     * @return true/false if prime or  not
     */
    static function isPrime($n){
        for ($i = 2; $i <= $n / 2; $i++) {
			if ($n % $i == 0) {
				return false;
			}
        }
        return true ;
    }
    /**
     * Function to search binary integer in an array
     */
    static function linear($n , $arr){
        sort($arr);
        $size = count($arr);
        for($i=0 ; $i<$size ; $i++){
            if($arr[$i]==$n){
                return $i ;
            }
        }
        return false ;
    }
    /**
     * Function to imlement binary search
     * return index if found or false if not found
     * 
     * @param n the no to search
     * @param arr the array in which to search 
     */
    static function binarySearch($n , $arr ){
        $size = count($arr);
        $mid ;
        $low = 0 ;
        $high = $size-1 ;
        for($i = 0 ;$i < $size ; $i++){
            while($low<=$high){
                $mid = round(($low + $high)/2);
                if($n==$arr[$mid]){
                    return $mid ;
                }
                else if($n>$arr[$mid]){
                    $low = $mid+1;
                }
                else{
                    $high = $mid - 1 ;
                }
            }
        }
        return false ;
    }
    
    /**
     * Function to sort integer array using insertion sort
     * @param arr the array to be sorted
     * @return arr sorted array
     */
    static function insertionSort($arr){
        //gets the size of array
        $size = count($arr);
        for($i = 1 ;$i <$size ; $i++){
            // getting value for back element
            $j = ($i - 1);
            //saving it in temperary variable;
            $temp = $arr[$i];
            while($arr[$j]>$temp&&$j>=0){
                $arr[$j+1] = $arr[$j];
                $j--; 
            }
            $arr[$j+1] = $temp ;
        }
        return $arr;
    }
    
    /**
     * Function to sort an array of string
     * 
     * @param arr array tobe sorted 
     * @return arr sorted array
     */
    static function insSortString  ($arr){
       //gets the size of array
       $size = count($arr);
       for($i = 1 ;$i <$size ; $i++){
           // getting value for back element
           $j = ($i - 1);
           //saving it in temperary variable;
           $temp = $arr[$i];
           while(strcmp($arr[$j],$temp)>0&&$j>=0){
               $arr[$j+1] = $arr[$j];
               $j--; 
           }
           $arr[$j+1] = $temp ;
       }
       return $arr;
   }
/**
 * Function to sort integer array using bubble sort algorithm
 * 
 * @param arr the array to be sorted
 * @return arr sorted array 
 */
    static function bubbleSort($arr){
        $n = sizeof($arr); 
  
        // Traverse through all array elements 
        for($i = 0; $i < $n; $i++)  
        { 
            // Last i elements are already in place 
            for ($j = 0; $j < $n - $i - 1; $j++)  
            { 
                // traverse the array from 0 to n-i-1 
                // Swap if the element found is greater than previous element
                // than the next element 
                if ($arr[$j] > $arr[$j+1]) 
                { 
                    $t = $arr[$j]; 
                    $arr[$j] = $arr[$j+1]; 
                    $arr[$j+1] = $t; 
                } 
            } 
        } 
        return $arr;
    }

    /**
     * Function to find squre root of a no using newtons method
     * @param c the integer no of which to find square root 
     * @return c the value of square root
     */
    static function sqrt($c){
        $t = $c ;
        $epsilon = 1e-15 ;
        while(abs($t-($c/$t))>$epsilon*$t){
            $t = ($c/$t + $t)/2 ;
        }
        return $t ;
    }

    /**
     * Function to calculate temperature from celcius to fahrenhiet and vice-versa
     * 
     * @param temp the temperature to convert 
     * @param chtemp the character containing the c or f fot temp 
     * @return conv the converted temperature 
     */
    static function tempconv($temp , $chtemp){
        if(strpos($chtemp , "c")===false&&strpos($chtemp , "C")===false){
            $conv =  ($temp * 9/5) + 32 ; 
        }
        else{
            $conv =  ($temp - 32) * 5/9 ; 
        }
        return $conv ;
    }

    /** 
     * static function calculating day of week using below formula and returning it
     * 
     * @return d0 the day of the week
     */
    static function dayOfWeek($d , $m , $y){
        $d= 1*$d ;
        $m = 1*$m ;
        $y = 1*$y ;
        $y0 = floor($y - (14 - $m) / 12) ;
        $x = $y0 + floor($y0/4) - floor($y0/100) + floor($y0/400);
        $m0 = $m + 12 * floor((14 - $m) / 12) - 2 ;
        $d0 = ($d + $x + floor((31*$m0) / 12)) % 7;
        return $d0 +1;
    }

    static function startTime(){
        return $start = round(microtime(true)*1000);
    }
    static function stopTime(){
        return $stop = round(microtime(true)*1000);
    }

    static function elapsedTime($start , $stop){
        return "Time : ".((self::$stop-self::$start)/1000)." seconds\n";
    }











    
} 
?>
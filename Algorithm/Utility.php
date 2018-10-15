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

        /**
         * Take String input
         */
        function getString(){
            fscanf(STDIN,"%s\n",$val);
            while(!is_string($val)){
                echo "ivalid input try again";
                fscanf(STDIN,"%s\n",$val);
            }
             return $val ;
        }

        /**
         * takin input as an array and return it
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
     * Detects if given strings are anagrams or not
     * 
     */
        function isAnagram($s1,$s2){
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
         */
        function isPallindrome($s1 , $s2 ){
            $arr1 = str_split($s1,1);
            $arr2 = str_split($s2,1);
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
     */
    function isPrime($n){
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
    function linear($n , $arr){
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
     */
    function binary($n , $arr ){
        $size = count($arr);
        $mid ;
        $low = 0 ;
        $high = $size-1 ;
        for($i = 0 ;$i < $count ; $i++){
            while($low<=$high){
                $mid = round(($low + $high)/2);
                if($n==$arr[$mid]){
                    return $mid ;
                }

            }
        }
    }
    
    /**
     * Function to sort integer array using insertion sort
     */
    function insertionSort($arr){
        $size = count($arr);
        for($i = 1 ;$i <$size ; $i++){
            $j = $i-1;
            $tem = $arr[$i];
            while($arr[$i]<$arr[$j]&&$j<0){
                $arr[$i] = $arr[$j];
                $j--; 
            }
            $arr[$j+1] = $temp ;
        }
    }
    
    /**
     * Function to sort an array of string
     */
    function insSortString  ($arr){
        $size = count($arr);
        for($i = 1 ;$i <$size ; $i++){
            $j = $i-1;
            $tem = $arr[$i];
            while(strcmp($arr[$i],$arr[$j])<0&&$j<0){
                $arr[$i] = $arr[$j];
                $j--; 
            }
            $arr[$j+1] = $temp ;
        }
    }

/**
 * Function to sort integer array using bubble sort
 */
function bubbleSort($arr){
    $size = count($arr);
    for($i = 0 ;$i <$size-1 ; $i++){
        for($j = 0 ;$j <$size-i-1 ; $j++){
            if(strcmp($arr1[$i],$arr2[$j])>0){}
            $temp = $arr[$i];
            $arr[$i] = $arr[$j] ;
            $arr[$j] = $temp;
        }
    }

}



}
?>
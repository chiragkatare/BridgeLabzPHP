<?php
/**
 * the Prime Number Program and store only the numbers in that range that are Anagrams.
 * 
 * @author chiragkatare
 */

 //require function in the php file to work 
require("Utility.php");

/**
 * Function to get the prime numbers from 0 o range 
 * 
 * @param range the range till which to find the prime numbers
 * @return array array of prime numbers
 */
function getprime($range){
    //array to store prime no
    $prime = [] ;
    //variacle to set index
    $count= 0;
    for ($i=2; $i < $range ; $i++) { 
        if(Utility::isprime($i)){
            $prime[$count++] = $i;
        }
    }
    return $prime;
}

/**
 * function to get the index to store number in specified place
 */
function getIndex($numb){
    $num = $numb;
    if($num<100){
        return 0;
    }
    while($num>9){
        $num = floor($num/10);
    }
    return $num ;
}

/**
 * Function to run and test the other functions in the file
 */
function primeRun(){
    $primeArr = getPrime(1000);
    $anagram = [] ;
    $count= 0;
    for ($i=0; $i < count($primeArr); $i++) {
        for ($j=0; $j < count($primeArr) ; $j++) { 
            if(Utility::isAnagram($primeArr[$i], $primeArr[$j]))
            {
                $anagram[$count++] = $primeArr[$j] ;
            }
        }
    }
    //@d array to store the values 
    $array2d = [] ;
    //pushing two arrays in the 2d arrays
    array_push($array2d , $anagram);
    array_push($array2d ,array_diff($primeArr , $anagram));
    echo "2D array stored is : ";
    Utility::print2d($array2d);
    echo "\n" ;
}

//calling the method
primeRun();
?>

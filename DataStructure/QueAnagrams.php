<?php

/**
 *  Prime Numbers that are Anagram in the Range of 0 - 1000 in a Queue using the Linked List and
 *  Print the Anagrams from the Queue
 * 
 */

 //require functions in below files to work 
require("Utility.php");
require("Queue.php");

/**
 * Function to run and test the program and print result to user
 */
function queAna()
{

    //creating new queue object
    $que = new Queue();
    //getting prime no till 1000
    $arr = getprime(1000);
    //checking prime numbers which are anagrams
    for ($i = 0; $i < count($arr); $i++) {
        for ($j = 0; $j < count($arr); $j++) {
            if ($i != $j) {
                //checking if anagram or not
                if (Utility::isAnagram($arr[$i], $arr[$j])) {
                    $que->enqueue($arr[$i]);
                    break;
                }
            }
        }
    }
    echo "Anagrams in Queue Are :\n\n";
    echo $que . "\n\n";

}

/**
 * Function to get the prime no in given range
 */
function getprime($range)
{
    //array to store prime no
    $prime = [];
    //variacle to set index
    $count = 0;
    for ($i = 2; $i < $range; $i++) {
        if (Utility::isprime($i)) {
            $prime[$count++] = $i;
        }
    }
    return $prime;
}


queAna();
?>
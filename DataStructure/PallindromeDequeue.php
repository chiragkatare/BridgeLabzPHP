<?php
/**
 * construct an algorithm to input a string of characters and check whether it is a palindrome using Dequeue
 */

 //require function in the below file to work !!!!dont remove!!!!!!
require("Utility.php");

/**
 * Function to check if a string is pallindrome or not using dequeue
 */
function isPallindrome(){
    //class containing dequeue and its functions
    require("Dequeue.php");
    //creating new dequeue
    $deq = new Dequeue();
    //taking user input to search
    echo "Enter a string to check for pallindrome ";
    $str = Utility::getString();
    //adding string characters to the dequeue
    for ($i=0; $i < strlen($str) ; $i++) { 
        $deq->addRear($str[$i]);
    }
    //checking if pallindrome
    for ($i=0; $i <strlen($str)/2 ; $i++) { 
        /**
         * removing from front and back and chacking simultaneously is they are same or not
         */
         $f = $deq->removeFront();
         $r = $deq->removeRear();
         if($f!=$r){
             echo "\nNot Pallindrome";
             return false ;
         }
         echo "\nIs Pallindrome";
         return true;
    }
}

isPallindrome();
?>
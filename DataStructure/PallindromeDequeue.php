<?php
require("Utility.php");
function isPallindrome(){
    require("Dequeue.php");
    $deq = new Dequeue();
    echo "Enter a string to check for pallindrome ";
    $str = Utility::getString();
    for ($i=0; $i < strlen($str) ; $i++) { 
        $deq->addRear($str[$i]);
    }
    for ($i=0; $i <strlen($str)/2 ; $i++) { 
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
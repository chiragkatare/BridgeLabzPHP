<?php
require("Utility.php");
require("Queue.php");
$counter = function(){
        $withd = array(0 , 0);
        $deps = array(0 , 0);
        $deposit = function($amount) use ($deps){
            $deps[0] += $amount ;
            $deps[1]++;
            return $deps ;
        };
        $withdraw = function($amount) use ($withd){
            $withd[0] += $amount ;
            $withd[1]++ ;
            return $withd ;
        };
        $q = new Queue();
        echo "Enter total people in queue ";
        $people = Utility::getInt();
        for ($i=0; $i < $people ; $i++) { 
            echo "Enter 1 to deposit or 2 to withdraw ";
            $n = Utility::getInt();
            if($n===1){
                echo "Enter amount ";
                $amount = Utility::getInt();
                $q->enqueue($amount);
            }
            else if($n===2){
                echo "Enter amount ";
                $amount = Utility::getInt();
                $q->enqueue($amount*-1);
            }
            else{
                echo "enter correct input";
                $i--;
            }
        }
    while(!$q->isEmpty()){
       // echo "While";
        $am = $q->dequeue();
        if($am<0){
            $withd = $withdraw($am);
        }
        else{
           $deps = $deposit($am);
        }
    }
    echo "Deposited amount = $deps[0]\n";
    echo "Withdrawed amount = $withd[0]\n"*-1;
};

$counter();
?>
<?php
/**
 * Simulates a gambler who start with $stake and place fair $1 bets until he/she goes broke 
 * (i.e. has no money) or reach $goal. Keeps track of the number of times he/she wins and
 *  the number of bets he/she makes. Run the experiment N times, averages the results, and prints them out.
 */
require("Utility.php");
class Gambler{

    /**
     * Function to initiate gambling in the function 
     */
    function gamble(){
        echo "stack should be less than goal\n";
        echo "Enter stack ";
        $stack = Utility::getInt();
        echo "enter goal ";
        $goal = Utility::getInt();
        echo "enter times to play ";
        $times = Utility::getInt();
        $bets = 0 ;
        $wins = 0 ;
        //loop to gamble no of time given by user
        for($i = 0 ; $i < $times ; $i++){
            $cash = $stack ;
            //lopp till player got broke or win
            while($cash>0&&$cash<$goal){
                $bets++;
                if(rand(0,1)==0){
                    $cash++;
                }
                else{
                    $cash--;
                }
                if($cash==$goal){
                    $wins++;
                }
            }
        }
        // display results of gamble
        echo $wins." wins out of ".$times;
        echo "\ntotal bets : ".$bets."\n" ;
        echo "wins % is ".($wins/$times * 100)."%\n";
    }
}

Gambler::gamble();
?>
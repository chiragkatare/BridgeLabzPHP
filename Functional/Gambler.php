<?php
require("Utility.php");
class Gambler{
    function gamble(){
        echo "Enter stack ";
        $stack = Utility::getInt();
        echo "enter goal ";
        $goal = Utility::getInt();
        echo "enter times to play ";
        $times = Utility::getInt();
        $bets = 0 ;
        $wins = 0 ;
        for($i = 0 ; $i < $times ; $i++){
            $cash = $stack ;
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
        echo $wins." wins out of ".$times;
        echo "\ntotal bets : ".$bets."\n" ;
        echo "wins % is ".($wins/$times * 100);
    }
}

Gambler::gamble();
?>
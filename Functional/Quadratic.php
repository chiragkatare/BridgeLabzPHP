<?php
require("Utility.php");
class Quadratic{
    function calc(){
        echo "roots for a*x*x+b*x+c \n";
        echo "enter a ";
        $a = Utility::getInt();
        echo "enter b " ;
        $b = Utility::getInt();
        echo "enter c ";
        $c = Utility::getInt();
        $delta = $b*$b-4*$a*$c;
        $delta = abs($delta);
        $root1 = (-$b + sqrt($delta))/(2*$a);
        $root2 = (-$b - sqrt($delta))/(2*$a);
        echo "roots are ".$root1." & ".$root2;
    }
}
Quadratic::calc();
?>
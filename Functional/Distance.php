<?php
require("Utility.php");
class Distance{
    function dist(){
        echo"Enter value of x ";
        $x = Utility::getInt();
        echo"Enter value of y ";
        $y = Utility::getInt();
        $sqrt  =sqrt(($x*$x)+($y*$y));
        echo "distance is ".$sqrt."\n";
    }
}
Distance::dist();

?>
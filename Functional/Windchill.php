<?php
require("Utility.php");
class Windchill{
    function cal(){
        echo "enter speed ";
        $ws = Utility::getInt();
        echo "enter temperature " ;
        $f = Utility::getInt();
        $w =  35.74 + 0.62158 * $f + (0.4275 * $f - 35.75) * $ws**0.16;
        echo "Wind chill is ".$w."\n";

    }
}
Windchill::cal();
?>
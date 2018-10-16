<?php
require("Utility.php");
class TemperatureConversion{
    static function tempconv($temp , $chtemp){
        if(strpos($chtemp , "c")===false){
            $conv =  ($temp * 9/5) + 32 ; 
        }
        else{
            $conv =  ($temp - 32) * 5/9 ; 
        }
        return $conv ;
    }

    static function main(){
        echo "enter temperature";
        $temp = Utility::getInt();
        echo "enter c or f for given temperature";
        $chtemp = Utility::getString();
        $conv = self::tempconv($temp , $chtemp);
        echo "converted temperature is ".$conv."\n" ;
    }
}
TemperatureConversion::main();
?>
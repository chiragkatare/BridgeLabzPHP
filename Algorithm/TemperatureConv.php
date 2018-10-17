<?php
/**
 *given the temperature in fahrenheit as input outputs the 
 * temperature in Celsius or viceversa
 * 
 * @author chiragkatare
 * @version 1.0   
 * @since 15-10-2018
 */

 //requires function in utility class
require("Utility.php");
class TemperatureConversion{

    /**
     * function to get user input and test the class
     */
    static function main(){
        echo "enter temperature ";
        $temp = Utility::getInt();
        echo "enter c or f for given temperature ";
        $chtemp = Utility::getString();
        $conv = Utility::tempconv($temp , $chtemp);
        echo "converted temperature is ".$conv."\n" ;
    }
}
//calling main function
TemperatureConversion::main();
?>
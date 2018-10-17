<?php
/**
 *given the temperature in fahrenheit as input outputs the 
 * temperature in Celsius or viceversa
 * 
 * @author chiragkatare
 * @version 1.0   
 * @since 15-10-2018
 */
require("Utility.php");

class ToBinary{

    static function main(){
        echo "Enter No to convert to binary ";
        $dec = Utility::getInt();
        echo "Binary no is  : ".Utility::toBin($dec)."\n";
    }
}


ToBinary::main();
?>
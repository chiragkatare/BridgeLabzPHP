<?php
/**
 * to compute the square root of a nonnegative number c given 
 * in the input using Newton's method
 * 
 * @author chiragkatare
 * @version 1.0   
 * @since 15-10-2018
 */

require("Utility.php");

class NewtonSqrt{

    /**
     * main Function to test the program
     */
    static function main(){
        //getiing user input
        echo "enter no for square root ";
        $n = Utility::getInt();
        //calculating sqr root by passing $n to sqrt function
        $sqrt = Utility::sqrt($n);
        echo "Square root is ".$sqrt."\n";
    }
}
//calling main function to test the class
NewtonSqrt::main();
?>
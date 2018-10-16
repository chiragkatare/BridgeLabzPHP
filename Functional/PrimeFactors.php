<?php 
/**
 * Computes the prime factorization of N using brute force.
 */
require("Utility.php");
class PrimeFactors{
    //checks the no if its divisible by a prime no or not
    function primeF(){
        echo "Enter a no : ";
        $numb = Utility::getInt();
        if(Utility::isPrime($numb)){
            echo $numb;
            return ;
        }
        $num = $numb ;
        for($i = 2 ; $i<=$numb/2 ; $i++){
            while($num%$i==0){
                if(Utility::isprime($i)){
                    echo $i."x";
                    $num /=$i;
                }
            }
        }
        echo "\n";
    }
}
//calling the method
PrimeFactors::primeF();
?>
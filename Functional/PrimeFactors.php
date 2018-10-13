<?php 
require("Utility.php");
class PrimeFactors{
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

PrimeFactors::primeF();
?>
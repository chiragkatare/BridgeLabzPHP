<?php

/**
 * Program to check if words are anagram or not ;
 */
require("Utility.php");
class Anagram{

    function isAnagram(){
        echo "Enter first word ";
        $s1 = Utility::getString();
        echo "enter second word ";
        $s2 = Utility::getString();
        if(Utility::isAnagram($s1 ,$s2)){
            echo "anagrams";
        }
        else{
            echo"Not Anagram";
        }
    }

        function prime1000(){
            $prime = array();
            $s = 0 ;
            for($i = 0 ;$i <1000 ; $i++){
                if(Utility::isPrime($i)){
                    $prime[$s++]= $i;
                }
            }
            return $prime ;
        }

        function primeAnagrams($prime){
            $n = count($prime);
            for($i = 0 ;$i <$n ; $i++){
                for($j = 0 ;$j <$n ; $j++){
                    if($i!=$j){
                        if(Utility::isAnagram((string)$prime[$i],(string)$prime[$j])){
                            echo $prime[$i]." ".$prime[$j]."\n";
                        }
                    }
                }
            }
        }

        function main(){
            self::primeAnagrams(self::prime1000());
        }
}

Anagram::main();

?>
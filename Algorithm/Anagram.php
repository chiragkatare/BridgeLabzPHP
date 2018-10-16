<?php

/**
 * One string is an anagram of another if the second is simply a rearrangement of the first. 
 * For example, 'heart' and 'earth' are anagrams..
 * 
 * @author chiragkatare
 * @version 2.0   
 * @since 15-10-2018
 */
require("Utility.php");
class Anagram{

    /**
     * function to take user inputs and check the strings are anagrams or not
     */
    function isAnagram(){
        echo "Enter first word ";
        //Calling method in utility class to input string
        $s1 = Utility::getString();
        echo "enter second word ";
        $s2 = Utility::getString();
        //function in anagram to check for anagram and print result accordingly
        if(Utility::isAnagram($s1 ,$s2)){
            echo "anagrams";
        }
        else{
            echo"Not Anagram";
        }
    }

    /**functio tofind the prime no bw 0 to 1000
     * 
     */
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

        /**
         * function to find the prime no which also anagrams bw 0 to 1000
         */
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

        //main function to test the above function
        function main(){
            self::primeAnagrams(self::prime1000());
        }
}

//calling main function
Anagram::main();

?>
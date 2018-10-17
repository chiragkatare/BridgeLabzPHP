<?php
/**
 * Takes a command-line argument N, asks you to think of a number between 0 and N-1, where N = 2^n, 
 * and always guesses the answer with n questions.
 * 
 * @author chiragkatare
 * @version 2.0   
 * @since 15-10-2018
 */
require("Utility.php");
class SearchGame{

    /**
     * function to guess the no given by user in 2^n times
     */
    function search(){
        $low = 0 ;
        $high = 1023 ;
        for($i = 0 ;$i < 100 ;$i++){
            while($low<=$high){
                $mid = round(($low + $high)/2);
                echo "If your no is bw ".$low." and ".$mid." press 1\n";
                echo "If your no is bw ".$mid." and ".$high." press 2\n";
                //gettin user no for choice
                $s = Utility::getInt();
                /**
                 * user enters 2 and 1 according to output
                 */

                 //if low is high then the no is found
                if($high == $mid){
                    echo "your no is ".$high;
                    return $high ;
                }
                else if($s!=1){
                    $low = $mid;
                }
                else{
                    $high = $mid;
                }
            }
        } 
    }
}
echo "Gues number between 0 to 1027 ";
SearchGame::search();
?>
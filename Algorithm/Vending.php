<?php
require("Utility.php");
    /**
     * Program to calculate the minimum number of Notes as well as the Notes to be returned by the Vending
     *  Machine as a Change
     * @author chiragkatare
     * @version 2.0   
     * @since 15-10-2018
     */
class Vending{
    /**
     * function to check the notes of given amount using recursion
     */
    static $note = array(1,2,5,10,50,100,500,1000);


    static function recNotes($amount, $noteSize){
        if($noteSize<0){
            return ;
        }
        if(floor($amount/self::$note[$noteSize]) != 0){
            echo floor($amount/self::$note[$noteSize])." notes of ".self::$note[$noteSize]." rs\n";
        }
        $amount %=self::$note[$noteSize];
        $noteSize--;
        self::recNotes($amount,$noteSize);
        return ;
     }
    function notes ($amount){
        //array to store the values of note machine has
        $note = array(1,2,5,10,50,100,500,1000);
        $size = sizeof($note);
        //loop to check fot the no of notes required and print it 
        for($i = $size-1 ; $i >=0 ; $i--){
            if(floor($amount/$note[$i]) != 0){
                echo floor($amount/$note[$i])." notes of ".$note[$i]." rs\n";
            }
            //changing amount for next note value
            $amount %=$note[$i];
        }
    }
}
echo "enter amount ";
$amount = Utility::getInt();
Vending::recnotes($amount , 7);
?>
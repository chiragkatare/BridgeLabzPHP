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
     * function to check the notes of given amount
     */
    function notes (){
        //array to store the values of note machine has
        $note = array(1,2,5,10,50,100,500,1000);
        //empty array to store the value of notes
        echo "enter amount \n" ;
        $amount = Utility::getInt();
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
Vending::notes();
?>
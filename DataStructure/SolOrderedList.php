<?php

/**
 * Read .a List of Numbers from a file and arrange it ascending Order in a Linked List. Take user 
 * input for a number, if found then pop the number out of the list else insert the number in 
 * appropriate position
 * 
 * @author chiragkatare
 * @version 1.0   
 * @since 15-10-2018
 */

 //requires the function in below files to work
require("Utility.php");
require("OrderedList.php");

class SolOrderedList{

    /**
     * Function to search the word and add it in the file if not found or remove it if found
     */
    function search(){
        //name of the file
        $fname = "number.txt";
        //reading file
        $contents = Utility::readFile($fname);
        echo $contents ;
        //creating array of words
        $contents = explode(" ",$contents);
        $list = new OrderedList();
        //adding in the list
        for ($i=0; $i < count($contents); $i++) { 
            $list->add((int)$contents[$i]);
        }
        echo "contents in the list are \n".$list ;
        $file = fopen($fname ,"w") or die("Unable to open file ");
        echo "\nenter to search in the list ";
        $element = Utility::getInt();
        //searching in the list
        if($list->search($element)===true){
            echo "Element found \n removing element \n";
            $list->remove($element);
            echo $list."\n";
        }
        else{
            echo "Element not found \n Adding element \n";
            $list->add($element);
            echo $list."\n" ;
        }
        //wriring back to the file
        fwrite($file ,$list->getString());
    }
}
SolOrderedList::search();
?>
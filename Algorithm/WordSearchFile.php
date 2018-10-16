<?php
/**
 * Read in a list of words from File. Then prompt the user to enter a word to search the list.
 * The program reports if the search word is found in the list
 * 
 * @author  chiragkatare
 * @version 2.0   
 * @since   15-10-2018
 */
require("Utility.php");
class SearchWord{

    /**
     * function tpo read a file 
     * 
     * @return contents the contents of the file
     */
    static function readFile(){
        $fname = "words.txt";
        //opens the file if not found die by printing the error file not found
        $file = fopen($fname ,"r") or die("Unable to open file ");
        //reads the file and save the contents in the string
        $contents = fread($file , filesize($fname));
        //returns contents
        return $contents ; 
    }

    /**
     * function to take input from user and search in the file 
     */
    static function search(){
        echo "enter a word to search";
        $search = Utility::getString();
        $fcontents = self::readFile();
        $arr = explode(" ",$fcontents);
        //binary search the word in the file
        if(Utility::binarySearch($search , $arr)!==false){
            echo "Word found";
        }
        else{
            echo "not found";
        }
    }
}
SearchWord::search();
?>
<?php
/**
 * Program to replace strings in a string using regex
 * 
 * @author chiragkatare
 */

 //require function in below file to work properly
require("Utility.php");

function handler($exception){
    echo "exception occurred check logfile";
}

/**
 * Function to run and test the program 
 */
function change(){
    /**
     * Taking user input
     */
    //string to hold the original string to display
    $string = "Hello <<name>>, We have your full name as <<full name>> in our system. your contact number is 91-xxxxxxxxxx.\nPlease,let us know in case of any clarification.\nThank you\nBridgeLabz\nxx/xx/xxxx.";
    echo "enter first name ";
    //var fname to hold the first name 
    $fname = Utility::getString();
    echo "enter last name ";
    //var lname to store the lastname
    $lname =  Utility::getString();
    echo "Enter mobile no ";
    //var $mobile to store the mobile number
    //validating mobile number
    while(strlen($mobile = Utility::getInt())<10){
        echo "Enter correct Mobile number\n";
    }
    //echo "enter date of birth date";
    //replacing mobile no using regex
    $string =preg_replace("/\d{2}\-x+/", $mobile ,$string );
    //replacing <<name>> using regex
    $string = preg_replace("/<+\w{4}>+/", $fname ,$string );
    //replacing <<fullname>> using regex
    $string = preg_replace("/<+\w+\s\w+>+/", $fname." ".$lname ,$string );
    //replacing todays date with current date
    $string = preg_replace("/x*\/x*\/x*/", date("d/m/Y") ,$string );
    echo "\n\n$string\n";

}

//calling the method to test the program 
change();

?>
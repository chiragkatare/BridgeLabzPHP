<?php


/**
 * Create a JSON file having Inventory Details for Rice, Pulses and Wheats with properties name,
 * weight, price per kg.  Create the JSON from Inventory Object and output the JSON String
 * 
 * @author chiragkatare
 */

 /**
 * set top level error handler function to handle in case of error occurence
 * 
 */
set_error_handler(function ($errno, $errstr, $error_file, $error_line) {
    echo "!!!!Error Occured!!!!!!!\n";
    echo "Error: [$errno] $errstr - $error_file:$error_line \n";
    echo "Terminating!!!!!!!!!\n";
    die();
});

 //require funtion in the file below to work properly
require("Utility.php");

/**
 * inventory class with properties to create object
 */
class Inventory{

    /**
     * Constructor function to initialize the object properties
     */
    function __construct($name , $weight , $price)
    {
        $this->name = $name ;
        $this->weight = $weight ; 
        $this->price = $price ;
    }

    //variable to store name weight and price per kg of the object in inventory
    public $name ;
    public $weight ;
    public $price ;
}

/**
 * funtion to create the objects of the inventory and return it as an array of objects 
 * 
 * @return arr array of the objects 
 */
function arrayObject(){
   // echo "Enter No Of Items In Inventory : ";
    $name = ["Rice","Wheat","Pulses"];
    $arrObj = [];
    for ($i=0; $i < 3 ; $i++) { 
        // echo "enter name of item ";
        // $name = Utility::getString();
        echo "enter price of ".$name[$i]."  ";
        $weight = Utility::getInt();
        echo "enter weight of ".$name[$i]." in kg  ";
        $price = Utility::getInt();
        echo "\n\n";
        $arrObj[$i] = new Inventory($name[$i] , $weight , $price) ;
    }
    // $rice = new Inventory("Rice" , 5 , 52 );
    // $wheat = new Inventory("wheat", 10 , 32 );
    // $pulses = new Inventory("Pulses" , 15 , 90);
    // $arrObj['wheat'] = $wheat ;
    // $arrObj['rice'] = $rice ;
    // $arrObj['pulses'] = $pulses ;
     return $arrObj ;
}

/**
 * Function to convert array to json string and ut it in to the file
 * 
 * @param arr the array which to put
 * @param file the loction of the file to put it
 */
function jsonPut($arr ,$file){
    //converts to json string
   $json =  json_encode($arr);
   //writing it in to the files
   file_put_contents($file ,$json);
}

/**
 * function to read the json string from the file and return it as an array
 * 
 * @param file the location of the file to read the json string
 * @return arr the array we get from the jason string
 */
function getJson($file){
    //saving the string from the files in the variable
    $contents = file_get_contents($file);
    //decoding the json string 
    $arr = json_decode($contents ,true);
    //returning the decoded array
    return $arr ;
}

/**
 * Function to print the value from the program by calculating the price
 */
function printValue($arr){
    //var to store the total price.
    $price = 0 ;
    //loop to go through the array
    for ($i=0; $i < count($arr) ; $i++) { 
        //calculating price of the sigle object
        $tt = $arr[$i]['weight']*$arr[$i]['price'];
        echo "Price for ".$arr[$i]['name']." is : ".$tt ."rs\n" ;
        //adding to total prize
        $price += $tt ;
    }
    //printing total price
    echo "Total Price is : ".$price."rs\n";
}

/**
 * function to run and test the above program
 */
function run(){
    //file to save and get json from
    $file = "Inventory.json";
    //getting array of oblect from the function
    $arr = arrayObject();
    //putting the array of object in the file as json
    jsonPut($arr, $file);
    //reading json from the file and decoding to array
    $jsonArr = getJson($file);
    //printing the inventory
    printValue($jsonArr);
}

//method to call and test the program above
run();
?>
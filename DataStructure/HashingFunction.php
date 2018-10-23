<?php
/**
 * Create a Slot of 10 to store Chain of Numbers that belong to each Slot to efficiently search a 
 * number from a given set of number
 */

 //require function from the file below to work
require("Utility.php");
require("OrderedList.php");

/**
 * Function calculate the hash value of the function
 * @param Integer the value which to find the hash value
 * @return hash the hash index of the number
 */
function hashv($value){
    return $value%10;
}

/**
 * function to initialize the list array 
 * @return Array the array containg 10 list objects
 */
function initList(){
    $arr = [];
    for ($i=0; $i < 10; $i++) { 
        $arr[$i] = new OrderedList();   
    }
    return $arr ;
}

/**
 * Function to  run the program and perform hashing and print output to the user
 */
function hashing(){
    $list = initList();
    $numbers = explode(" ",Utility::readFile("number.txt"));
    print_r($numbers);
    for ($i=0; $i <count($numbers) ; $i++) {
        $l = (int)$numbers[$i]%10;
        $list[$l]->add((int)$numbers[$i]);
        }
        echo "list : ".showList($list);;
    echo "Enter no to search\n";
    $num = Utility::getInt(); 
    $l = (int)$num%10;
    if($list[$l]->search($num)){
        echo "Number found\nRemoving......\n";
        $list[$l]->remove($num);
    }
    else{
        echo "Number Not Found\nAdding......\n";
        $list[$l]->add($num);
    }
    writeFile($list);
}

/**
 * Function to write string in to a file 
 */
function writeFile($list){
    $file = fopen("number.txt" ,"w") or die("Unable to open file ");
        fwrite($file ,showList($list));
}

/**
 * function to show the contents of the list as string 
 * 
 * @param List the list which has values
 * @return String the value of thenlist as a string
 */
function showList($list){
    $s = "" ;
    for ($i=0; $i <count($list) ; $i++) { 
        $s.= $list[$i]->getString()." ";
    }
    return $s."\n" ;
}

//calling the method
hashing();
?>
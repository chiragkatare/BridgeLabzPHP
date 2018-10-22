<?php
require("Utility.php");
require("OrderedList.php");
function hashv($value){
    return $value%11;
}
function hashing(){
    $list = array_fill(0,10,new OrderedList());
    $numbers = explode(" ",Utility::readFile("number.txt"));
    print_r($numbers);
    for ($i=0; $i <count($numbers) ; $i++) {
        $l = (int)$numbers[$i]%10;
        $list[$l]->add((int)$numbers[$i]);
        }
        echo "list : ".showList($list);;
    echo "Enter no to search\n";
    $num = Utility::getInt();
































    
    if($list[hashv($num)]->search($num)){
        echo "Number found\nRemoving......";
        $list[hashv($num)]->remove($num);
    }
    else{
        echo "Number Not Found\nAdding......";
        $list[hashv($num)]->add($num);
    }
    writeFile($list);
}

function writeFile($list){
    $file = fopen("number.txt" ,"w") or die("Unable to open file ");
        fwrite($file ,showList($list));
}

function showList($list){
    $s = "" ;
    for ($i=0; $i <count($list) ; $i++) { 
       // $s.=
         echo $list[$i]->getString()." \n";
    }
    //return $s."\n" ;
}

hashing();
?>
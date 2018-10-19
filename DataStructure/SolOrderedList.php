<?php
require("Utility.php");
require("OrderedList.php");
class SolOrderedList{
    function search(){
        $fname = "number.txt";
        $contents = Utility::readFile($fname);
        echo $contents ;
        $contents = explode(" ",$contents);
        $list = new OrderedList();
        for ($i=0; $i < count($contents); $i++) { 
            $list->add((int)$contents[$i]);
        }
        echo "contents in the list are \n".$list ;
        $file = fopen($fname ,"w") or die("Unable to open file ");
        echo "\nenter to search in the list ";
        $element = Utility::getInt();
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
        fwrite($file ,$list->getString());
    }
}
SolOrderedList::search();
?>
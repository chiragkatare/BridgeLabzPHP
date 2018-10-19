<?php
require("Utility.php");
require("UnOrderedList.php");
class SolUnOrdered{
    function search(){
        $filen = "words.txt";
        $contents = Utility::readFile($filen);
        echo "contents ".$contents;
        $contents = explode(" ",$contents);
        $list = new UnOrderedList();
        for ($i=0; $i < count($contents); $i++) { 
            $list->append($contents[$i]);
        }
        echo "contents in the list are \n".$list ;
        $file = fopen($filen ,"w") or die("Unable to open file ");
        echo "\nenter to search in the list ";
        $element = Utility::getString();
        if($list->search($element)===true){
            echo "Element found \n removing element \n";
            $list->remove($element);
            echo $list;
        }
        else{
            echo "Element not found \n Adding element \n";
            $list->append($element);
            echo $list ;
        }
        fwrite($file ,$list->getString());
    }
}

Solunordered::search();

?>
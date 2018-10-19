<?php
include("UnOrderedList.php");
class Stack{

    private $list ;

    function __construct(){
        $this->list = new UnOrderedList();
    }
    function push($data){
        $this->list->append($data);
    }

    function pop(){
       return $this->list->pop();
    }
    
    function isEmpty(){
        return $list->isEmpty();
    }

    function size(){
        return $this->list->size();
    }
}
?>
<?php
/**
 * Node class for the linked list
 */

class Node{
    //for storing the data
    public $data ;
    public $next = null ;
    
    function __construct($data){
        $this->data = $data ;
    }    
}
?>
<?php

/**
 *custom Ordered linked list with its popular methods
 * 
 * @author chiragkatare
 * @version 1.0   
 * @since 19-10-2018
 */

 require("Node.php");

class OrderedList{

    //head to hold the starting node
    public $head ;

    //tail to hold the ending node 
    private $tail ; 

    //size to hold the value of size of linked list
    private $size = 0 ; 

    /**
     * To string overriden to print the values in list
     */
    function __toString(){
        $s = "{ ";
        $node = $this->head ;
        While($node !=null){
            $s.=$node->data."," ;
            $node = $node->next ;
        }
         $s = substr($s, 0, -1);
        return $s." }";
    }

    /**
     * function to get the elements of list as string
     */
    function getString(){
        $s = "";
        $node = $this->head ;
        While($node !=null){
            $s.=$node->data." " ;
            $node = $node->next ;
        }
         $s = substr($s, 0, -1);
        return $s ;
    }

    /**
     * function to return the size of linked list
     */
    function size(){
        return $this->size;
    }

    /**
     * function to check if the list is empty or not 
     */
    function isEmpty(){
        return $this->head === null ;
    }

    /**
     * function to remove the data given as argument removes only if data is there 
     */
    function remove($data){
       if($this->isEmpty()){
           echo "list empty ";
           return ;
       }
       else if($this->head->data==$data){
           $this->head = $this->head->next ;
           $this->size--;
           return;
       }
       else{
        $node = $this->head ;
        $prev ;
        while($node->data !== $data ){
            $prev = $node ; 
            $node = $node->next ;
        }
        $prev->next = $node->next ;
        $this->size--;
       }
    }

    /**
     * Function to search the data in linked list 
     * 
     * 
     * @return Boolean True if found and false if not found
     */
    function search($data){
        $node = $this->head ;
        while($node!=null){
            if($node->data == $data){
                return true ;
            }
            $node = $node->next ;
        }
        return false ;
    }

    /**
     * Function to add the data in parameter at the start of linked list
     * 
     * @param data the data to be added
     */
    function add($data){
        $temp = new Node($data);
        //check if list is empty
        if($this->isEmpty()){
            //add at first ie head;
            $this->head = $temp;
            $this->head->next = $this->tail ;
        }
        //check id data is less than the data in head
        else if($this->head->data>$data){
            $temp->next = $this->head ;
            $this->head = $temp ;
        }
        //stores in desired position
        else{
            $node = $this->head ; 
            $prev ;
            while($node!=null){
                if($data < $node->data){
                    $prev->next = $temp ;
                    $temp->next = $node ;
                    $this->size++;
                    return ;
                }
                $prev = $node ;
                $node = $node->next ;
            }
            $prev->next = $temp ;
            
        } 
        //incrementing size
        $this->size++;  
    }

    /**
     * Function to return the index of the given data
     * @param data $data the data which to give the index
     * @return the index of the data 
     */
    function index($data){
        if($this->search($data)===false){
            return false ;
        }
        else{
            $node = $this->head;
            $index = 0 ;
            while ($node->data!==$data) {
                $node = $node->next ;
                $index++;
            }
        return $index ;
    }
    }

    /**
     * function to remove the last element in the list and return it
     * 
     * @return data which is removed
     */
    function pop(){
        if($this->size()==0){
            echo "empty";
            return ;
        }
        if($this->head->next == null){
            $this->head = null ;
            $this->size--;
            return;
        }
        $node = $this->head ;
        $prev ;
        while($node->next!= null){
            $prev = $node ;
            $node = $node->next ;
        }
        $prev->next = null;
        $this->size--;
    }









}
?>


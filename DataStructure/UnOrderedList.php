<?php

/**
 *custom unordered linked list with its popular methods
 * 
 * @author chiragkatare
 * @version 1.0   
 * @since 19-10-2018
 */

 require("Node.php");

class UnOrderedList{

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
     * Function to add data at the end of the list 
     */
    function append($data){
        //creatin new node with data 
        $temp = new Node($data);
        //checking if the list is empty and if it will add at the start
        if($this->isEmpty()){
            $this->head = $temp;
            $this->head->next = $this->tail ;
        }
        //or else it will add at the end 
        else{
            $node = $this->head ;
            //traversing to the last node 
            while($node->next!=null){
                $node = $node->next ;
            }
            $node->next = $temp;
        } 
        //increasin size ;
        $this->size++;
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
        while($node->data!=null){
            if($node->data == $data){
                return true ;
            }
            $node = $node->next ;
        }
        return false ;
    }

    /**
     * Function to add the data at the start of linked list
     * 
     * @param data the data to be added
     */
    function add($data){
        $temp = new Node($data);
        if($this->isEmpty()){
            $this->head = $temp;
            $this->head->next = $this->tail ;
        }
        else{
            $temp->next = $this->head ;
            $this->head = $temp ;
        } 
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
     * function to insert the data at the given position 
     * @param pos the position / index at which to insert the data 
     * @param data the data which to insert
     */
    function insert($pos , $data){
        //checks if the index is correct
        if($pos<0&&$pos>$this->size()){
            echo "wrong position ";
            return;
        }
        // checks if the index is 0 ie head
        else if($pos === 0 ){
            $this->add($data);
            return;
        }
        //checks if index is the last value
        else if($pos==$this->size()){
            $this->append($data);
            return ;
        }
        else{
            $node = $this->head ;
            $temp = new Node($data);
            for ($i=0; $i < $pos-1 ; $i++) { 
                   $node = $node->next ;
            }
            $n = $node->next ;
            $node->next = $temp ;
            $temp->next = $n;
            $this->size++;
        }

    }

    /**
     * function to remove the last element in the list and return it
     * 
     * @return data which is removed
     */
    function pop(){
        try{
            if($this->size()==0){
                //throws exception when try to pop from epty list
                throw new Exception("No Item To Pop ,Empty!!!!!!");
            }
            if($this->head->next == null){
                $data = $this->head->data;
                $this->head = null ;
                $this->size--;
                return $data ;
            }
            $node = $this->head ;
            $prev ;
            while($node->next!= null){
                $prev = $node ;
                $node = $node->next ;
            }
            $ret = $node->data ;
            $prev->next = null;
            $this->size--;
            return $ret;
        }
        catch(Exception $e){
            echo "\n",$e->getMessage(),"\n";
        }
    }

    /**
     * function to pop the element from the desired position
     * 
     * @throws Exception if list is empty
     */
    function popPos($pos){
        try{
           if($pos<0&&$pos>$this->size()-1){
               throw new Exception("Index Out Of Bound");
               return;
           }
           else if($this->size()==0){
               //throws exception when try to pop from empty list
               throw new Exception("No Item To Pop ,Empty!!!!!!");
           }
           else if($pos == 0){
               $data = $this->head->data;
               $this->head = $this->head->next ;
               $this->size--;
               return $data;
           }
           else{
               $count = 0 ;
               $node = $this->head ;
               $prev ;
               while($pos!=$count){
                   $prev = $node ;
                   $node = $node->next ;
                   $count++;
               }
               $data = $node->data;
               $prev->next = $node->next ;
               $this->size--;
               return $data ;
           }
        }
        catch(Exception $e){
            echo "\n",$e->getMessage();
        }
   }
}


?>


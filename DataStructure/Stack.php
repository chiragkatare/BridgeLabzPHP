<?php
include("UnOrderedList.php");
class Stack
{

    //creting the list to store stack values
    private $list;

    //constructor for initializing the values
    public function __construct()
    {
        $this->list = new UnOrderedList();
    }

    //function to push the data in the stack 
    function push($data)
    {
        $this->list->append($data);
    }

    function __toString()
    {
        return $this->list->__toString();
    }

    /**
     * Function to remove the data from the stack 
     * 
     * @return data the data last stored 
     */
    function pop()
    {
        if ($this->list->isEmpty()) {
            echo "empty";
            return;
        }
        return $this->list->pop();
    }

    /**
     * function to check if the stack is emtpty or not
     */
    function isEmpty()
    {
        return $this->list->isEmpty();
    }

    /**
     * function to return the size of thre stack
     * @return size of the satch
     */
    function size()
    {
        return $this->list->size();
    }
}
?>
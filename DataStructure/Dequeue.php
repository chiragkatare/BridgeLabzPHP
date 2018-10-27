<?php

/**
 * Custiom daata structure queue with its popular method implemented on linked list
 */
require("UnOrderedList.php");
class Dequeue
{

    /**
     * list to store the element and implement linked list
     */
    private $list;

    /**
     * Constructor function to initialize the list 
     */
    function __construct()
    {
        $this->list = new UnOrderedList();
    }

    /**
     * function to push data at the end of the queue
     * @param item the item to be pushed
     */
    function addRear($item)
    {
        $this->list->append($item);
    }

    /**
     * function to push data at the start of the queue
     * @param item the item to be pushed
     */
    function addFront($item)
    {
        $this->list->add($item);
    }

    /**
     * Function to remove the item from the start of the list
     */
    function removeFront()
    {
        return $this->list->popPos(0);
    }


    /**
     * Function to remove the item from the end of the list
     */
    function removeRear()
    {
        return $this->list->popPos($this->size() - 1);
    }

    /**
     * Function to check if the queue is empty or not
     * @return boolean true of false
     */
    function isEmpty()
    {
        return $this->list->isEmpty();
    }

    /**
     * Function to check the size of queue
     * @return size the size of the queue
     */
    function size()
    {
        return $this->list->size();
    }

    function __toString()
    {
        return $this->list->__toString();
    }
}

?>
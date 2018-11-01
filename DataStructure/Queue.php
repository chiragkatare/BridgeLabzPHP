<?php

/**
 * Custiom daata structure queue with its popular method implemented on linked list
 */
require_once("UnOrderedList.php");
class Queue
{

    /**
     * list to store the element and implement linked list
     */
    public $list;

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
    function enqueue($item)
    {
        $this->list->append($item);
    }

    /**
     * Function to remove the item from the start of the list
     */
    function dequeue()
    {
        return $this->list->popPos(0);
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
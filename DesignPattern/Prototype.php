<?php

/**
 * top level exception handler function to handle exception
 */
set_exception_handler(function ($e){
    echo "\nException Occurred\n";
    echo $e->getMessage();
});

/**
 * Class subitem
 */
class SubItem{
}

/**
 * Class Item 
 */
class Item
{
    // var bame and sub to store name and the sub class object
    public $name;
    public $sub ;

    /**
     * constructor of the class to init properties
     */
    function __constructor($name)
    {
        $this->name = $name;
        $sub = new SubItem();
    }

    /**
     * Magic Method clone to clone the attributes/properties of the object
     */
    function __clone()
    {
        $this->name = clone $this->name ;
        $this->sub = clone $this->sub ;
    }
}


// function swap($arr)
// {
//     $i = $arr[0];
//     $arr[0] = $arr[1];
//     $arr[1] = $i;
//     array_push($arr[0], "1110");
//     echo print_r($arr);
//     //array_splice($arr,0,$arr[1]);
// }

//item 1 is the original object
$item1 = new Item("Iiiii");
//item 2 is the new object
$item2 = clone $Item1;

// $rr = ['aaaa', 'bbbb'];
// swap($arr);
?>
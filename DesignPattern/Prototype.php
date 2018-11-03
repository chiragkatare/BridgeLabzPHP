<?php
class Item
{
    public $name;
    function __constructor($name)
    {
        $this->name = $name;
    }
}

function prototype($item)
{
    $item->name = "dsjkghfjkhsjkfghkjd00";
}

function swap($arr)
{
    $i = $arr[0];
    $arr[0] = $arr[1];
    $arr[1] = $i;
    array_push($arr[0],"1110");
    echo print_r($arr);
    //array_splice($arr,0,$arr[1]);
}

$item1 = new Item("Iiiii");
$item2 = prototype($item1);
// /$item2->name = "jjjj";
//echo $item1->name;
$arr = ['aaaa', 'bbbb'];
swap($arr);
//echo print_r($arr); 

?>
<?php
$a = 5 ;
$ar = function ($int, $min, $max)
{
    while (filter_var($int, FILTER_VALIDATE_INT, array("options" => array("min_range" => $min, "max_range" => $max))) === false) {
        echo ("Variable value is not within the legal range\n");
        echo "enter again : ";
        $int = Utility::getInt();
    }
    return $int;
};
$arr = json_encode($ar);
file_put_contents("test.json",$arr);
?>
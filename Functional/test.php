<?php
$a1=array("a"=>"red","c"=>"blue","b"=>"green");
$a2=array("e"=>"red","f"=>"green","g"=>"blue");

$result=array_diff($a1,$a2);
echo var_dump($result);
?>
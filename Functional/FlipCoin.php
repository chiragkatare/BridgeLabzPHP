<?php
include("Utility.php");
$times = readline("enter no of times to flip");
$times = filter_var($times , FILTER_VALIDATE_INT);
Utility::flip($times);
?>
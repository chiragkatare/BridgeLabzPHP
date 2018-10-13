<?php
include("Utility.php");
echo "enter no of times to flip";
$times = Utility::getInt() ;
Utility::flip($times);
?>
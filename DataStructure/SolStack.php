<?php
/**
 * runner Program to check the working of the function BalParenthesis in utility
 */

 //require function from utility 
require("Utility.php");
// getting input from user
echo "Enter Expression to check for parenthesis\n";
$exp = Utility::getString();
//calling the bal parenthesis function
balParethesis($exp);
?>
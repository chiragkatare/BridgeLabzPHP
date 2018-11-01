<?php
set_error_handler(function ($errno, $errstr, $error_file, $error_line) {
    echo "!!!!Error Occured!!!!!!!\n";
    echo "Error: [$errno] $errstr - $error_file:$error_line \n";
    echo "Terminating!!!!!!!!!\n";

    die();
});

/**
 * Top level exception handler ;
 * called aitomaticaly by php at exception occurence
 */
set_exception_handler(function ($e){
    echo "\nException Occurred\n";
    echo $e->getMessage();
});
vooh();
?>
<?php

set_exception_handler(function ($e){
    echo "\nException Occurred\n";
    echo $e->getMessage();
});

$host = "localhost";
$user = "root";
$pass = "password";

    $conn = new PDO("mysql:host=$host;dbname=testdb", $user, $pass);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if(isset($conn)){
        $query = "INSERT INTO user(fname,lname,gender,mobile,email)
        VALUES('chirag','katare', 'm', 7415688262, 'chiragkatarle123@gmail.com')
        ;";
        $conn->query($query);
    }
?>
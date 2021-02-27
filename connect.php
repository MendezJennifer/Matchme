<?php

//Try to connect to the database
try
{
    //Data source name
    $dsn = 'mysql:host=172.31.22.43;
    dbname=Jennifer200454895';
    $username = 'Jennifer200454895';
    $password = 'wPMVb897yq';

    //Create instance of PDO object
    $db = new PDO($dsn,$username,$password);
}

catch(PDOException $e)
{
    //Display error message if things go wrong
    $error_message = $e->getMessage();
    echo 'Something went wrong ' . $error_message;
}
?>
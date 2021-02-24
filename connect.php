<?php

//Try to connect to the database
try
{
    //Data source name
    $dsn = 'mysql:host=localhost;
    dbname=Matchme';
    $username = 'root';
    $password = '';

    //Create instance of PDO object
    $db = new PDO($dsn,$username,$password);
    echo 'Connected sucesfully!';
}

catch(PDOException $e)
{
    //Display error message if things go wrong
    $error_message = $e->getMessage();
    echo 'Something went wrong ' . $error_message;
}
?>
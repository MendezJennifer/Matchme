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

    //Return SQL errors
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}

catch(PDOException $e)
{
    return "Issue connecting: {$error->getMessage()}";
}
?>
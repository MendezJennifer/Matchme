<?php
ob_start(); 

$item_id = filter_input(INPUT_GET,'id');
try 
{
    //Connect to database  
    require('connect.php'); 

    //Set query 
    $sql = "DELETE FROM closet WHERE item_id = :item_id;"; 

    //Prepare query  
    $statement = $db->prepare($sql); 

    //Bind parameters
    $statement->bindParam(':item_id', $item_id); 

    //Execute the query
    $statement->execute(); 

    //Close database connection
    $statement->closeCursor(); 
    header('location:profile.php'); 
}
catch(PDOException $e) 
{
    header('location:error.php'); 
}

ob_flush();
?>
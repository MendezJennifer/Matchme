<?php
    session_start();
    require_once("connect.php");
    $sql="DELETE FROM users WHERE id={$_SESSION['user']['id']}";
    $statement = $db->prepare($sql);
    $statement->execute();
    
    unset($_SESSION['user']);
    $_SESSION['successes'][]="User profile deleted sucessfully";

    header("Location: index.php");
    exit();

?>
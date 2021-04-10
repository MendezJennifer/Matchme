<?php

//if not logged in, redirect to log in page
session_start();
if(!$_SESSION['user'])
{
  $_SESSION['errors'][]="Please log in";
  header("Location: ./index.php");
  exit();
}

//Logout: destroy the session variable user
unset($_SESSION['user']);

//Redirect to log in page
header("Location: ./index.php");
exit();
?>
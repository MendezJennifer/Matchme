<?php

  // Connect to db
  require("connect.php");

  //SQL with an email placeholder
  $sql="SELECT * FROM users WHERE email= :email";
  
  // Prepare the SQL
  $stmt=$db->prepare($sql);
  
  // Bind the value to the placeholder (incidently this will also sanitize the value)
  $email=filter_input(INPUT_POST,'email',FILTER_VALIDATE_EMAIL);
  $password=filter_input(INPUT_POST,'password');
  $email=strtolower($email);
  $stmt->bindParam(":email",$email,PDO::PARAM_STR);

  // Execute
  $stmt->execute();

  // Check if we have a user and their password is correct
  $user=$stmt->fetch(PDO::FETCH_ASSOC);


  session_start();
  $auth=false;
  if(!$user) $auth=false;
  else $auth=password_verify($password,$user['password']);

  if(!$auth)
  {
    $_SESSION['errors'][]="Your email or password is incorrect";
    $_SESSION['form_values']=$_POST;

    header('Location: ./index.php');
    exit();
  }

  $_SESSION['user']=$user;
  $_SESSION['successes'][]="You have logged in!";
  header('Location: profile.php');
  exit();
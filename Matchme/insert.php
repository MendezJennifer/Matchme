<?php

  // Include recaptcha configuration
  include_once("recaptcha.php");

  //Validation  
  session_start();
  function error_handler ($errors) 
  {
    if (count($errors) > 0) 
    {
      $_SESSION['errors'] = $errors;
      $_SESSION['form_values'] = $_POST;
 
      header("Location: register.php");
      exit;
    }
  }

  // Create an array to hold all the field errors
  $errors = [];

  // Validate the recaptcha
  if (!empty($_POST['recaptcha_response'])) 
  {
    $secret = SECRETKEY;
    $verify_response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$_POST['recaptcha_response']}");
 
    $response_data = json_decode($verify_response);
    if (!$response_data->success) 
    {
      $errors[] = "Google reCaptcha failed: " . ($response_data->{'error-codes'})[0];
      error_handler($errors);
    }
  }

  // Collect our fields
  $username = filter_input(INPUT_POST, 'username');
  $email = filter_input(INPUT_POST, 'email',FILTER_VALIDATE_EMAIL);
  $email_confirmation = filter_input(INPUT_POST, 'email_confirmation');
  $password = filter_input(INPUT_POST, 'password');
  $password_confirmation = filter_input(INPUT_POST, 'password_confirmation');

  // Validate the necessary fields are not empty
  $required_fields = [
    'username',
    'email',
    'email_confirmation',
    'password',
    'password_confirmation'
  ];

  foreach($required_fields as $field)
  {
    if(empty($$field))
    {
        $human_field=str_replace("_"," ",$field);
        $errors[]="You cannot leave the {$human_field} blank.";
    }
  }

  // Validate the email is in the correct format
  if(!$email)
  {
    $errors[]="Invalid email.";
  }

  // Validate the email matches the email_confirmation
  if($email !== $email_confirmation)
  {
    $errors[]="The email doesn't match the email confirmation field.";
  }

  // Validate the password matches the password_confirmation
  if($password !== $password_confirmation)
  {
    $errors[]="The password doesn't match the password confirmation field.";
  }
  // Check if there errors
  error_handler($errors);

  /* END OF VALIDATION */

  /* NORMALIZATION */
  // Normalize the string fields (convert to lowercase and capitalize the first letter)

  // Lowercase the email
  $email=strtolower($email);

  // Hash the password
  $password=password_hash($password,PASSWORD_DEFAULT);

  /* END NORMALIZATION */

  /* SANITIZATION */
  // Sanitize all values on their insertion
  require_once('connect.php');
  $sql="INSERT INTO users (username,email,password) VALUES (:username, :email, :password);";
  $stmt = $db->prepare($sql);

  // Sanitize using the binding
  $stmt->bindParam(':username',$username,PDO::PARAM_STR);
  $stmt->bindParam(':email',$email,PDO::PARAM_STR);
  $stmt->bindParam(':password',$password,PDO::PARAM_STR);

  /* END SANITIZATION */

  // Insert our row
  try
  {
    $stmt->execute();
    $_SESSION['successes'][]="You have been registered sucessfully.";
    header("Location: login.php");
    exit();
  }
  catch(Exception $error)
  {
    $errors[]=$error->getMessage();
    error_handler($errors);
  }
  // Check for SQL errors

  // If there are any errors, respond with them
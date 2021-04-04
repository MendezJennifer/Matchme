<?php

  // If there is not a session, start one
  if(session_status()=== PHP_SESSION_NONE)
  {
    session_start();
  }
  // Store the errors
  $errors=$_SESSION['errors'] ?? null;

  // Store the success messages
  $successes=$_SESSION['successes'] ?? null;

  // Clear the session variables
  unset($_SESSION['errors']);
  unset($_SESSION['successes']);

  function _message($messages,$alert)
  {
    if($messages && count($messages)>0)
    {
      echo "<div class='alert alert-{$alert}'>";
      foreach($messages as $message)
      {
        echo "{$message}<br>";
      }
      echo "</div>";
    }  
  }

  foreach(['danger'=>$errors, 'success'=>$successes] as $alert=>$messages)
  {
    _message($messages,$alert);
  }
?>
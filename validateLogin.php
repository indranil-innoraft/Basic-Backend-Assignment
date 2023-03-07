<?php

//Provides ValidateUser class.
require('./vendor/autoload.php');

//Provides the database connection.
require('./database/connection.php');

session_start();

//If user click on login button.
if (isset($_POST['login-btn'])) {
  if ($connection->isValid($_POST['email'], md5($_POST['password']))) {
    $_SESSION['login'] = true;
    $_SESSION['UserEmail'] = $_POST['email'];
    header('Location: home/home.php');
  } 
  else {
    $_SESSION['formErrorMsg'] = "Invalid Username and Password.";
    header('Location: index.php');
  }
}

//If user click on register button.
if (isset($_POST['register'])) {
  header('Location: ./registration/signUp.php');
}

?>
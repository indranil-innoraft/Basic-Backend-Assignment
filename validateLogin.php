<?php

//Provides ValidateUser class.
require('./vendor/autoload.php');
require('./database/connection.php');

// //Creating ValidateUser class object and pass the value using constructor function.
// $validate = new ValidateUser($_POST['email'], $_POST['password']);

// //Using isValid() method checking user is valid or not and redirect the user based on their inputs.
// if ($validate->isValid()) {
//   session_start();
//   $_SESSION['login'] = true;
//   // set user name 
//   $_SESSION['name'] = "Indranil Roy";
//   // set user email address.
//   $_SESSION['UserEmail'] = "indranil.roy@innoraft.com";
//   header('Location: home/home.php');
// } 
// else {
//   echo "Invalid Username and Password.";
// }
session_start();

if (isset($_POST['login-btn'])) {
  // Using isValid() method checking user is valid or not and redirect the user based on their inputs.
  if ($connection->isValid($_POST['email'], $_POST['password'])) {
    $_SESSION['login'] = true;
    // // set user name 
    // $_SESSION['name'] = "Indranil Roy";
    // set user email address.
    $_SESSION['UserEmail'] = $_POST['email'];
    header('Location: home/home.php');
  } else {
    $_SESSION['formErrorMsg'] = "Invalid Username and Password.";
    header('Location: index.php');
  }
}

if (isset($_POST['register'])) {
  header('Location: ./registration/signUp.php');
}

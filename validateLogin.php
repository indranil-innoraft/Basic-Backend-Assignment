<?php

//Provides ValidateUser class.
require('./vendor/autoload.php');

//Creating ValidateUser class object and pass the value using constructor function.
$validate = new ValidateUser($_POST['email'], $_POST['password']);

//Using isValid() method checking user is valid or not and redirect the user based on their inputs.
if ($validate->isValid()) {
  session_start();
  $_SESSION['login'] = true;
  // set user name 
  $_SESSION['name'] = "Indranil Roy";
  // set user email address.
  $_SESSION['UserEmail'] = "indranil.roy@innoraft.com";
  header('Location: home/home.php');
} 
else {
  echo "Invalid Username and Password.";
}

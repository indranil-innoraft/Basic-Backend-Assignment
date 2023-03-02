<?php

require('../database/connection.php');
require('../validation.php');
session_start();

$validate = new Validation();

if (!$validate->isValidPassword($_POST['password'])) {
  $_SESSION['formErrorMsg'] = $validate->passwordError;
  header("Location: changePassword.php");
} 
else {
  if ($_SESSION['otp'] == $_POST['otp']) {
    $connection->setPassword(md5($_POST['password']), $_SESSION['email']);
    $_SESSION['formErrorMsg'] = "Password changed successfully.";
    header("Location: ../index.php");
  } else {
    $_SESSION['formErrorMsg'] = "OTP not valid.";
    header("Location: changePassword.php");
  }
}

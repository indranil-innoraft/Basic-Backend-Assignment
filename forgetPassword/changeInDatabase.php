<?php

require('../database/connection.php');
require('../validation.php');
session_start();

$validate = new Validation();

if (!$validate->isValidPassword($_POST['password'])) {
  $_SESSION['formErrorMsg'] = $validate->passwordError;
  header("Location: resetPassword.php");
} 
else {
  $connection->setPassword(md5($_POST['password']), $_SESSION['email']);
  $_SESSION['formErrorMsg'] = "Password change successfully,You can login now.";
  header("Location: ../index.php");
}

?>
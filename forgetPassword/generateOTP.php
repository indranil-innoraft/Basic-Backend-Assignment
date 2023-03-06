<?php

require ('../database/connection.php');
session_start();

if($connection->isExists($_POST['email'])) {  
  $otp = rand(1000,9999);
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['otp'] = $otp;
  require ('sendOTP.php');
  header('location: checkOTP.php');
}
else {
  $_SESSION['formErrorMsg'] = "Enter a correct user email.";
  header('location: index.php');
}

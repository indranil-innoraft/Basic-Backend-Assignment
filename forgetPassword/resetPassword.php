<?php

require ('../database/connection.php');
session_start();

if($connection->isExists($_POST['email'])) {  
  $otp = rand(100,200);
  $_SESSION['email'] = $_POST['email'];
  $_SESSION['otp'] = $otp;
  require ('sendOTP.php');
  header('location: changePassword.php');
  
}
else{
    $_SESSION['formErrorMsg'] = "Enter a correct user name.";
    header('location: index.php');
}


<?php 
session_start();

if($_SESSION['otp'] == $_POST['otp']) {
  header ("Location: resetPassword.php");
}
else {
  $_SESSION['formErrorMsg'] = "OTP not valid.";
  header ("Location: checkOTP.php");
}

?>
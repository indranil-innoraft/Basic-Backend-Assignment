<?php

require_once('../database/connection.php');

session_start();

if (!isset($_SESSION['login'])) {
  header('Location: ../index.php');
}

if ($connection->isValid($_SESSION['UserEmail'], md5($_POST['password']))) {
  $connection->deleteAccount($_SESSION['UserEmail']);
  $_SESSION['UserEmail'] = "";
  $_SESSION['login'] = false;
  $_SESSION['formErrorMsg'] = "Account Deleted successfully.";
  header('Location: ../index.php');
} 
else {
  $_SESSION['formErrorMsg'] = "Invalid password.";
  header('Location: index.php');
}

<?php
session_start();
switch ($_GET['q']) {
  case '1':
    header('Location: ../form/login.php');
    break;
  case '2':
    header('Location: ../formWithImage/formWithImage.php');
    break;
  case '3':
    header('Location: ../formWithMarks/formWithMarks.php');
    break;
  case '4':
    header('Location: ../formWithPhoneNumber/formWithPhoneNumber.php');
    break;
  case '5':
    header('Location: ../formWithEmail/formWithEmail.php');
    break;
  case '6':
    header('Location: ../pdf/compleForm.php');
    break;
  default:
    $_SESSION['querryError'] = "please provide valid querry 1-6.";
    header('Location: ../home/home.php');
}

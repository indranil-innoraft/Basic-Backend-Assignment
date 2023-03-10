
<?php
session_start();

//Check user is login or not.
if (!isset($_SESSION['login'])) {
  header('location: ../index.php');
}

//This will redirect the page based on question number.
switch ($_GET['q']) {
  case 1:
    header('Location: ../form/form.php');
    break;
  case 2:
    header('Location: ../formWithImage/formWithImage.php');
    break;
  case 3:
    header('Location: ../formWithMarks/formWithMarks.php');
    break;
  case 4:
    header('Location: ../formWithPhoneNumber/formWithPhoneNumber.php');
    break;
  case 5:
    header('Location: ../formWithEmail/formWithEmail.php');
    break;
  case 6:
    header('Location: ../pdf/compleForm.php');
    break;
  default:
    $_SESSION['querryError'] = "please provide valid querry 1-6.";
    header('Location: home.php');
}
?>
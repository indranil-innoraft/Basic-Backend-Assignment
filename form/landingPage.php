<?php
session_start();

//include the userInformation.
include('../userInformation.php');

/**
 * @param string $firstName
 * @param  string $lastName 
 */

$firstName = $_POST['fname'];
$lastName = $_POST['lname'];


/**
 * * @method checkUserInfo()
 *   check user has enter the valid name or not.
 */

function ckeckUserInfo($firstName, $lastName, $user)
{
  if (empty($firstName) || empty($lastName)) {
    $_SESSION['formErrorMsg'] = "field should not be empty.";
    header('Location:login.php');
  } else if (is_numeric($firstName) || is_numeric($lastName)) {
    $_SESSION['formErrorMsg'] = "field should be alphabet.";
    header('Location:login.php');
  } else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $firstName) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lastName)) {
    $_SESSION['formErrorMsg'] = "field should not be special character.";
    header('Location:login.php');
  } else {
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
    $user->setFirstName($firstName);
    $user->setLastName($lastName);
  }
}

/**
 * call the method checkUserInfo.
 */
ckeckUserInfo($firstName, $lastName, $user);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP</title>
</head>

<body>
  <h1>Hello
    <?php
    echo $_SESSION['firstName'] . " " . $_SESSION['lastName'];
    ?>
  </h1>

</body>

</html>
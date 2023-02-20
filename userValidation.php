<?php


//$userEmail variable getting value from POST built-in variable.
//$userPassword variable getting value from POST built-in variable.
$userEmail = $_POST['email'];
$userPassword = $_POST['password'];

/**
 * Validation function if user is valid or not.
 * @param string $userEmail.
 * @param string $userPassword.
 * 
 * @return void
 * 
 */

function validation($userEmail, $userPassword)
{
  if ($userEmail === 'indranil.roy@innoraft.com' && $userPassword === 'innoraft') {
    session_start();
    $_SESSION['login'] = true;
    // set user name 
    $_SESSION['name'] = "Indranil Roy";
    // set user email address.
    $_SESSION['UserEmail'] = "indranil.roy@innoraft.com";
    header('Location: home/home.php');
  } else {
    $_SESSION['userValidateError'] = "invalid cradential,please try again.";
    header('Location: index.php');
  }
}

//call the validation function.
validation($userEmail, $userPassword);

<?php

   session_start();

  /** 
  * @param string $userEmail.
  * @param string $userPassword.
  **/

  $userEmail = $_POST['email'];
  $userPassword = $_POST['password'];
  
  /**
   * validation function
   *
   * @param string $userEmail
   * @param string $userPassword
   * 
   * @return void
   *  if user input is correct then it redirect to Assignment task page.
   *  if user input is invalid then it reditect to the login page.
   * 
   */
  
  function validation($userEmail,$userPassword){
    if ($userEmail === 'indranil.roy@innoraft.com' && $userPassword === 'innoraft') {
      $_SESSION['login'] = true;
      // set user name 
      $_SESSION['name']="Indranil Roy";
      // set user email address.
      $_SESSION['email']="indranil.roy@innoraft.com";
      header('Location: form/login.php');
    }
    else{
      $_SESSION['userValidateError']="invalid cradential,please try again.";
      header('Location: index.php');
    }
  }

  //call the validation function.
  validation($userEmail,$userPassword);

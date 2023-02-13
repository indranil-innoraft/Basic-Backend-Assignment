<?php
  /** 
  * @param string $userEmail
  * @param string $userPassword
  * @method validation()
  *  to check user  have enter a correct username and password.
  **/

  session_start();

  $userEmail = $_POST['email'];
  $userPassword = $_POST['password'];
  
  function validation($userEmail,$userPassword){
    if ($userEmail == 'indranil.roy@innoraft.com' && $userPassword == 'innoraft') {
      session_start();
      $_SESSION['login'] = true;
      $_SESSION['name']="Indranil Roy";
      $_SESSION['email']="indranil.roy@innoraft.com";
      header('Location: form/login.php');
    }
    else{
      $_SESSION['userValidateError']="invalid cradential,please try again.";
      header('Location: index.php');
    }
  }
  
  validation($userEmail,$userPassword);

  ?>
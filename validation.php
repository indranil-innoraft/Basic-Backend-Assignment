<?php
//sessiion start
session_start();




class Validation
{

  public function ckeckUserName($firstName, $lastName)
  {
    if (empty($firstName) || empty($lastName)) {
      $_SESSION['formErrorMsg'] = "field should not be empty.";
      return false;
    } 
    else if (is_numeric($firstName) || is_numeric($lastName)) {
      $_SESSION['formErrorMsg'] = "field should be alphabet.";
      return false;
    } 
    else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $firstName) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lastName)) {
      $_SESSION['formErrorMsg'] = "field should not be special character.";
      return false;
    } 
    else {
      return true;
    }
  }
}

$validate = new Validation();

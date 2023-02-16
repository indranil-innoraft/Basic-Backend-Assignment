<?php
//sessiion start
session_start();


class Validation
{
  /**
   * @method boolean checkUserName()
   *   check user enter a valid name or not.
   * @method boolean checkUpLoadedFile().
   *   check user upload a valid image or not.
   */

  public function checkUserName($firstName, $lastName)
  {
    if (empty($firstName) || empty($lastName)) {
      $_SESSION['formErrorMsg'] = "Name should not be empty.";
      return false;
    } else if (preg_match('/[0-9]/', $firstName) || preg_match('/[0-9]/', $lastName)) {
      $_SESSION['formErrorMsg'] = "Name should be contain alphabet.";
      return false;
    
    } else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $firstName) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lastName)) {
      $_SESSION['formErrorMsg'] = "Name should not contain special character.";
      return false;
    } else {
      return true;
    }
  }

  function checkUploadedFile($fileName, $tempName, $filePath, $type, $size)
  {
    if (isset($fileName)) {
      if ($type != "image/png"  && $type != "image/jpeg" && $type != "image/jpg") {
        $_SESSION['formErrorMsg'] = "please upload a image(jpeg,png or png).";
        return false;
      }
      if ($size > 6291456) {
        $_SESSION['formErrorMsg'] = "please upload a image less then 6MB";
        return false;
      }
      return true;
    } 
    else {
      $_SESSION['formErrorMsg'] = "please upload a image";
      return false;
    }
  }


  public function checkPhoneNumber(string $phoneNo)
{

  if (empty($phoneNo)) {
    $_SESSION['formErrorMsg'] = "field should not be empty.";
    return false;
  } else if (strlen($phoneNo) < 10 || strlen($phoneNo) > 10) {
    $_SESSION['formErrorMsg'] = "not valid number";
    return false;
  } else {
    $_SESSION['phone'] = $phoneNo;
    return true;
  }
}
}

$validate = new Validation();

<?php

class Validation {
  
  /**
   * Store name error related information.
   *
   * @var string
   */

  public string $nameError;

  /**
   * Store uploaded file error related information.
   *
   * @var string
   */

  public string $uploadedFileError;

  /**
   * Store Phone number error related information.
   *
   * @var string
   */

  public string $phoneNumberError;

  /**
   * Store email error related information.
   *
   * @var string
   */

  public string $emailError;

  /**
   * Store password error related information.
   *
   * @var string
   */

  public string $passwordError;

  /**
   * Validate user first and last name.
   *
   * @param string $firstName
   * @param string $lastName
   * 
   * @return boolean
   * 
   */

  public function checkUserName(string $firstName, string $lastName) {
    if (empty($firstName) || empty($lastName)) {
      $this->nameError = "Name should not be empty.";
      return False;
    } 
    else if (preg_match('/[0-9]/', $firstName) || preg_match('/[0-9]/', $lastName)) {
      $this->nameError = "Name should be contain alphabet.";
      return False;
    } 
    else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $firstName) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lastName)) {
      $this->nameError = "Name should not contain special character.";
      return False;
    } 
    else {
      return true;
    }
  }

 
  /**
   * Validate user uploaded file.
   *
   * @param string $fileName
   * @param string $tempName
   * @param string $filePath
   * @param string $type
   * @param string $size
   * 
   * @return boolean
   * 
   */

  function checkUploadedFile(string $fileName, string $tempName, string $filePath, string $type, string $size) {
    if (isset($fileName)) {
      if ($type != "image/png"  && $type != "image/jpeg"  && $type != "image/jpg") {
        $this->uploadedFileError = "please upload a image(jpeg,png or png).";
        return False;
      }
      if ($size > 6291456) {
        $this->uploadedFileError = "please upload a image(jpeg,png or png).";
        return False;
      }
      return true;
    } 
    else {
      $this->uploadedFileError = "please upload a image(jpeg,png or png).";
      return False;
    }
  }

  /**
   * check if the user input a correct phone number or not.
   *
   * @param string $phoneNo
   * 
   * @return boolean
   * 
   */

  public function checkPhoneNumber(string $phoneNo) {
    if (empty($phoneNo)) {
      $this->phoneNumberError = "field should not be empty.";
      return false;
    } 
    else if (strlen($phoneNo) < 10 || strlen($phoneNo) > 10) {
      $this->phoneNumberError = "field should not be empty.";
      return false;
    } 
    else {
      return true;
    }
  }

  /**
   * Validate user email address.
   *
   * @param string $emailAddress
   * 
   * @return boolean
   * 
   */

  public function isValidEmail(string $emailAddress) {
    if (empty($emailAddress)) {
      $this->emailError = "Email field should not be empty.";
      return false;
    } 
    else {
      require('../vendor/autoload.php');

      // Create a client with a base URI
      $client = new GuzzleHttp\Client([
        'base_uri' => 'https://api.apilayer.com'
      ]);

      $response = $client->request('GET', "/email_verification/check?email=" . $emailAddress, [
        "headers" => [
          'Content-Type' => 'text/plain',
          'apikey' => 'STTONsCShOh5qIQFmndLNgiz3nfgFRN9'
        ]
      ]);

      //Getting JSON data form $response variable.
      $body = $response->getBody();
      //Convert JSON data into an object.
      $arr_body = json_decode($body);
      if ($arr_body->format_valid && $arr_body->smtp_check) {
        return true;
      } 
      else {
        $this->emailError = "Email is not valid.";
        return false;
      }
    }
  }

  /**
   * Validate user enter password.
   *
   * @param string $password
   * 
   * @return boolean
   * 
   */

  public function isValidPassword(string $password) {
    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
      $this->passwordError = 'Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.';
      return false;
    } 
    else {
      return true;
    }
  }
}

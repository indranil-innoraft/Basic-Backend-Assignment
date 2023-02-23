<?php

class Validation
{
  /**
   * Variables to store errors.
   *
   * @var string $nameError
   * @var string $uploadedFileError
   * @var string $phoneNumberError
   * @var string $emailError
   * 
   */
  public string $nameError;
  public string $uploadedFileError;
  public string $phoneNumberError;
  public string $emailError;

  /**
   * @method boolean checkUserName()
   *   check user enter a valid name or not.
   * @method boolean checkUpLoadedFile().
   *   check user upload a valid image or not.
   */

  public function checkUserName($firstName, $lastName)
  {
    if (empty($firstName) || empty($lastName)) {
      $this->nameError = "Name should not be empty.";
      return False;
    } elseif (preg_match('/[0-9]/', $firstName) || preg_match('/[0-9]/', $lastName)) {
      $this->nameError = "Name should be contain alphabet.";

      return False;
    } elseif (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $firstName) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lastName)) {
      $this->nameError = "Name should not contain special character.";
      return False;
    } else {
      return true;
    }
  }

  function checkUploadedFile($fileName, $tempName, $filePath, $type, $size)
  {
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
    } else {
      $this->uploadedFileError = "please upload a image(jpeg,png or png).";
      return False;
    }
  }


  /**
   * check if the user input a correct phone number or not. 
   *
   * @param string $phoneNo.
   * @return boolean.
   */
  public function checkPhoneNumber(string $phoneNo)
  {

    if (empty($phoneNo)) {
      $this->phoneNumberError = "field should not be empty.";
      return false;
    } else if (strlen($phoneNo) < 10 || strlen($phoneNo) > 10) {
      $this->phoneNumberError = "field should not be empty.";
      return false;
    } else {
      return true;
    }
  }

  /**
   * Check email is valid or not.
   *
   * @param string $emailAddress
   * @return boolean
   */
  public function isValidEmail(string $emailAddress)
  {
    if (empty($emailAddress)) {
      $this->emailError = "Email field should not be empty.";
      return false;
    } else {
      require ('../vendor/autoload.php');

      // Create a client with a base URI
      $client = new GuzzleHttp\Client([
        'base_uri' => 'https://api.apilayer.com'
      ]);

      $response = $client->request('GET', "/email_verification/check?email=" . $emailAddress, [
        "headers" => [
          'Content-Type'=> 'text/plain',
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
}

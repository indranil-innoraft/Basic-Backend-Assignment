<?php

class Email
{


  public function validateEmail(string $email_address)
  {
    if (empty($email_address)) {

      return false;
    } else {    
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=".$email_address,
        CURLOPT_HTTPHEADER => array(
          "Content-Type: text/plain",
          "apikey: STTONsCShOh5qIQFmndLNgiz3nfgFRN9"
        ),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET"
      ));
      $response = curl_exec($curl);
      $validationResult = json_decode($response, true);
      if ($validationResult['format_valid'] && $validationResult['smtp_check']) {
          $_SESSION['emailId']=$email_address;
          return true;
      } else {
          return false;
      }
      curl_close($curl);
  
    }
  }
}

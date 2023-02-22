<?php
/**
 * Check SMTP on user entered email-id.
 * @author Indranil Roy
 * @method public validateEmail()
 * @return boolean
 */
class Email
{

  /**
   * validateEmail method use http://www.mailboxlayer.com/ API to check email-id is valid or not.
   * @access public
   * @param string $email_address
   */
  public function validateEmail(string $email_address)
  {
    // Check field is empty or not.
    if (empty($email_address)) {
      return false;
    } 
    else {
      //curl is having a branch of protocols that helps to request.
      $curl = curl_init();
      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=" . $email_address,
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

      //Getting JSON data.
      $response = curl_exec($curl);

      //Converting JSON to Array.
      $validationResult = json_decode($response, true);
      curl_close($curl);

      //if SMTP and format_valid return true it means email-id is valid.
      if ($validationResult['format_valid'] && $validationResult['smtp_check']) {
        return true;
      } 
      else {
        return false;
      }
    }
  }
}
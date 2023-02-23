<?php

use GuzzleHttp\Client;

//This functin check if email id is valid or not.
function guzzleEmailValidate($email_address){
  
  // Create a client with a base URI
  $client = new Client([
    'base_uri' => 'https://api.apilayer.com',
  ]);

  $response = $client->request('GET', "/email_verification/check?email=" . $email_address  , [
    "headers" => [
        "Content-Type: text/plain",
        'apikey' => 'STTONsCShOh5qIQFmndLNgiz3nfgFRN9',
    ]
  ]);

  //Getting JSON data form $response variable.
  $body = $response->getBody();
  //Convert JSON data into an object.
  $arr_body = json_decode($body);

  if($arr_body->format_valid && $arr_body->smtp_check) {
    return true;
  }
  else{
    return false;
  }
}

?>

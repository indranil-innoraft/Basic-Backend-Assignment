<?php
/**
 * This class contains multiple methods for user validation related operation.
 * 
 * @method isValid().
 *   check user is already registered.
 */
class ValidateUser {
  
  /**
   * @var string $userEmail
   *   store user emailId.
   * @var string $userPassword
   *   store user password.
   */

  private string $userEmail;
  private string $userPassword;

  /**
   * Constructor function.
   * @param string $userEmail
   * @param string $userPassword
   * 
   * @return void
   * 
   */

  public function __construct(string $userEmail, string $userPassword)
  {

    $this->userEmail = $userEmail;
    $this->userPassword = $userPassword;
  }

  /**
   * Validate user details.
   * 
   * @return boolean
   */

  public function isValid()
  {
    if ($this->userEmail === "indranil.roy@innoraft.com" 
    && $this->userPassword === "innoraft") {
      return true;
    } 
    
    else {
      return false;
    }
  }
}

<?php
session_start();
/**
 * Store user related information using setter and getter methods.
 * 
 * @method public getFirstName()
 *   Return first name of the user.
 * @method public getLastName()
 *   Return public last name of the user.
 * @method public getEmailId()
 *   Return email id of the user.
 * @method public getPhoneNumber()
 *   Return phone number of the user.
 * @method public setFirstName()
 *   Set first name of the user.
 * @method public setLastName()
 *   Set last name of the user.
 * @method public setEmailId()
 *   Set email id of the user.
 * @method public setPhoneNumber()
 *   Set phone number of the user.
 */

class UserInfo
{
  /**
   * @global String $firstName
   *   Store user first name.
   * @global String $lastName
   *   Store user last name.
   * @global String $phoneNo
   *   Store user phone number.
   * @global String $emailId
   *   Store user email id.
   */

  private string $firstName;
  private string $lastName;
  private string $phoneNo;
  private string $emailId;

  /**
   * Get the value of the firstName.
   *
   * @return string
   */
  public function getFirstName()
  {
    return $this->firstName;
  }

  /**
   * Get the value of the lastName.
   *
   * @return string
   */
  public function getLastName()
  {
    return $this->lastName;
  }

  /**
   * Get the value of the phone number.
   *
   * @return string
   */
  function getPhoneNumber()
  {
    return $this->phoneNo;
  }

  /**
   * Get the value of the emailId.
   *
   * @return string
   */
  function getEmailId()
  {
    return $this->emailId;
  }

  /**
   * Set the value of the firstName.
   * @param string $firstName.
   */
  public function setFirstName(string $firstName)
  {
    $this->firstName = $firstName;
  }

  /**
   * Set the value of the lastName.
   * @param string $lastName.
   */
  public function setLastName(string $lastName)
  {

    $this->lastName = $lastName;
  }

  /**
   * Set the value of the phone number.
   * @param string $phoneNo.
   */
  public function setPhoneNumber(string $phoneNo)
  {
    $this->phoneNo = $phoneNo;
  }

  /**
   * Set the value of the emailId.
   * @param string $emailId.
   */
  function setEmailId(string $emailId)
  {
    $this->emailId = $emailId;
  }
}

$user = new UserInfo();
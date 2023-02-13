<?php
session_start();
/**
 * store user related information.
 */

class UserInfo
{


  private string $firstName;
  private string $lastName;
  private string $phoneNo;
  private string $emailId;
  private $subjets = [];
  private $marks = [];

  public function getFirstName()
  {
    return $this->firstName;
  }

  public function getLastName()
  {
    return $this->lastName;
  }

  public function getPhoneNo()
  {
    return $this->phoneNo;
  }

  public function getEmailId()
  {
    return $this->emailId;
  }

  public function getSubjcts()
  {
    return $this->subjets;
  }

  public function getMarks()
  {
    return $this->marks;
  }


  public function setFirstName(string $firstName)
  {
    $this->lastName = $firstName;
  }

  public function setLastName(string $lastName)
  {
    $this->lastName = $lastName;
  }

  public function setPhoneNo(string $phone)
  {
    $this->phoneNo = $phone;
  }

  public function setEmailId(string $emailId)
  {
    $this->emailId = $emailId;
  }

  public function setSubjects(array $subject)
  {
    $this->subjets = $subject;
  }

  public function setMarks(array $marks)
  {
    $this->marks = $marks;
  }
}


$user = new UserInfo();

?>
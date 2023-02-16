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
  //   $emailId;
  //  $subjets = [];
  //  $marks = [];

   public function getFirstName()
  {
    return $this->firstName;
  }

  public function getLastName()
  {
    return $this->lastName;
  }

   function getPhoneNumber()
  {
    return $this->phoneNo;
  }

  //  function getEmailId()
  // {
  //   return $this->emailId;
  // }

  //  function getSubjcts()
  // {
  //   return $this->subjets;
  // }

  //  function getMarks()
  // {
  //   return $this->marks;
  // }


   public function setFirstName(string $firstName)
  {
    $this->firstName = $firstName;
  }

   public function setLastName(string $lastName)
  {

    $this->lastName = $lastName;
    
  }

  public function setPhoneNumber($phoneNo)
  {
    $this->phoneNo = $phoneNo;
  }

  //  function setEmailId(string $emailId)
  // {
  //   $this->emailId = $emailId;
  // }

  //  function setSubjects(array $subject)
  // {
  //   $this->subjets = $subject;
  // }

  //  function setMarks(array $marks)
  // {
  //   $this->marks = $marks;
  // }
}

$user=new UserInfo();


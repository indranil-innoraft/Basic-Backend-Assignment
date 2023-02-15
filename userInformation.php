<?php
session_start();
/**
 * store user related information.
 */

class UserInfo
{
    private string $firstName;
    private string $lastName;
  //  $phoneNo;
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

  //  function getPhoneNo()
  // {
  //   return $this->phoneNo;
  // }

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

  //  function setPhoneNo(string $phone)
  // {
  //   $this->phoneNo = $phone;
  // }

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


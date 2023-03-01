<?php

class db extends mysqli
{
  public function pushIntoDataBase($fname, $lname, $phoneNumber, $email, $password)
  {
    $sql = "insert into 
    userInfo (
      FirstName, 
      LastName, 
      EmailAddress, 
      PhoneNumber, 
      Password
      )
  values
    (
      '$fname', 
      '$lname', 
      '$email', 
      '$phoneNumber', 
      '$password'
    );
  ";

    if ($this->query($sql)) {
      return true;
    } else {
      return false;
    }
  }

  public function isExists($email) {
    $sql = "SELECT * FROM userInfo where EmailAddress = '$email';";
    if($this->query($sql)->num_rows != 0) {
      return true;
    }
    else {
      return false;
    }
  }

  public function setPassword($password, $email) {
    $sql = "UPDATE userInfo SET Password = '$password' where EmailAddress = '$email';";
    $this->query($sql);
  }

  public function isValid($email, $password) {
    $sql = "SELECT * FROM userInfo where Password = '$password' AND EmailAddress = '$email';";
    if($this->query($sql)->num_rows != 0){
      return true;
    }
    else {
      return false;
    }
  }
}

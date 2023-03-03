<?php
/**
 * Provides the methods like insert data, data already exists.
 * 
 * @method boolean pushIntoDataBase()
 *   Push a new row to the database.
 * @method boolean isExists()
 *   Check user email id already present in the database or not.
 * @method boolean setPassword()
 *   Update the user password.
 * @method boolean isValid()
 *   Check user email and and password already present in the database or not.
 */
class db extends mysqli {
  /**
   * Creat a new user row in the database.
   *
   * @param string $email
   * @param string $password
   * 
   * @return boolean
   * 
   */

  public function pushIntoDataBase(string $email, string $password)
  {
    $sql = "insert into userInfo (EmailAddress, Password) values('$email', '$password');";

    if ($this->query($sql)) {
      return true;
    }
     else {
      return false;
    }
  }

  /**
   * Check email id is already present in the database or not.
   *
   * @param string $email
   * 
   * @return boolean
   * 
   */

  public function isExists(string $email) {
    $sql = "SELECT * FROM userInfo where EmailAddress = '$email';";
    if($this->query($sql)->num_rows != 0) {
      return true;
    }
    else {
      return false;
    }
  }

  /**
   * Set user password to the database.
   *
   * @param string $password
   * @param string $email
   * 
   * @return boolean
   * 
   */

  public function setPassword(string $password, string $email) {
    $sql = "UPDATE userInfo SET Password = '$password' where EmailAddress = '$email';";
    $this->query($sql);
  }

  /**
   * Check user already present in the databse or not.
   *
   * @param string $email
   * @param string $password
   * 
   * @return boolean
   * 
   */

  public function isValid(string $email, string $password) {
    $sql = "SELECT * FROM userInfo where Password = '$password' AND EmailAddress = '$email';";
    if($this->query($sql)->num_rows != 0){
      return true;
    }
    else {
      return false;
    }
  }
}

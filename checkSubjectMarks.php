
<?php
session_start();

class ValidateSubjectMarks
{
  /**
   * @var string $subject
   *   store subject array.
   * @var string $Marks
   *   store marks array.
   */
  private $subjects = [];
  private $marks = [];

  /**
   * check if enter a valid subject and marks.
   * @access public
   * @param string $textArea
   * 
   * @return boolean
   * 
   */

  public function validateUserInput(string $textArea)
  {
    //chcek text area is empty or not.
    if(empty($textArea)){
      $_SESSION['formErrorMsg'] = "field should not be empty.";
      return false;
    }
    // Seperate the data using enter and store into a array.
      $rawData = explode("\n", $textArea);
      $i = 0;
      $j = 0;

      foreach($rawData as $data){
        if(!strpos($data,'|')){
          $_SESSION['formErrorMsg'] = "please follow the specified format to enter subject|marks.";
          return false;
        }
      }
      //Iterate over the array and seperate the subject and marks.
      foreach ($rawData as $data) {
        $raw = explode("|", $data);
        if (preg_match('/[a-zA-Z]/', $raw[0])) {
          $this->subjects[$i++] = $raw[0];
        } 
        else {
          $_SESSION['formErrorMsg'] = "please follow the specified format subject name should be alphabet.";
          return false;
        }
        if (preg_match('/[0-9]/', $raw[1]) && $raw[1]<100 && $raw[1]>0) {
          $this->marks[$j++] = $raw[1];
        } 
        else {
          $_SESSION['formErrorMsg'] = "please follow the specified format marks should be number";
          return false;
        }
      }
      return true;
  }
  /**
   * display the Subject array.
   * @access public
   * 
   * @return mixed
   * 
   */
  public function getSubject()
  {
    //Store the subject array as a string.
    $_SESSION['subjects'] = implode(" ", $this->subjects);
    foreach ($this->subjects as $data) {
      echo "<td>" . $data . "</td>";
    }
  }

   /**
   * display the Subject array.
   * @access public
   *   
   * @return mixed
   * 
   */
  public function getMark()
  {
    //Store the marks array as a string.
    $_SESSION['marks'] = implode(" ", $this->marks);
    foreach ($this->marks as $data) {
      echo "<td>" . $data . "</td>";
    }
  }
}
?>
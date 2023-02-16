
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
   * @param string $textArea
   *   check if enter a valid subject and marks.
   * 
   * @return boolean
   */

  public function validateUserInput(string $textArea)
  {
    if(empty($textArea)){
      $_SESSION['formErrorMsg'] = "field should not be empty.";
      return false;
    }
    if (preg_match(('/\n/'), $textArea )) {
      $rawData = explode("\n", $textArea);
      $i = 0;
      $j = 0;
      foreach ($rawData as $data) {
        $raw = explode("|", $data);
        if (preg_match('/[a-zA-Z]/', $raw[0])) {
          $this->subjects[$i++] = $raw[0];
        } else {
          $_SESSION['formErrorMsg'] = "please follow the specified format.";
          return false;
        }
        if (preg_match('/[0-9]/', $raw[1])) {
          $this->marks[$j++] = $raw[1];
        } else {
          $_SESSION['formErrorMsg'] = "please follow the specified format.";
          return false;
        }
      }
      return true;
    } 
    else {
      $_SESSION['formErrorMsg'] = "please follow the specified format.";
      return false;
    }
  }
  /**
   *   display the Subject array.
   *   
   * @return mixed
   */
  public function getSubject()
  {
    $_SESSION['subjects'] = implode(" ", $this->subjects);
    foreach ($this->subjects as $data) {
      echo "<td>" . $data . "</td>";
    }
  }

   /**
   *   display the Subject array.
   *   
   * @return mixed
   */
  public function getMark()
  {
    $_SESSION['marks'] = implode(" ", $this->marks);
    foreach ($this->marks as $data) {
      echo "<td>" . $data . "</td>";
    }
  }
}
?>
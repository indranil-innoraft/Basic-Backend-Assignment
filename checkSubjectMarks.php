
<?php

class ValidateSubjectMarks
{
  /**
   * @var string $subject
   *   store subject array.
   * @var string $Marks
   *   store marks array.
   * @var string $subjectAndMarksError
   *   store subject and marks error.
   */
  public $subjects = [];
  public $marks = [];
  public string $subjectAndMarksError;

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
      $this->subjectAndMarksError = "field should not be empty.";
      return false;
    }
    // Seperate the data using enter and store into a array.
      $rawData = explode("\n", $textArea);
      $i = 0;
      $j = 0;

      foreach($rawData as $data){
        if(!strpos($data,'|')){
          $this->subjectAndMarksError = "please follow the specified format to enter subject|marks.";
          return false;
        }
      }

      //Iterate over the array and seperate the subject and marks.
      foreach ($rawData as $data) {
        $raw = explode("|", $data);

        if(in_array(strtoupper($raw[0]),$this->subjects)){
          $this->subjectAndMarksError = "Duplicate subject names are not allowed.";
          return false;
        }

        if (preg_match('/[a-zA-Z]/', $raw[0])) {
          $this->subjects[$i++] = strtoupper($raw[0]);
        } 
        else {
          $this->subjectAndMarksError = "please follow the specified format subject name should be alphabet.";
          return false;
        }

        if (preg_match('/[0-9]/', $raw[1]) && $raw[1]<100 && $raw[1]>0) {
          $this->marks[$j++] = $raw[1];
        } 
        else {
          $this->subjectAndMarksError = "please follow the specified format subject name should be alphabet.";
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
    foreach ($this->marks as $data) {
      echo "<td>" . $data . "</td>";
    }
  }
}
?>

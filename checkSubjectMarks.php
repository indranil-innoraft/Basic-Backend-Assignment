
<?php
session_start();
  class ValidateSubjectMarks{
    private $subjects=[];
    private $marks=[];

    public function validateUserInput($textArea){
        $rawData=explode("\n",$textArea);
        $i=0;
        $j=0;
        foreach($rawData as $data){
            $raw=explode("|",$data);
             $this->subjects[$i++]=$raw[0];
             $this->marks[$j++]=$raw[1];
        }
    }

    public function getSubject(){
        $_SESSION['subjects']=implode(" ",$this->subjects);
        foreach($this->subjects as $data){
            echo "<td style='border:1px solid black;padding:10px;'>" . $data."</td>";
            
        }
    }
   
    public function getMark(){
        $_SESSION['marks']=implode(" ",$this->marks);
        foreach($this->marks as $data){
            echo "<td style='border:1px solid black;padding:10px;'>" . $data ."</td>" ;
        }
    }
  }
?>
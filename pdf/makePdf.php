<?php

session_start();

if(!isset($_SESSION['login'])){
    header('location: ../index.php');
   }

   
$_SESSION['emailId']="inndranil@gmail.com";
require('fpdf185/fpdf.php');
require('../checkSubjectMarks.php');



$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->SetFillColor(129, 173, 239);
$pdf->cell(0,10,'Form Details',1,1,'C',true);
$pdf->SetFillColor(247, 163, 37);
$pdf->cell(40,10,"Full Name",1,0,'C',true);
$pdf->cell(75,10,"Email",1,0,'C',true);
$pdf->cell(75,10,"Phone No",1,0,'C',true);
$pdf->Ln();
$full_name= $_SESSION['firstName'] . " " . $_SESSION['lastName'];
$pdf->cell(40,10,$full_name,1,0,'C');
$pdf->cell(75,10,$_SESSION['email'],1,0,'C');
$pdf->cell(75,10,$_SESSION['phone'],1,1,'C');
$pdf->Ln();
$pdf->SetFillColor(129, 173, 239);
$pdf->cell(0,10,'Subjects And Marks',1,1,'C',true);
$pdf->SetFillColor(247, 163, 37);
$subjectArray=explode(' ',$_SESSION['subjects']);
foreach($subjectArray as $subject){
    $pdf->cell(30,10,$subject,1,0,'C',true);
}
$pdf->Ln();
$marksArray=explode(' ',$_SESSION['marks']);
foreach($marksArray as $mark){
    $pdf->cell(30,10,$mark,1,0,'C');
}
$pdf->Ln();
$pdf->SetFillColor(129, 173, 239);
$pdf->cell(111,50,'Uploded Image',1,0,'C',true);
$pdf->cell(80,50,$pdf->Image($_SESSION['uploadedImage'],135,80,50,50),1,0,'C');

$file='Submited Form' . date("Y-m-d",time());
$pdf->Output($file,'I');





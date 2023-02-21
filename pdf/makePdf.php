<?php
//Start the session for using session variables.
session_start();

//Checking user is login or not.
if (!isset($_SESSION['login'])) {
  header('location: ../index.php');
}

//Provides the FPDF class.
// require('fpdf185/fpdf.php');

//Including the fpdf using composer.
require_once ('../vendor/autoload.php');

//Provides the subjectMarks class. 
require('../checkSubjectMarks.php');

//Creating a new object of FPDF.
$pdf = new FPDF();

//Add a page.
$pdf->AddPage();

//Set font.
$pdf->SetFont('Arial', 'B', 12);

//Setting the cell color.
$pdf->SetFillColor(129, 173, 239);

//Creating the space for heading.
$pdf->cell(0, 10, 'Form Details', 1, 1, 'C', true);

//Set the cell color.
$pdf->SetFillColor(247, 163, 37);

//Creating the space for heading.
$pdf->cell(40, 10, "Full Name", 1, 0, 'C', true);
$pdf->cell(75, 10, "Email", 1, 0, 'C', true);
$pdf->cell(75, 10, "Phone No", 1, 0, 'C', true);

//Changing the line.
$pdf->Ln();

//$file_name getting values using $_SESSION builtin variable.
$full_name = $_SESSION['firstName'] . " " . $_SESSION['lastName'];

//Show the details of the user.
$pdf->cell(40, 10, $full_name, 1, 0, 'C');
$pdf->cell(75, 10, $_SESSION['email'], 1, 0, 'C');
$pdf->cell(75, 10, $_SESSION['phone'], 1, 1, 'C');

//Changing the line.
$pdf->Ln();

//Setting the cell color.
$pdf->SetFillColor(129, 173, 239);

//Creating space for heading.
$pdf->cell(0, 10, 'Subjects And Marks', 1, 1, 'C', true);

//Set the cell color.
$pdf->SetFillColor(247, 163, 37);

//Breaking the string into a array.
$subjectArray = explode(' ', $_SESSION['subjects']);

//Itreate over the $subjectArray. 
foreach ($subjectArray as $subject) {
  $pdf->cell(30, 10, $subject, 1, 0, 'C', true);
}

//Changing the line.
$pdf->Ln();

//Breaking the string into a array.
$marksArray = explode(' ', $_SESSION['marks']);

//Itreate over the $MarksArray. 
foreach ($marksArray as $mark) {
  $pdf->cell(30, 10, $mark, 1, 0, 'C');
}

//Changing the line.
$pdf->Ln();

//Set the cell color.
$pdf->SetFillColor(129, 173, 239);

//Creating space for heading.
$pdf->cell(111, 50, 'Uploded Image', 1, 0, 'C', true);

//Show the image uploaded by the user.
$pdf->cell(80, 50, $pdf->Image($_SESSION['uploadedImage'], 135, 80, 50, 50), 1, 0, 'C');

//Setting the PDF name.
$file = 'Submited Form' . date("Y-m-d", time());

//Send to browser and dowload.
$pdf->Output($file, 'D');

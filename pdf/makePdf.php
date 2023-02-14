<?php
session_start();
$_SESSION['emailId']="inndranil@gmail.com";
require('fpdf185/fpdf.php');



$pdf = new FPDF();

// $pdf->Image($_SESSION['uploadedImage'],20,20,33,0,'','#');
$pdf->Image('../formWithImage/upload_image/s.png', 10, 10, 100, 50, "", "");
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->cell(0,10,'Form Details',1,1,'C');
$pdf->cell(40,10,"Full Name",1,0);
$pdf->cell(75,10,"Email",1,0);
$pdf->cell(75,10,"Phone No",1,0);
$pdf->Ln();
$full_name=$_SESSION["firstName"] . " " . $_SESSION["lastName"];
$pdf->cell(40,10,$full_name );
$pdf->cell(75,10,$_SESSION['emailId']);
$pdf->cell(75,10,$_SESSION['phone']);
$file='Submited Form' . date("Y-m-d",time());
$pdf->Output($file,'D');





<?php 

//Load Composer's autoloader
require '../vendor/autoload.php';

//Provides admin details.
require './confidential.php';

//Provieds the email creation and transfer class.
use PHPMailer\PHPMailer\PHPMailer;

$email = new Email();

$mail = new PHPMailer(true);

//Server settings 

//Send using SMTP
$mail->isSMTP(); 

//Set the SMTP server to send through.                                              
$mail->Host = 'smtp.gmail.com'; 

//Enable SMTP authentication.
$mail->SMTPAuth = true;

//SMTP username.
$mail->Username = $userName;     

//SMTP password.
$mail->Password = $password;        

$mail->Port = 465;                                    
$mail->SMTPSecure = "ssl";

//Recipients.
$mail->setFrom($userName);
$mail->addAddress($_POST['email']);

//Set email format to HTML.
$mail->isHTML(true);
$mail->Subject = 'Reset Password.';
$text = "One time password(OTP) is : ";
$mail->Body = $text . $otp;

//Send email.
$mail->send();

?>
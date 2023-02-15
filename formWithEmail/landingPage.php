<?php
session_start();

include('../userInformation.php');
require('../checkSubjectMarks.php');
require('../email.php');

$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$textArea = $_POST['textArea'];
$phoneNo = $_POST['phNum'];

$email = $_POST['email'];



$emailFetch=new Email();

if($emailFetch->validateEmail($email)===true){
  $_SESSION['email']=$email;
}
else{
  $_SESSION['formErrorMsg'] = "email is not valid.";
  header("Location:formWithEmail.php");

}

$fileName = $_FILES['image']['name'];
$filePath = $_FILES['image']['full_path'];
$type = $_FILES['image']['type'];
$tempName = $_FILES['image']['tmp_name'];
$size = $_FILES['image']['size'];


function ckeckUserInfo($firstName, $lastName, $user)
{
  if (empty($firstName) || empty($lastName)) {
    $_SESSION['formErrorMsg'] = "field should not be empty.";
    header("Location:formWithEmail.php");
  } else if (is_numeric($firstName) || is_numeric($lastName)) {
    $_SESSION['formErrorMsg'] = "field should be alphabet.";
    header("Location:formWithEmail.php");
  } else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $firstName) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lastName)) {
    $_SESSION['formErrorMsg'] = "field should not be special character.";
    header("Location:formWithEmail.php");
  } else {
    $_SESSION['firstName'] = $firstName;
    $_SESSION['lastName'] = $lastName;
  }
}


function checkUploadedFile($fileName, $tempName)
{
  if (strlen($fileName) != 0) {
    $path = "../formWithImage/upload_image/" . $fileName;
    $_SESSION['uploadedImage'] = $path;
    move_uploaded_file($tempName, $path);
  } else {
    $_SESSION['formErrorMsg'] = "please upload file";
    header("Location:formWithEmail.php");
  }
}


function checkEmail($email)
{
  if (empty($email)) {
    $_SESSION['formErrorMsg'] = "email should not be empty.";
    header("Location:formWithEmail.php");
  } else {
    echo "good";
    $curl = curl_init();

    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.apilayer.com/email_verification/check?email=indranil.roy%40innoraft.com",
      CURLOPT_HTTPHEADER => array(
        "Content-Type: text/plain",
        "apikey: STTONsCShOh5qIQFmndLNgiz3nfgFRN9"
      ),
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => "GET"
    ));

    $response = curl_exec($curl);
    echo "good";

    curl_close($curl);
    echo $response;
  }
}

function checkPhoneNo($phoneNo)
{

  if (empty($phoneNo)) {
    $_SESSION['formErrorMsg'] = "field should not be empty.";
    header("Location:formWithEmail.php");
  } else if (strlen($phoneNo) < 10 || strlen($phoneNo) > 10) {
    $_SESSION['formErrorMsg'] = "not valid number";
    header("Location:formWithEmail.php");
  } else {
    $_SESSION['phone'] = $phoneNo;
  }
}



// checkEmail($email);
checkPhoneNo($phoneNo);
checkUploadedFile($fileName, $tempName);
ckeckUserInfo($firstName, $lastName, $image, $user, $fileName, $tempName);


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP</title>
  <!-- <link rel="stylesheet" href="../style.css"> -->
</head>

<body>
  <h1>Hello
    <?php
    echo $_SESSION['firstName'] . " " . $_SESSION['lastName'];
    ?>
  </h1>
  <?php
  echo "phone no :" . $_SESSION['phone'] . "<br>";
  echo "email id " . $_SESSION['emailId'];
  ?>
  <p></p>
  <img src="<?php echo $_SESSION['uploadedImage']; ?>" alt="Uploaded File" />
  <div class="file-name">
    <?php
    $valideateSubjectMarks = new ValidateSubjectMarks();
    $valideateSubjectMarks->validateUserInput($textArea);
    ?>
    <table style="border:1px solid black;">
      <tr>
        <?php
        $valideateSubjectMarks->getSubject();
        ?>
      </tr>

      <tr>
        <?php
        $valideateSubjectMarks->getMark();
        ?>
      </tr>
    </table>


  </div>

</body>

</html>
<?php
session_start();

include('../userInformation.php');
require('../checkSubjectMarks.php');

$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$textArea = $_POST['textArea'];
$phoneNo = $_POST['phNum'];





$fileName = $_FILES['image']['name'];
$filePath = $_FILES['image']['full_path'];
$type = $_FILES['image']['type'];
$tempName = $_FILES['image']['tmp_name'];
$size = $_FILES['image']['size'];


function ckeckUserInfo($firstName, $lastName, $user)
{
  if (empty($firstName) || empty($lastName)) {
    $_SESSION['formErrorMsg'] = "field should not be empty.";
    header("Location:formWithPhoneNumber.php");
  } else if (is_numeric($firstName) || is_numeric($lastName)) {
    $_SESSION['formErrorMsg'] = "field should be alphabet.";
    header("Location:formWithPhoneNumber.php");
  } else if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $firstName) || preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $lastName)) {
    $_SESSION['formErrorMsg'] = "field should not be special character.";
    header("Location:formWithPhoneNumber.php");
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
    header("Location:formWithPhoneNumber.php");
  }
}
$subjects = array();
$marks = array();

function checkSubjectMarks($textArea, $s, $m)
{
  global $subjects, $marks;
  $subjects = $s;
  $marks = $m;


  preg_match_all('/([0-9]+|[a-zA-Z]+)/', $textArea, $matches);
  for ($i = 0; $i < count($matches[0]); $i++) {
    if ($i % 2 == 0) {
      array_push($subjects, ($matches[0])[$i]);
    } else {
      array_push($marks, ($matches[0])[$i]);
    }
  }
}

function checkPhoneNo($phoneNo)
{

  if (empty($phoneNo)) {
    $_SESSION['formErrorMsg'] = "field should not be empty.";
    header("Location:formWithPhoneNumber.php");
  } else if (strlen($phoneNo) < 10 || strlen($phoneNo) > 10) {
    $_SESSION['formErrorMsg'] = "not valid number";
    header("Location:formWithPhoneNumber.php");
  } else {
    $_SESSION['phone'] = $phoneNo;
  }
}



checkPhoneNo($phoneNo);
checkUploadedFile($fileName, $tempName);
ckeckUserInfo($firstName, $lastName, $image, $user, $fileName, $tempName);
checkSubjectMarks($textArea, $subjects, $marks);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP</title>
</head>

<body>
  <h1>Hello
    <?php
    echo $_SESSION['firstName'] . " " . $_SESSION['lastName'];
    ?>
  </h1>
  <?php
  echo "phone no :" . $_SESSION['phone'];
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

      

      

    </table>

  </div>

</body>

</html>
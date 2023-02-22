<?php
//Starting a session for accessing the session variables.
session_start();

require ('../vendor/autoload.php');

//Creating Validation class object for validation.
$validate = new Validation();

//Creating UserInfo class object for storing user data.
$user = new UserInfo();

// check user enter a propper name or not.
if ($validate->checkUserName($_POST['fname'], $_POST['lname'])) {
  //set the session variable.
  $_SESSION['firstName'] = $_POST['fname'];
  $_SESSION['lastName'] = $_POST['lname'];
  //set the data to the user object.
  $user->setFirstName($_POST['fname']);
  $user->setLastName($_POST['lname']);
} 
else {
  $_SESSION['formErrorMsg']=$validate->nameError;
  //if invalid entry user need to redirect to the form page.
  header('Location: formWithImage.php');
}

//check user uploded photo is valid or not.
if ($validate->checkUploadedFile($_FILES['image']['name'], $_FILES['image']['tmp_name'], $_FILES['image']['full_path'], $_FILES['image']['type'], $_FILES['image']['size'])) {
  $path = "upload_image/" . $_FILES['image']['name'];
  $_SESSION['uploadedImage'] = $path;
  //If uploaded image is valid then send the image upload_image folder.
  move_uploaded_file($_FILES['image']['tmp_name'], $path);
  } 
  else {
    $_SESSION['formErrorMsg']=$validate->uploadedFileError;
    //if invalid entry user need to redirect to the form page.
    header('Location: formWithImage.php');
}

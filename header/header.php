<?php
//Staring the session for using $_ SESSION  built in variable.
session_start();

//Check user is login or not.
if(!isset($_SESSION['login'])){
  header('location: ../index.php');
 }
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="position:sticky; top:0; ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="https://github.com/indranil-innoraft/Basic-Backend-Assignment">Git Hub</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../home/home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../form/form.php">Form</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../formWithImage/formWithImage.php">Form with Image</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../formWithMarks/formWithMarks.php">Form with Marks</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../formWithPhoneNumber/formWithPhoneNumber.php">Form with Phone</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../formWithEmail/formWithEmail.php">Form with Email</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../pdf/compleForm.php">Docs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout/logout.php">logout</a>
      </li>

    </ul>

  </div>

  <div class="user">
    <?php
    echo "Welcome : " . $_SESSION['UserEmail'];
    ?>
  </div>
</nav>
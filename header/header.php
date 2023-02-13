<?php
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light" style="position:sticky; top:0; ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../home/home.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../form/login.php">Form</a>
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
        <a class="nav-link" href="">Docs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout/logout.php">logout</a>
      </li>

    </ul>

  </div>

  <div class="user">
    <?php
    echo "Welcome " . $_SESSION['email'];
    ?>
  </div>
</nav>
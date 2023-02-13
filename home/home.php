<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Basic PHP Assignment</title>
  <!-- bootstrap cdn link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <!-- local css  -->
  <link rel="stylesheet" href="../style.css">
</head>

<body style="background-color: black;">
  <?php
  include('../header/header.php');
  ?>
  <div class="container">
    <!-- login form -->
    <form action="findYourQuerry.php" method="get">
      <?php
      include('querry.html');

      ?>
      <span class="error">
        <?php
        if (isset($_SESSION['querryError'])) {
          echo $_SESSION['querryError'];
          unset($_SESSION['querryError']);
        }
        ?>
      </span>
    </form>
  </div>
</body>

</html>
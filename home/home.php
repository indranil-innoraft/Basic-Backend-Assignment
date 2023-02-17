
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- bootstrap cdn link  -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <!-- local css  -->
  <link rel="stylesheet" href="../style.css">
</head>

<body>
  <?php
  //this will include the navbar.
  require('../header/header.php');
  ?>
  <div class="container">
    <!-- login form -->
    <form action="findYourQuerry.php" method="get">
      <?php
      //this will add the query field.
      require('querry.html');
      ?>
      <span class="error">
        <?php
        //this field will show the error messages if user inputs a wrong data.
        if (isset($_SESSION['querryError'])) {
          echo $_SESSION['querryError'];
          //if page gets reload then error message should be reset.
          unset($_SESSION['querryError']);
        }
        ?>
      </span>
    </form>
  </div>
</body>

</html>




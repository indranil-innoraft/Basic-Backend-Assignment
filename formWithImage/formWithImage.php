<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment-2</title>
    <!-- bootstrap cdn link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <!-- local css  -->
    <link rel="stylesheet" href="../style.css">
</head>

<body style="background-color: black;">
    <?php
    include("../header/header.php");

    ?>

    <div class="container">
        <form action="landingPage.php" method="post" enctype="multipart/form-data">
            <!-- First name field -->
            <div class="mb-3">
                <input type="text"  id="typingFirstName" name="fname" class="form-control " placeholder="First Name">
            </div>
            <!-- Last name field -->
            <div class="mb-3">
                <input type="text"  id="typingLastName" name="lname" placeholder="Last Name" class="form-control">
            </div>
            <!-- full name field -->
            <div class="mb-3">
                <input type="text" name="lname" id="target" placeholder="Full Name" class="form-control" disabled>
            </div>
            <!-- upload image field -->
            <div class="mb-3">
                <label for="formFile" class="form-label" style="color: white;">Upload Image</label>
                <input class="form-control" name="image" type="file" id="formFile">
            </div>
            <!-- error section -->
            <div class="error">
                <?php
                if (isset($_SESSION['formErrorMsg'])) {
                    $errorMsg = $_SESSION['formErrorMsg'];
                    echo $errorMsg;
                } ?>
            </div>
            <!-- submit button -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script src="../form/script.js"></script>
</body>

</html>
<!-- First name field -->
<div class="mb-3">
  <input type="text" onkeydown="liveTyping()" id="typingFirstName" name="fname" class="form-control " placeholder="First Name">
</div>
<!-- Last name field -->
<div class="mb-3">
  <input type="text" onkeydown="liveTyping()" id="typingLastName" name="lname" placeholder="Last Name" class="form-control">
</div>
<!-- full name field -->
<div class="mb-3">
  <input type="text" name="lname" id="target" placeholder="Full Name" class="form-control" disabled>
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
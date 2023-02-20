<?php
session_start();

//Unset the session variable.
session_unset();

//Destroy the session.
session_destroy();

//After logout user need to return to the login page.
header("Location: ../index.php");
?>
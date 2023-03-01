<?php
require_once ('db.php');

$servername = "localhost";
$username = "root";
$password = "Indra@6290";

// Create connection
$connection = new db($servername, $username, $password, "basicTaskPHP");

// Check connection
if ($connection->connect_error) {
  echo("Connection failed: " . $connection->connect_error);
}

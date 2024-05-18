<?php
$servername = "localhost";
$username = "username";
$password = "password";
$database = "db"; 


$conn = mysqli_connect($servername, $username, $password, $database);


if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>

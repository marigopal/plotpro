<?php
$servername = $_POST['input_host'];
$username = $_POST['input_username'];
$password = $_POST['input_password'];

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);

}
echo "1";
?> 
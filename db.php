<?php
// db.php
$servername = "localhost";
$username = "tourism_user";
$password = "TourismProject";
$dbname = "tourism";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>

<?php
$servername = "localhost"; // or 127.0.0.1
$username = "root"; // default in XAMPP
$password = ""; // default empty
$dbname = "login"; // un database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

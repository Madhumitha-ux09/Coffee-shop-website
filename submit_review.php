<?php
// Database connection
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "login";

// Create connection
$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get values from POST
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$comment = $_POST['comment'];

// Insert query
$sql = "INSERT INTO reviews (name, surname, email, comment)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $name, $surname, $email, $comment);

if ($stmt->execute()) {
    echo "<script>alert('Review Submitted Successfully'); window.location.href='review.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
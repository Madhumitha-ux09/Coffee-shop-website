<?php
session_start();

// Database connect
$conn = new mysqli("localhost", "root", "", "login");
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM signup WHERE email='$email'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        $row = $result->fetch_assoc();
        // Verify password
        if(password_verify($password, $row['password'])){
            $_SESSION['user_id'] = $row['id'];
            header("Location: /HtmlTutorial/index.php"); // Login success -> index page
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with this email.";
    }
}
?>
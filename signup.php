<?php
session_start();

// Database connect
$conn = new mysqli("localhost", "root", "", "login");
if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

// Check if form submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

    $sql = "INSERT INTO signup (username,email,address,mobile,password)
            VALUES ('$username','$email','$address','$mobile','$password')";

    if($conn->query($sql)){
        header("Location: /HtmlTutorial/signin.html"); // Signup success -> signin page
        exit();
    } else {
        echo "Error: ".$conn->error;
    }
}
?>
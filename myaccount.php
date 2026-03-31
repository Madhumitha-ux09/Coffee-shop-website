<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: signin.php");
    exit();
}

$conn = mysqli_connect("localhost","root","","login");
$id = $_SESSION['user_id'];
$sql = "SELECT username, email, address, mobile FROM signup WHERE id='$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Cart Initialize
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}
?>
<!DOCTYPE html>
<html lang="ta">
<head>
  <meta charset="UTF-8">
  <title>My Account</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        background: #f1edea;
        margin: 0;
    }
    .header {
        background: #6f4e37;
        color: white;
        padding: 15px;
        text-align: center;
        font-size: 22px;
    }
    .container {
        width: 90%;
        max-width: 1000px;
        margin: 20px auto;
        display: grid;
        grid-template-columns: 1fr 2fr;
        gap: 20px;
    }
    .card {
        background: white;
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    h2 {
        margin-top: 0;
        color: #5d2d0c;
    }
    .user-info p {
        margin: 8px 0;
        font-size: 15px;
    }
    .user-info strong {
        color: #6f4e37;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }
    th, td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }
    th {
        background: #6f4e37;
        color: white;
    }
    .grand-total {
        background: #ffe4c4;
        font-weight: bold;
    }
    .btn-order {
        display: inline-block;
        margin-top: 15px;
        padding: 12px 25px;
        background: #6f4e37;
        color: white;
        border: none;
        border-radius: 25px;
        font-size: 16px;
        cursor: pointer;
    }
    .btn-order:hover {
        background: #8b5e3c;
    }
    .btn {
        display: inline-block;
        margin: 8px 5px 0 0;
        padding: 10px 18px;
        border: none;
        border-radius: 6px;
        font-size: 14px;
        cursor: pointer;
        color: white;
        text-decoration: none;
    }
    .btn-edit {background:#007bff;}
    .btn-edit:hover {background:#0056b3;}
    .btn-logout {background:#dc3545;}
    .btn-logout:hover {background:#a71d2a;}
  </style>
</head>
<body>
    <div class="header">☕ My Account</div>

    <div class="container">
        <!-- Left side: Profile -->
        <div class="card">
            <h2>Profile Details</h2>
            <div class="user-info">
                <p><strong>Name:</strong> <?= $row['username'] ?></p>
                <p><strong>Email:</strong> <?= $row['email'] ?></p>
                <p><strong>Address:</strong> <?= $row['address'] ?></p>
                <p><strong>Mobile:</strong> <?= $row['mobile'] ?></p>
            </div>
            <!-- Buttons -->
            <form action="signup.html" method="get" style="display:inline;">
                <button type="submit" class="btn btn-edit">✏ Edit Profile</button>
            </form>
            <form action="logout.php" method="post" style="display:inline;">
                <button type="submit" class="btn btn-logout">🚪 Logout</button>
            </form>
        </div>
</body>
</html>
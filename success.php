<?php
$status = $_GET['status'] ?? '';
$msg = "✅ Order Placed Successfully!";

if ($status == "card") {
    $msg = "✅ Payment Successful via Card";
} elseif ($status == "netbanking") {
    $msg = "✅ Payment Successful via Net Banking";
} elseif ($status == "upi") {
    $msg = "✅ Payment Successful via UPI";
} elseif ($status == "cod") {
    $msg = "✅ Order Confirmed - Cash on Delivery";
}
?>
<!DOCTYPE html>
<html lang="ta">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Order Success</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f4f4f9; text-align: center; padding-top: 100px; }
    .box { display: inline-block; background: #fff; padding: 30px; border-radius: 12px; 
           box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
    h2 { color: green; }
    a { display: inline-block; margin-top: 20px; text-decoration: none; background: #4CAF50; 
        color: #fff; padding: 10px 20px; border-radius: 6px; }
    a:hover { background: #45a049; }
  </style>
</head>
<body>
  <div class="box">
    <h2><?= $msg ?></h2>
    <p>Thank you for shopping with Coffee Shop ☕</p>
    <a href="index.php">Back to Home</a>
  </div>
</body>
</html>
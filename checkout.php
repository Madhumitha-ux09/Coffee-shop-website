<?php
// ------------------- DB CONNECTION -------------------
$host = "localhost";
$user = "root";
$pass = "";
$db   = "login"; 

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("DB Connection Failed: " . $conn->connect_error);
}

// ------------------- BACKEND LOGIC -------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $paymentType = $_POST['paymentType'] ?? '';

    if ($paymentType == "card") {
        $cardNumber = $_POST['cardNumber'] ?? '';
        $validity   = $_POST['validity'] ?? '';
        $cvv        = $_POST['cvv'] ?? '';

        $stmt = $conn->prepare("INSERT INTO payments (paymentType, cardNumber, validity, cvv) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $paymentType, $cardNumber, $validity, $cvv);
        $stmt->execute();

        header("Location: success.php?status=card");
        exit;
    }
    elseif ($paymentType == "netbanking") {
        $bank = $_POST['bank'] ?? '';
        $stmt = $conn->prepare("INSERT INTO payments (paymentType, bank) VALUES (?, ?)");
        $stmt->bind_param("ss", $paymentType, $bank);
        $stmt->execute();
        header("Location: success.php?status=netbanking");
        exit;
    }
    elseif ($paymentType == "upi") {
        $upiId = $_POST['upiId'] ?? '';
        $stmt = $conn->prepare("INSERT INTO payments (paymentType, upiId) VALUES (?, ?)");
        $stmt->bind_param("ss", $paymentType, $upiId);
        $stmt->execute();
        header("Location: success.php?status=upi");
        exit;
    }
    elseif ($paymentType == "cod") {
        $stmt = $conn->prepare("INSERT INTO payments (paymentType) VALUES (?)");
        $stmt->bind_param("s", $paymentType);
        $stmt->execute();
        header("Location: success.php?status=cod");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="ta">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Coffee Shop - Payment Page</title>
  <style>
    body { 
      font-family: Arial, sans-serif; 
      margin: 0; 
      padding: 0; 
      background: url('coffee-bg.jpg') no-repeat center center/cover; /* உங்க image வையங்க */
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .overlay {
      background: rgba(0,0,0,0.6); 
      width: 100%; 
      height: 100%;
      position: absolute;
      top: 0; left: 0;
    }
    .container { 
      position: relative;
      z-index: 2;
      width: 90%; 
      max-width: 600px; 
      margin: auto; 
      background: rgba(255,255,255,0.9); 
      padding: 25px;
      border-radius: 15px; 
      box-shadow: 0 6px 12px rgba(0,0,0,0.2); 
    }
    h2 { text-align: center; color: #333; margin-bottom: 20px; }
    .option { margin-bottom: 15px; padding: 10px; border: 1px solid #ddd; border-radius: 8px; background: #fafafa; }
    .details { display: none; margin-top: 10px; }
    label { display: block; margin-top: 8px; font-weight: bold; }
    input, select, button { 
      width: 100%; 
      padding: 10px; 
      margin-top: 6px; 
      border: 1px solid #ccc; 
      border-radius: 8px; 
    }
    button { 
      background: #ff6600; 
      color: #fff; 
      font-size: 16px; 
      cursor: pointer; 
      border: none; 
    }
    button:hover { background: #e65c00; }
  </style>
</head>
<body>
  <div class="overlay"></div>
  <div class="container">
    <h2>☕ Coffee Shop Payment</h2>
    <form method="POST">
      <!-- Card Payment -->
      <div class="option">
        <input type="radio" name="paymentType" value="card" onclick="selectDetails('cardDetails')"> Credit / Debit / ATM Card
        <div class="details" id="cardDetails">
          <label>Card Number</label>
          <input type="text" name="cardNumber" placeholder="XXXX-XXXX-XXXX-XXXX">
          <label>Valid Through</label>
          <input type="text" name="validity" placeholder="MM/YY">
          <label>CVV</label>
          <input type="password" name="cvv" placeholder="XXX">
          <button type="submit">Pay Now</button>
        </div>
      </div>

      <!-- Net Banking -->
      <div class="option">
        <input type="radio" name="paymentType" value="netbanking" onclick="selectDetails('netDetails')"> Net Banking
        <div class="details" id="netDetails">
          <label>Select Bank</label>
          <select name="bank">
            <option value="">-- Select Bank --</option>
            <option>SBI</option>
            <option>HDFC</option>
            <option>ICICI</option>
            <option>Indian Bank</option>
            <option>Axis Bank</option>
          </select>
          <button type="submit">Proceed to Bank</button>
        </div>
      </div>

      <!-- UPI -->
      <div class="option">
        <input type="radio" name="paymentType" value="upi" onclick="selectDetails('upiDetails')"> UPI (GPay, PhonePe, Paytm)
        <div class="details" id="upiDetails">
          <label>Enter UPI ID</label>
          <select name="UPI">
           <option value="">-- Select UPI --</option>
            <option>Gpay</option>
            <option>Phonepe</option>
            <option>payment</option>
            <option>Navi</option>
            <option>Paypal</option>
          </select> 
          <button type="submit">Pay via UPI</button>
        </div>
      </div>

      <!-- COD -->
      <div class="option">
        <input type="radio" name="paymentType" value="cod" onclick="selectDetails('codDetails')"> Cash on Delivery
        <div class="details" id="codDetails">
          <p>💵 Pay when you receive your order.</p>
          <button type="submit">Confirm Order</button>
        </div>
      </div>
    </form>
  </div>

  <script>
    function selectDetails(id) {
      document.querySelectorAll('.details').forEach(div => div.style.display = 'none');
      document.getElementById(id).style.display = 'block';
    }
  </script>
</body>
</html>
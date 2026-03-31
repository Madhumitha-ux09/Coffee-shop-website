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

// Add to cart
if (isset($_POST['add_to_cart'])) {
    $product = [
        'id' => $_POST['product_id'] ?? null,
        'name' => $_POST['product_name'] ?? '',
        'price' => $_POST['price'] ?? 0,
        'image' => $_POST['product_image'] ?? '',
        'quantity' => 1
    ];

    if ($product['id'] !== null) {
        $found = false;
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $product['id']) {
                // increase qty if already exists
                $item['quantity'] = isset($item['quantity']) ? $item['quantity'] + 1 : 1;
                $found = true;
                break;
            }
        }
        if (!$found) {
            $_SESSION['cart'][] = $product;
        }
    }
}

// Remove from cart
if (isset($_POST['remove_item'])) {
    $remove_id = $_POST['remove_item'];
    foreach ($_SESSION['cart'] as $key => $item) {
        if ($item['id'] == $remove_id) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']); // re-index
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="ta">
<head>
  <meta charset="UTF-8">
  <title>My Account & Cart</title>
  <style>
    body {
        font-family: Arial, sans-serif;
        background: #f3e5ab;
        margin: 0; padding: 0;
    }
    .container {
        width: 90%;
        max-width: 1000px;
        margin: 30px auto;
        background: white;
        padding: 20px;
        border-radius: 15px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.2);
    }
    h1, h2 {
        text-align: center;
        color: #5d2d0c;
    }
    .user-info {
        background: #fff3e0;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
        line-height: 1.6;
    }
    .user-info strong {
        color: #8b4513;
    }
    .cart-table {
        width: 100%;
        border-collapse: collapse;
    }
    .cart-table th, .cart-table td {
        border: 1px solid #ddd;
        padding: 10px;
        text-align: center;
    }
    .cart-table th {
        background: #8b4513;
        color: white;
    }
    .cart-table td img {
        border-radius: 8px;
        width: 70px;
        height: 70px;
        object-fit: cover;
    }
    .grand-total {
        background: #ffe4c4;
        font-weight: bold;
    }
    .btn-remove {
        padding: 5px 12px;
        background: crimson;
        color: white;
        border: none;
        border-radius: 8px;
        cursor: pointer;
    }
    .btn-remove:hover {
        background: darkred;
    }
    .btn-order {
        display: block;
        width: 200px;
        margin: 20px auto;
        padding: 12px;
        background: green;
        color: white;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        cursor: pointer;
    }
    .btn-order:hover {
        background: darkgreen;
    }
  </style>
</head>
<body>
<div class="container">
    <h1>☕ Coffee Shop - My Cart</h1>
    
    <!-- User Info -->
    <div class="user-info">
        <p><strong>Welcome:</strong> <?= htmlspecialchars($row['username']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($row['email']) ?></p>
        <p><strong>Address:</strong> <?= htmlspecialchars($row['address']) ?></p>
        <p><strong>Mobile:</strong> <?= htmlspecialchars($row['mobile']) ?></p>
    </div>

    <!-- Cart Items Table -->
    <h3>🛒 Your Cart Items</h3>
    <?php if (!empty($_SESSION['cart'])): ?>
        <table class="cart-table">
            <tr>
                <th>S.No</th>
                <th>Image</th>
                <th>Product</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
            <?php 
            $i = 1; 
            $grandTotal = 0;
            foreach ($_SESSION['cart'] as $item): 
                $quantity = isset($item['quantity']) ? $item['quantity'] : 1;
                $total = $item['price'] * $quantity;
                $grandTotal += $total;
            ?>
            <tr>
                <td><?= $i++; ?></td>
                <td><img src="<?= htmlspecialchars($item['image']); ?>" alt="<?= htmlspecialchars($item['name']); ?>"></td>
                <td><?= htmlspecialchars($item['name']); ?></td>
                <td>₹<?= number_format($item['price']); ?></td>
                <td><?= $quantity; ?></td>
                <td>₹<?= number_format($total); ?></td>
                <td>
                    <form method="post" style="margin:0;">
                        <button type="submit" name="remove_item" value="<?= $item['id']; ?>" class="btn-remove">Remove</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <tr class="grand-total">
                <td colspan="5"><b>Grand Total</b></td>
                <td colspan="2"><b>₹<?= number_format($grandTotal); ?></b></td>
            </tr>
        </table>

        <!-- Place Order Button -->
        <form action="checkout.php" method="post">
            <button type="submit" class="btn-order">✅ Place Order</button>
        </form>

    <?php else: ?>
        <p><i>No items in cart.</i></p>
    <?php endif; ?>
</div>
</body>
</html>
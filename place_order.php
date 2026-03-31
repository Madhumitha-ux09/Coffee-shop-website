<?php
session_start();
if (empty($_SESSION['cart']) || empty($_SESSION['checkout'])) { header("Location:addcarts.php"); exit; }

require 'config.php';

$cart = $_SESSION['cart'];
$info = $_SESSION['checkout'];
$method = $_POST['payment_method'] ?? 'COD';

function cart_total($cart){ $t=0; foreach($cart as $c){ $t += ($c['price']*$c['quantity']); } return $t; }
$total = cart_total($cart);

$mysqli->begin_transaction();
try {
  // orders
  $stmt = $mysqli->prepare("INSERT INTO orders (user_id, full_name, email, mobile, address, total, payment_method, status) VALUES (NULL,?,?,?,?,?,?,?)");
  $status = ($method === 'COD') ? 'COD_CONFIRMED' : 'PENDING';
  $stmt->bind_param("sssssss", $info['full_name'], $info['email'], $info['mobile'], $info['address'], $total, $method, $status);
  $stmt->execute();
  $order_id = $stmt->insert_id;
  $stmt->close();

  // order_items
  $stmt = $mysqli->prepare("INSERT INTO order_items (order_id, product_id, product_name, price, quantity, line_total) VALUES (?,?,?,?,?,?)");
  foreach($cart as $item){
    $line = $item['price'] * $item['quantity'];
    $pid  = isset($item['id']) ? (int)$item['id'] : null;
    $name = $item['name'];
    $price= $item['price'];
    $qty  = $item['quantity'];
    $stmt->bind_param("iissii", $order_id, $pid, $name, $price, $qty, $line);
    $stmt->execute();
  }
  $stmt->close();

  $mysqli->commit();

  // clear cart
  $_SESSION['cart'] = [];
  unset($_SESSION['checkout']);

  header("Location: success.php?order_id=".$order_id);
  exit;
} catch (Exception $e) {
  $mysqli->rollback();
  echo "Order failed: ".$e->getMessage();
}
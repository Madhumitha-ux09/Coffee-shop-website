<?php
session_start();
if (empty($_SESSION['cart']) || empty($_SESSION['checkout'])) { header("Location:addcarts.php"); exit; }

function cart_total($cart){ $t=0; foreach($cart as $c){ $t += ($c['price']*$c['quantity']); } return $t; }
$total = cart_total($_SESSION['cart']);
?>
<!DOCTYPE html><html><head>
<meta charset="utf-8"><title>Payments</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
<style>
.accordion summary{font-weight:600}
.total{position:sticky;top:0;background:#fff;padding:12px;border:1px solid #eee;margin-bottom:16px}
</style>
</head><body class="container">
<h2>Step 3 of 3 — Payments</h2>

<div class="total">
  <details open><summary>Total Amount</summary>
    <h3>₹<?=number_format($total,2)?></h3>
  </details>
</div>

<form method="post" action="place_order.php">
  <article class="accordion">
    <details>
      <summary>Credit / Debit / ATM Card</summary>
      <label>Card Number <input name="card_number" maxlength="19"></label>
      <label>Expiry <input name="expiry" placeholder="MM/YY"></label>
      <label>CVV <input name="cvv" maxlength="4"></label>
      <input type="hidden" name="payment_method" value="CARD">
      <button type="submit">Pay Now</button>
    </details>

    <details>
      <summary>EMI</summary>
      <p>Demo only — selecting EMI will create order.</p>
      <input type="hidden" name="payment_method" value="EMI">
      <button type="submit">Continue</button>
    </details>

    <details>
      <summary>Net Banking</summary>
      <select name="bank">
        <option>HDFC</option><option>ICICI</option><option>SBI</option><option>Axis</option>
      </select>
      <input type="hidden" name="payment_method" value="NET_BANKING">
      <button type="submit">Pay with Net Banking</button>
    </details>

    <details>
      <summary>UPI</summary>
      <label>UPI ID <input name="upi" placeholder="name@bank"></label>
      <input type="hidden" name="payment_method" value="UPI">
      <button type="submit">Pay via UPI</button>
    </details>

    <details>
      <summary>Cash on Delivery</summary>
      <p>Pay cash at delivery.</p>
      <input type="hidden" name="payment_method" value="COD">
      <button type="submit">Place COD Order</button>
    </details>

    <details>
      <summary>Have a Gift Card?</summary>
      <label>Gift Card Code <input name="gift"></label>
      <input type="hidden" name="payment_method" value="GIFT_CARD">
      <button type="submit">Redeem & Place Order</button>
    </details>
  </article>
</form>
</body></html>
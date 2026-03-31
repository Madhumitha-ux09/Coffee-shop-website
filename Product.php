<?php
session_start();

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_POST['ajax_add_to_cart'])) {
    $product = [
        'id' => $_POST['product_id'],
        'name' => $_POST['product_name'],
        'price' => $_POST['price'],
        'image' => $_POST['product_image']
    ];
    $_SESSION['cart'][] = $product;
    echo "success"; 
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Products</title>
<link rel="stylesheet" href="/HtmlTutorial/product.css"/>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
.msg {
  display: none;
  color: green;
  font-weight: bold;
  margin-top: 8px;
}
</style>
</head>
<body>
<!-- header -->
<div class="main">
  <div class="navbar">
    <div class="icon">
      <h2 class="logo">Hot&FResh<br><span>Coffee Shop</span></h2>
    </div>
    <div class="menu">
      <ul>
<li><a href="/HtmlTutorial/index.html">HOME</a></li>
<li><a href="/HtmlTutorial/About.html">ABOUT</a></li>
<li><a href="/HtmlTutorial/Product.php">PRODUCT</a></li>
<li><a href="/HtmlTutorial/Contact.html">CONTACT</a></li>
<li><a href="/HtmlTutorial/service.html">SERVICES</a></li>
<li><a href="/HtmlTutorial/Review.html">REVIEW</a></li>
<li><a href="/HtmlTutorial/myaccount.php">❤</i></a></li>
<li><a href="/HtmlTutorial/addcarts.php">🛒</i></a></li>
<img src="/HtmlTutorial/image/0946a75ee712942458699dfb2a1e107f[1].jpg" class="hamburger-menu"/>
</ul>
    </div>
    <div class="search">
      <input class="srch" type="search" placeholder="Search">
      <a href="#"><button class="btn">Search</button></a>
    </div>
  </div>
</div>

<p class="container-heading"> PRODUCT </p>
<div class="card-container">

  <!-- 12 Products -->
  <div class="copy-card">
    <img src="/HtmlTutorial/image/Thai-iced-coffee.jpg" class="card-img1">
    <p class="card-title">ICED COFFEE</p>
    <p class="prise"><del>₹120/-</del>&nbsp;₹100 /-</p>
    <button class="btn"><a href="checkout.php">Order</a></button>
    <button class="btn add-to-cart" data-id="1" data-name="ICED COFFEE" data-price="100" data-image="/HtmlTutorial/image/Thai-iced-coffee.jpg">Add to Cart</button>
    <div class="msg">✅ Added to Cart</div>
  </div>

  <div class="copy-card">
    <img src="/HtmlTutorial/image/WhatsApp Image 2025-07-13 at 02.02.07_afd5f5f3.jpg" class="card-img2">
    <p class="card-title">FRONZE COFFEE</p>
    <p class="prise"><del>₹120/-</del>&nbsp;₹90 /-</p>
    <button class="btn"><a href="checkout.php">Order</a></button>
    <button class="btn add-to-cart" data-id="2" data-name="FRONZE COFFEE" data-price="90" data-image="/HtmlTutorial/image/WhatsApp Image 2025-07-13 at 02.02.07_afd5f5f3.jpg">Add to Cart</button>
    <div class="msg">✅ Added to Cart</div>
  </div>

  <div class="copy-card">
    <img src="/HtmlTutorial/image/WhatsApp Image 2025-07-13 at 02.54.14_589db308.jpg" class="card-img3">
    <p class="card-title">VALINA COFFEE</p>
    <p class="prise"><del>₹120/-</del>&nbsp;₹100 /-</p>
    <button class="btn"><a href="checkout.php">Order</a></button>
    <button class="btn add-to-cart" data-id="3" data-name="VALINA COFFEE" data-price="100" data-image="/HtmlTutorial/image/WhatsApp Image 2025-07-13 at 02.54.14_589db308.jpg">Add to Cart</button>
    <div class="msg">✅ Added to Cart</div>
  </div>

  <div class="copy-card">
    <img src="/HtmlTutorial/image/WhatsApp Image 2025-07-13 at 03.03.39_38135656.jpg" class="card-img4">
    <p class="card-title">CHOCOLATE COFFEE</p>
    <p class="prise"><del>₹160/-</del>&nbsp;₹150 /-</p>
    <button class="btn"><a href="checkout.php">Order</a></button>
    <button class="btn add-to-cart" data-id="4" data-name="CHOCOLATE COFFEE" data-price="150" data-image="/HtmlTutorial/image/WhatsApp Image 2025-07-13 at 03.03.39_38135656.jpg">Add to Cart</button>
    <div class="msg">✅ Added to Cart</div>
  </div>

  <div class="copy-card">
    <img src="/HtmlTutorial/image/WhatsApp Image 2025-07-13 at 03.05.57_3ca212cb.jpg" class="card-img5">
    <p class="card-title">NTRO COFFEE</p>
    <p class="prise"><del>₹100/-</del>&nbsp;₹80 /-</p>
    <button class="btn"><a href="checkout.php">Order</a></button>
    <button class="btn add-to-cart" data-id="5" data-name="NTRO COFFEE" data-price="80" data-image="/HtmlTutorial/image/hot-coffee.jpg">Add to Cart</button>
    <div class="msg">✅ Added to Cart</div>
  </div>

  <div class="copy-card">
    <img src="/HtmlTutorial/image/WhatsApp Image 2025-07-13 at 03.07.03_21514d9e.jpg" class="card-img6">
    <p class="card-title">BLACK COFFEE</p>
    <p class="prise"><del>₹140/-</del>&nbsp;₹120 /-</p>
    <button class="btn"><a href="checkout.php">Order</a></button>
    <button class="btn add-to-cart" data-id="6" data-name="BLACK COFFEE" data-price="120" data-image="/HtmlTutorial/image/cappuccino.jpg">Add to Cart</button>
    <div class="msg">✅ Added to Cart</div>
  </div>

  <div class="copy-card">
    <img src="/HtmlTutorial/image/WhatsApp Image 2025-07-13 at 03.12.59_0e694c5e.jpg" class="card-img7">
    <p class="card-title">FLAT WHITE COFFEE</p>
    <p class="prise"><del>₹130/-</del>&nbsp;₹110 /-</p>
    <button class="btn"><a href="checkout.php">Order</a></button>
    <button class="btn add-to-cart" data-id="7" data-name="FLAT WHITE COFFEE" data-price="110" data-image="/HtmlTutorial/image/espresso.jpg">Add to Cart</button>
    <div class="msg">✅ Added to Cart</div>
  </div>

  <div class="copy-card">
    <img src="/HtmlTutorial/image/WhatsApp Image 2025-07-13 at 03.19.15_cf5787da.jpg" class="card-img8">
    <p class="card-title">MOCHA COFFEE</p>
    <p class="prise"><del>₹160/-</del>&nbsp;₹140 /-</p>
    <button class="btn"><a href="checkout.php">Order</a></button>
    <button class="btn add-to-cart" data-id="8" data-name="MOCHA COFFEE" data-price="140" data-image="/HtmlTutorial/image/mocha.jpg">Add to Cart</button>
    <div class="msg">✅ Added to Cart</div>
  </div>

  <div class="copy-card">
    <img src="/HtmlTutorial/image/WhatsApp Image 2025-07-13 at 03.21.37_d44ffdf9.jpg" class="card-img9">
    <p class="card-title">SMOOTHIS COFFEE</p>
    <p class="prise"><del>₹150/-</del>&nbsp;₹130 /-</p>
    <button class="btn"><a href="checkout.php">Order</a></button>
    <button class="btn add-to-cart" data-id="9" data-name="SMOOTHIS COFFEE" data-price="130" data-image="/HtmlTutorial/image/latte.jpg">Add to Cart</button>
    <div class="msg">✅ Added to Cart</div>
  </div>

  <div class="copy-card">
    <img src="/HtmlTutorial/image/WhatsApp Image 2025-07-13 at 03.23.08_5cc23581.jpg" class="card-img10">
    <p class="card-title">FRAPPUCCINO COFFEE</p>
    <p class="prise"><del>₹170/-</del>&nbsp;₹150 /-</p>
    <button class="btn"><a href="checkout.php">Order</a></button>
    <button class="btn add-to-cart" data-id="10" data-name="FRAPPUCCINO COFFEE" data-price="150" data-image="/HtmlTutorial/image/cold-brew.jpg">Add to Cart</button>
    <div class="msg">✅ Added to Cart</div>
  </div>

  <div class="copy-card">
    <img src="/HtmlTutorial/image/WhatsApp Image 2025-07-13 at 03.27.19_0515ce9d.jpg" class="card-img12">
    <p class="card-title"> EXPRESSO</p>
    <p class="prise"><del>₹180/-</del>&nbsp;₹160 /-</p>
    <button class="btn"><a href="checkout.php">Order</a></button>
    <button class="btn add-to-cart" data-id="11" data-name="EXPRESSO" data-price="160" data-image="/HtmlTutorial/image/irish.jpg">Add to Cart</button>
    <div class="msg">✅ Added to Cart</div>
  </div>

  <div class="copy-card">
    <img src="/HtmlTutorial/image/WhatsApp Image 2025-07-13 at 03.26.36_ed4e502c.jpg" class="card-img11">
    <p class="card-title"> CAPPUCCINO</p>
    <p class="prise"><del>₹140/-</del>&nbsp;₹120 /-</p>
    <button class="btn"><a href="checkout.php">Order</a></button>
    <button class="btn add-to-cart" data-id="12" data-name="CAPPUCCINO" data-price="120" data-image="/HtmlTutorial/image/americano.jpg">Add to Cart</button>
    <div class="msg">✅ Added to Cart</div>
  </div>

</div>

<script>
$(document).ready(function(){
  $(".add-to-cart").click(function(){
    let btn = $(this);
    let product_id = btn.data("id");
    let product_name = btn.data("name");
    let price = btn.data("price");
    let image = btn.data("image");

    $.ajax({
      url: "Product.php",
      type: "POST",
      data: {
        ajax_add_to_cart: true,
        product_id: product_id,
        product_name: product_name,
        price: price,
        product_image: image
      },
      success: function(response){
        if(response.trim() === "success"){
          btn.next(".msg").fadeIn().delay(2000).fadeOut();
        }
      }
    });
  });
});
</script>
</body>
</html>
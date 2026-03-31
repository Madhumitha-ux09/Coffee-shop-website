<?php
session_start();
$conn = new mysqli("localhost","root","","login");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>coffe shop</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="/HtmlTutorial/style.css">
</head>
<body>
<!-- header section start -->
<div class="main">
<div class="navbar">
<div class="icon">
<h2 class="logo"> Hot & Fresh<br><span>Coffee Shop</span></h2>
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
<li><a href="/HtmlTutorial/addcarts.php"><i class="fa-solid fa-cart-shopping"></i></a></li>
<img src="/HtmlTutorial/image/0946a75ee712942458699dfb2a1e107f[1].jpg" class="hamburger-menu"/>
</ul>
</div>
<div class="search">
<input class="srch" type="search" name="" placeholder="Search">
<a href="#"><button class="btn">Search</button></a>
</div>
</div>
<!-- header section end -->
<!-- home section start -->
<div class="content">
<h3>Best Coffee<br>Make your day great with our special Coffee!<br>welcome to our coffee paradise.<br> Where every bean tells
 a stroy and every cup sparks joy.</h3>
</p>
<button class="btn"><a href="/HtmlTutorial/myaccount.php">My Account</a></button>
<button class="btn"><a href="/HtmlTutorial/Contact.html">Contact Now</a></button>
</div>
</div>
<!-- home section end -->
<!-- product section start -->
<div class="heading">
<h1> Popular Coffee's</h1>
</div>
<div class="card1">
<div class="card">
<img src="/HtmlTutorial/image/milchkaffee-guide-blog-header_be459741-a9e2-47e2-a599-2847b567b859.webp" alt="Denim Jeans" style="width:90%">
<h2>Hot Coffee</h2>
<p class="price"><del>₹120/-</del> ₹100/-</p>
<p class="b"><button class="btn"><a href="/Order.html">Order</a></button><button class="btn"><a href="./pages/product.html">View More</a></button></p>
</div>
<div class="card">
<img src="/HtmlTutorial/image/latte.png" alt="Denim Jeans" style="width:90%">
<h2>latte </h2>
<p class="price"><del>₹120/-</del> ₹100/-</p>
<p class="b"><button class="btn"><a href="/Order.html">Order</a></button><button class="btn"><a href="./pages/product.html">View More</a></button></p>
</div>
<div class="card">
<img src="/HtmlTutorial/image/download.jpg" alt="Denim Jeans" style="width:90%">
<h2>Fresh Cold Coffee</h2>
<p class="price"><del>₹120/-</del> ₹100/-</p>
<p class="b"><button class="btn"><a href="/Order.html">Order</a></button><button class="btn"><a href="./pages/product.html">View More</a></button></p>
</div>
</div>
<div>
<footer class="footer">
<!--  product section end -->
<!-- footer section start -->
<div class="sections-container">
<div class="footer-sections ">
<p class="section-title">Quick links:</p><br>
<div class="section-links">
<h4><p><a href="/About.html" class="about-links">About</a></p><br>
<p><a href="/Contact.html" class="about-links" >Contact</a></p><br>
<p><a href="/service.html" class="about-links">Services</a></p><br>
<p><a href="/Review.html" class="about-links">Review</a></p><br></h4>
</div>
</div>
<div class="footer-sections">
<p class="section-title">Supports:</p><br>
<div class="section-links">
<h3><p>Payment</p><br>
<p>Security</p><br>
<p>FAQ</p><br>
<p>Privacy Police</p><br></h3>
</div>
</div>
<div class="footer-sections">
<p class="section-title">Social:</p><br>
<div class="section-links">
<h3><p><p><i class="fa-brands fa-youtube"></i>&nbsp; YouTube</p><br>
<p><i class="fa-solid fa-envelope"></i>&nbsp; Mail Us</p><br>
<p><i class="fa-solid fa-phone"></i>&nbsp; Call Us</p><br>
<p><i class="fa-brands fa-instagram"></i>&nbsp; Instagram</p><br></h3>
</div>
</div>
<div class="footer-sections">
<p><a href="/HtmlTutorial/Contact.html"class="section-title">Contact Us: </a></p><br>
<div class="section-links">
<h4><p><h2>Golden Coffee shop</h2></a></p><br>
<p><i class="fa-solid fa-envelope"></i><a href="mailto:sakshigore2153@gmail.com" class="about-links">goldencoffeeshop@gamil.com</a></p><br>
<p><i class="fa-solid fa-phone"></i><a href="tel:9766559236" class="about-links">Tel: +91623456789</a></p></h4>
</div>
</div>
</div>
<hr/>
<p style="text-align: center; color: #ff7200; margin: 0; padding: 0;">Copyright@ Coffee Shop. All Rights Reserved</p>
</footer></div>
<script src="https://kit.fontawesome.com/029a190c6b.js" crossorigin="anonymous"></script>
</body>
</html>
<!-- end footer -->


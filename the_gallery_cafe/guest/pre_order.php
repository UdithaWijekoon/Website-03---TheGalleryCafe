<?php
include('../config.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre Order</title>
    <link rel="stylesheet" href="css/pre_order.css">
</head>

<style>
body {
background-image: url(../images/background/1.jpg);
background-size: cover;
}

.container {
max-width: 1000px;
margin: 0 auto;
padding: 20px;
}

.nav-link:hover::after {
    transform-origin: left;
    transform: scaleX(1);
}
.nav-button{
  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    padding: 15px 35px 15px 35px;
    text-decoration: none;
    transition: 0.5s;
    font-size: 15px;
    overflow: hidden;
    display: inline-block;
    position: relative;
    display: inline-block;
    color: rgb(0, 0, 0);
    overflow: hidden;
    background-color: transparent;
    color: #fff;
    font-size: 20px;
    border: none;
    cursor: pointer;
}
.nav-link{
    position: relative;
    text-decoration: none;
    color: #ffbd42;
    margin: 0px 50px 0px 0px;
    display: inline-block;
    font-size: 20px;
}
.nav-button:hover{
background: #ffbd42;
color: #000;
box-shadow: 
0 0 5px #ffbd42,
0 0 5px #ffbd42,
0 0 5px #ffbd42,
0 0 5px #ffbd42;
-webkit-box-reflect: below 1px linear-gradient(transparent, rgb(0, 0, 0)); 
}

.card {
    border: none;
    color: #000;
    border-radius: 10px;
    overflow: hidden;
    background-color: #ffbd42;
    background-size: cover;

}

.card-header {
    background-color: #343a40;
    color: #fff;
    text-align: center;
    padding: 20px;
    border-bottom: none;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

h2{
    font-size:60px;
    font-family: 'Dancing Script', sans-serif;
    text-align:center;
}

h3{
    text-align: center;
    }
h3 a{
    color: #9b0202;
    text-decoration: none;
    font-size: 1.5rem;
    }
h3 a:hover{
    color: #e42424;
    text-decoration: underline;
    }
    .nav-link:hover {
        color: #fff;
    }
    .active {
        color: #fff;
    }
    .nav-button:hover{
        color: #000;
    }
    @media only screen and (max-width: 1300px) {
    .logo{
      display: none;
    }
    .nav-items {
      flex-direction: column;
    }
    .nav-link {
      margin: 10px 0;
    }
    nav {
    position: relative;
    animation: none;
    align-items: right;
    }
    header{
    background-image: url(../images/background/1.jpg);
    background-size: cover;
    }
   }
</style>

<body>
    <header>
        <nav>
            <ul class="nav-items">
                <li class="nav-item1"><a href="../index.php" class="nav-link">Home</a></li>
                <li class="nav-item2"><a href="menu.php" class="nav-link">Menu</a></li>
                <li class="nav-item3"><a href="about_us.php" class="nav-link">About Us</a></li>
                <li class="nav-item3"><a href="customer_reviews.php" class="nav-link">Reviews</a></li>
                <li class="nav-item4"><a href="reservation.php" class="nav-link">Reservation</a></li>
                <li class="nav-item5"><a href="pre_order.php" class="nav-link">Pre-Order</a></li>
                <li class="nav-item6"><a href="contact_us.php" class="nav-link">Contact Us</a></li>
                <li class="nav-item7"><a href="../login/login.php"><button class="nav-link nav-button">        
                <span></span>
                <span></span>
                <span></span>
                <span></span>Login</button></a></li>
            </ul>
            <div class="logo"><a href="../index.php"><img src="../images/logo.png" alt="logo"></a>The Gallery Cafe</div> 
        </nav>
    </header>

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4">Pre-Order Items</h2>
            <h3>You need to Login or Signup for Pre Order. <a href="../login/login.php">Login here</a></h3>
        </div>
    </div>

    <footer>
        <div class="footer-content">
            <div class="footer-section about">
                <h3>The Gallery Cafe</h3>
                <p>The Gallery Cafe offers a unique dining experience with a blend of exquisite cuisine and a charming atmosphere. Join us to enjoy our special meals, events, and promotions.</p>
            </div>
            <div class="footer-section links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="menu.php">Menu</a></li>
                    <li><a href="about_us.php">About Us</a></li>
                    <li><a href="customer_reviews.php">Reviews</a></li>
                    <li><a href="promotion.php">Special Events</a></li>
                    <li><a href="reservation.php">Reservation</a></li>
                    <li><a href="pre_order.php">Pre-Order</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                    <li><a href="parking_availability.php">Parking</a></li>
                    <li><a href="tables.php">Tables</a></li>

                </ul>
            </div>
            <div class="footer-section contact">
                <h3>Contact Us</h3>
                <p>Location: 12/24 D.S.Senanayake Street, Colombo, Sri Lanka</p>
                <p>Phone: +94 11 2345678</p>
                <p>Email: info@thegallerycafe.com</p>
            </div>
          </div>
        <div class="footer-bottom">
            <p>The Gallery Cafe</p>
        </div>
    </footer>
<script>
    // Get the current page's URL
    const currentPage = window.location.pathname.split('/').pop();

    // Get all navigation links
    const navLinks = document.querySelectorAll('.nav-link');

    // Loop through each link and add 'active' class to the matching link
    navLinks.forEach(link => {
        const href = link.getAttribute('href').split('/').pop();
        if (href === currentPage) {
            link.classList.add('active');
        }
    });
</script>
</body>
</html>
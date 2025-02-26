<?php include('../config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="css/reservation.css">
</head>

<style>
    body{
    background-image: url(../images/background/3.jpg);
    background-size: cover;
    }
    .alert {
    margin-top: 20px;
    color: #9b0202;
    font-size:20px;
    }
    h3{
        font-weight: 500;
    }
    h3 a{
        color: #e42424;
        text-decoration: none;
        font-size: 1.5rem;
        font-weight: 400;
    }
    h3 a:hover{
        color: #9b0202;
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

    <div class="reservation">
    <section id="reservation">
        <h1>Reserve Your Table</h1>
        <p>Welcome to The Gallery Cafe's online reservation system. Please fill out the form below to book your table. We look forward to serving you an exceptional dining experience.</p>
        <h3>You need to Login or Signup for Make Reservations. <a href="../login/login.php">Login here</a></h3>

    </section>
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


<script src="js/reservation.js"></script>
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
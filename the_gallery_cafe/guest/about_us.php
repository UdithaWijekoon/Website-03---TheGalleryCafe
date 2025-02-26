<?php
include('../config.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="css/about_us.css">
</head>

<style>
    body{
        background-image: url(../images/background/2.jpg);
        background-size: cover;
        }
    header{
        background-image: url(../images/background/1.jpg);
        background-size: cover;
        }
    h3 a{
        color: #9b0202;
        text-decoration: none;
        font-size: 2rem;
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

    
    <div id="about">
        <div class="content">
        <h1>About The Gallery Cafe</h1>
        <p>Welcome to The Gallery Cafe, where culinary excellence meets a charming atmosphere. Located in the heart of Colombo, we offer a unique dining experience with a blend of exquisite cuisine and impeccable service. Our restaurant is dedicated to providing memorable moments for all our guests, whether they are here for a casual meal or a special celebration.</p>
    </div>
        <div class="about-div">
            <h2>Restaurant Information</h2>
            <p>Established in 2020, The Gallery Cafe has become a favorite destination for food enthusiasts. Our menu features a variety of dishes inspired by international cuisines, crafted with the freshest ingredients. We take pride in our welcoming ambiance, perfect for family gatherings, romantic dinners, and business lunches.</p>
            <img src="../images/hotel/hotel.jpg" alt="Restaurant Image" class="responsive">
        </div>

        <div class="about-div1">
            <h2>Available Table Capacity</h2>
            <h3><a href="tables.php">Click Here</a>  to See Our Table Capacity Details </h3>
            <p>We have a total of 50 tables available, which can accommodate both small and large groups. Our seating arrangement includes:</p>
            <ul>
                <li>20 tables for 2 persons</li>
                <li>15 tables for 4 persons</li>
                <li>10 tables for 6 persons</li>
                <li>5 tables for 8 persons</li>
            </ul>
            <img src="../images/hotel/table.jpg" alt="Table Capacity Image" class="responsive">
        </div>

        <div class="about-div2">
            <h2>Parking Availability</h2>
            <h3><a href="parking_availability.php">Click Here</a>  to See Our Parking Details </h3>
            <p>Our restaurant offers ample parking space for all our guests. We have a secure parking area that can accommodate up to 30 vehicles, ensuring a hassle-free experience when you visit us. In addition, we provide valet parking services during peak hours for your convenience.</p>
            <img src="../images/hotel/car-park.jpg" alt="Parking Image" class="responsive">
        </div>

        <div class="about-div3">
            <h2>Our Mission</h2>
            <p>Our mission is to deliver an exceptional dining experience by combining high-quality food, excellent service, and a warm and inviting atmosphere. We are committed to continuously improving and innovating our offerings to exceed our guests' expectations.</p>
        </div>

        <div class="about-div4">
            <h2>Contact Us</h2>
            <p>Feel free to contact us at <strong><a href="mailto:info@thegallerycafe.com">info@thegallerycafe.com</a></strong> or visit <strong><a href="https://maps.app.goo.gl/AZ7d4gzyVqNuQsBZ6" target="_blank">The Gallery Cafe</a></strong> at 12/24 D.S.Senanayake Street, Colombo, Sri Lanka. We look forward to serving you!</p>
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
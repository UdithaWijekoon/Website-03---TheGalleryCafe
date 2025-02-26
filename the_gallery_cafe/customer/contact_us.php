<!-- login session starting -->
<?php 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: ../index.php");
    exit();
}
?>

<?php
include('../config.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="css/contact_us.css">
</head>
<style>
     body{
        background-image: url(../images/background/2.jpg);
        background-size: cover;
    }
    .alert {
    margin-top: 20px;
    color: #9b0202;
    font-size:20px;
    }
    .alert-success{
    color: green;
    }
    p a{
        color: #9b0202;
        text-decoration: none;
    }
    p a:hover{
        color: #e42424;
        text-decoration: underline;
    }

</style>
<body>
    <!-- header from partials -->
    <?php include('partials/header_c.php'); ?>  
    
    <section id="contact">
        <h1>Contact Us</h1>

        <div class="contact-container">
            <!-- Send Message Div -->
            <div class="contact-form">
                <h2>Send Message</h2>
        <?php
        if (isset($_SESSION['contact_success'])) {
            echo "<div class='alert alert-success'>{$_SESSION['contact_success']}</div>";
            unset($_SESSION['contact_success']);
        }
        if (isset($_SESSION['contact_error'])) {
            echo "<div class='alert alert-danger'>{$_SESSION['contact_error']}</div>";
            unset($_SESSION['contact_error']);
        }
        ?>
                <form id="contact-form" action="submit_contact.php" method="POST">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
                    
                    <label for="subject">Subject:</label>
                    <input type="text" id="subject" name="subject" required>
                    
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" required></textarea>
                    
                    <input type="submit" value="Send Message">
                </form>
            </div>

            <!-- Get in Touch Div -->
            <div class="contact-info">
                <h2>Get in Touch</h2>
                <p><strong>Share Your Experience!</strong><br>We value your feedback and would love to hear about your recent visit.<strong><br><a href="customer_reviews.php">Click Here</a></strong> to Submit a Review and View Reviews.</p>
                <p><strong>Address:</strong><br>12/24 D.S.Senanayake Street, Colombo, Sri Lanka</p>
                <p><strong>Email:</strong><br>info@thegallerycafe.com</p>
                <p><strong>Phone:</strong><br>+94 11 2345678</p>
                <p><strong>Opening Hours:</strong><br>Monday - Friday: 8:00 AM - 10:00 PM<br>Saturday - Sunday: 9:00 AM - 11:00 PM</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <div class="footer-section about">
                <h3>The Gallery Cafe</h3>
                <p>The Gallery Cafe offers a unique dining experience with a blend of exquisite cuisine and a charming atmosphere. Join us to enjoy our special meals, events, and promotions.</p>
            </div>
            <div class="footer-section links">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="customer_dashboard.php">Home</a></li>
                    <li><a href="about_us.php">About Us</a></li>
                    <li><a href="promotion.php">Special Events</a></li>
                    <li><a href="reservation.php">Reservation</a></li>
                    <li><a href="pre_order.php">Pre-Order</a></li>
                    <li><a href="contact_us.php">Contact Us</a></li>
                    <li><a href="parking_availability.php">Parking</a></li>
                    <li><a href="tables.php">Tables</a></li>
                    <li><a href="customer_reviews.php">Reviews</a></li>
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

</body>
</html>
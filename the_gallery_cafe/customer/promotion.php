<?php
include('../config.php');?>

<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Special Events</title>
    <link rel="stylesheet" href="css/promotion.css">
</head>
<!-- styles for promotions and special events -->
<style>
       body{
       background-image: url(../images/background/1.jpg);
       background-size: cover;
    }
    h1{
       margin-top: -60px;
    } 
</style>
<body>
    <!-- header -->
    <!-- header from partials -->
    <?php include('partials/header_c.php'); ?>  

    <!-- content of promotions and special events -->
<section id="promotions">
    <h1>Our Promotions and Special Events</h1>
    <?php
    include('../config.php');
    $result = $conn->query("SELECT * FROM promotions ORDER BY date_time DESC");
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="promotion">
            <h2><?php echo htmlspecialchars($row['title']); ?></h2>
            <p><?php echo htmlspecialchars($row['description']); ?></p>
            <ul>
                <?php
                $details = explode("\n", $row['details']);
                foreach ($details as $detail) {
                    echo "<li>" . htmlspecialchars($detail) . "</li>";
                }
                ?>
            </ul>
            <p><strong>Date and Time:</strong> <?php echo htmlspecialchars($row['date_time']); ?></p>
            <?php if (!empty($row['ticket_price'])) { ?>
                <p><strong>Tickets:</strong> $<?php echo htmlspecialchars($row['ticket_price']); ?></p>
            <?php } ?>
        </div>
        <?php
    }
    ?>
</section>

    <!-- footer -->
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
<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: ../index.php");
    exit();
}
?>

<?php include('../config.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="css/reservation.css">
</head>
<!-- styles for reservation -->
<style>
    body {
        background-image: url(../images/background/1.jpg);
        background-size: cover;
    }
    .alert {
        margin-top: 20px;
        color: #9b0202;
        font-size: 20px;
    }
    .alert-success {
        color: green;
    }
    p a {
        color: #9b0202;
        text-decoration: none;
    }
    p a:hover {
        color: #e42424;
        text-decoration: underline;
    }
</style>
<body>
    <!-- header -->
    <!-- header from partials -->
    <?php include('partials/header_c.php'); ?>  

    <!-- reservation content -->
    <div class="reservation">
    <section id="reservation">
        <h1>Reserve Your Table</h1>
        <p>Welcome to The Gallery Cafe's online reservation system. Please fill out the form below to book your table. We look forward to serving you an exceptional dining experience. <a href="tables.php">Click Here</a> to See Our Table Capacity Details. </p>
        <!-- reservation success message -->
        <?php
        if (isset($_GET['message'])) {
            echo "<div class='alert alert-success mt-3'>" . $_GET['message'] . "</div>";
        }
        ?>

        <form id="reservation-form" method="POST" action="create_reservation.php">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
            </div>
            <div class="mb-3">
                <label for="time" class="form-label">Time</label>
                <input type="time" class="form-control" id="time" name="time" required>
            </div>
            <div class="mb-3">
                <label for="guests" class="form-label">Number of Guests</label>
                <input type="number" class="form-control" id="guests" name="guests" max="20" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message"></textarea>
            </div>
            <input type="submit" value="Book Now">
        </form>
    </section>
</div>

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

<script>
document.getElementById('reservation-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const date = document.getElementById('date').value.trim();
    const time = document.getElementById('time').value.trim();
    const guests = document.getElementById('guests').value.trim();
    const errors = [];

    if (name === '') {
        errors.push('Name is required.');
    }

    if (email === '') {
        errors.push('Email is required.');
    } else if (!validateEmail(email)) {
        errors.push('Email is not valid.');
    }

    if (phone === '') {
        errors.push('Phone number is required.');
    } else if (!validatePhone(phone)) {
        errors.push('Phone number must be 10 digits.');
    }

    if (date === '') {
        errors.push('Reservation date is required.');
    }

    if (time === '') {
        errors.push('Reservation time is required.');
    }

    if (guests === '') {
        errors.push('Number of guests is required.');
    } else if (guests <= 0 || guests > 20) {
        errors.push('Number of guests must be between 1 and 20.');
    }

    if (errors.length > 0) {
        alert(errors.join("\n"));
    } else {
        this.submit();
    }
});

function validateEmail(email) {
    const re = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    return re.test(email);
}

function validatePhone(phone) {
    const re = /^[0-9]{10}$/;
    return re.test(phone);
}
</script>
</body>
</html>

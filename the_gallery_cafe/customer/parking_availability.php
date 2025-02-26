<?php 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: ../index.php");
    exit();
}
include('../config.php');

// Fetch parking availability
$sql = "SELECT * FROM parking";
$result = $conn->query($sql);
$parking_slots = $result->fetch_all(MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Availability</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <style>
        /* styles for parking page */
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            background: #000;
            background-image: url(../images/background/1.jpg);
            background-size: cover;
            animation: fadeIn 1.5s ease-in-out;
        /* animation for entrance of the page */
        }
        @keyframes fadeIn {
        from {
      opacity: 0;
        }
        to {
      opacity: 1;
        }
        }   
        .container .text-center{
            color: #ffbd42;
            font-size: 4rem;
            margin-bottom: 10px;
            font-family: 'Dancing Script', sans-serif;
        }
        .card {
            border: none;
            border-radius: 10px;
            background: #FFF3D1;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            padding: 15px;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        .card-body {
            text-align: center;
            padding: 10px;
        }

        .fa-car {
            font-size: 40px;
        }

        .available {
            color: green;
        }

        .occupied {
            color: red;
        }

        .card-title {
            font-size: 1.2rem;
        }

        .card-text {
            font-size: 0.9rem;
        }

/* Footer */
footer {
    background-color: #000000;
    color: #fff;
    padding: 40px 0;
  }
  
  .footer-content {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
  }
  
  .footer-section {
    flex: 1 1 300px;
    margin: 20px;
  }
  
  .footer-section h3 {
    border-bottom: 2px solid #ffbd42;
    padding-bottom: 10px;
    margin-bottom: 10px;
  }
  
  .footer-section p, .footer-section ul {
    margin: 0;
    padding: 0;
    list-style: none;
    line-height: 1.8;
  }
  
  .footer-section a {
    color: #fff;
    text-decoration: none;
  }
  
  .footer-section a:hover {
    color: #ffbd42;
  }
  
  .footer-bottom {
    text-align: center;
    padding-top: 20px;
    border-top: 1px solid #444;
    margin-top: 20px;
  }
  
  
</style>
</head>

<body>
<!-- header from partials -->
<?php include('partials/header_c.php'); ?>  

    <div class="container mt-5">
        <h2 class="mb-4 text-center">Parking Availability</h2>
        <div class="row">
            <?php foreach ($parking_slots as $slot): ?>
                <div class="col-md-3 mb-3">
                    <div class="card h-100 shadow-lg">
                        <div class="card-body">
                            <i class="fa fa-car <?php echo $slot['status'] == 1 ? 'available' : 'occupied'; ?>"></i>
                            <h5 class="card-title">Parking Slot <?php echo $slot['id']; ?></h5>
                            <p class="card-text">Status: <?php echo $slot['status'] == 1 ? 'Available' : 'Occupied'; ?></p>
                            <p class="card-text"><?php echo $slot['description']; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
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

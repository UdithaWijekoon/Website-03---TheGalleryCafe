<?php
session_start();
include('../config.php');

// Handle form submissions to add a new review
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['customer_name'], $_POST['review_text'], $_POST['rating'])) {
    $customer_name = $_POST['customer_name'];
    $review_text = $_POST['review_text'];
    $rating = $_POST['rating'];

    $stmt = $conn->prepare("INSERT INTO reviews (customer_name, review_text, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $customer_name, $review_text, $rating);

    if ($stmt->execute()) {
        $_SESSION['review_success'] = "Thank you for your review!";
    } else {
        $_SESSION['review_error'] = "Error submitting your review: " . $stmt->error;
    }

    $stmt->close();
}

// Fetch reviews from the database
$result = $conn->query("SELECT * FROM reviews ORDER BY created_at DESC");
$reviews = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            background: #000;
            font-family: 'Arial', sans-serif;
            background-image: url(../images/background/1.jpg);
            background-size: cover;
            animation: fadeIn 1.5s ease-in-out;
        }
        /* animation for entrance of the page */
        @keyframes fadeIn {
        from {
      opacity: 0;
        }
        to {
      opacity: 1;
        }
        }   
        .text-center{
            color: #ffbd42;
            font-size: 4rem;
            font-family: 'Dancing Script', sans-serif;
            text-align: center;
        }
        .review-form {
            background-color: #1f1f1f;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            margin-bottom: 30px;
        }
        .review-form h2 {
            color: #fff;
        }
        .review-form .form-label {
            color: #b3b3b3;
        }
        .review-form .form-control,
        .review-form .form-select {
            border-radius: 5px;
            background-color: #2c2c2c;
            color: #e0e0e0;
            border: 1px solid #3a3a3a;
        }
        .review-form .btn-primary {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .review-form .btn-primary:hover {
            background-color: #0056b3;
        }
        .reviews {
            margin-top: 20px;
        }
        .review {
            background-color: #1f1f1f;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            margin-bottom: 20px;
        }
        .review h5 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #fff;
        }
        .review p {
            margin-bottom: 10px;
            color: #b3b3b3;
        }
        .review .rating {
            color: #ffc107;
            margin-bottom: 5px;
        }
        .review small {
            color: #6c757d;
        }
        .alert {
            border-radius: 5px;
        }
        .fa-star {
            margin-right: 2px;
        }
        .reviews-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .review-card {
            flex: 1 1 calc(33.333% - 20px);
            box-sizing: border-box;
        }
        @media (max-width: 768px) {
            .review-card {
                flex: 1 1 calc(50% - 20px);
            }
        }
        @media (max-width: 576px) {
            .review-card {
                flex: 1 1 100%;
            }
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
  .nav-items a:hover{
    color: #ffbd42;
  }

    </style>
</head>
<body>

<!-- header from partials -->
<?php include('partials/header_c.php'); ?>  

    <div class="container">
        <h1 class="text-center mb-4">Customer Reviews</h1>

        <!-- Success or error messages -->
        <?php if (isset($_SESSION['review_success'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['review_success']; unset($_SESSION['review_success']); ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['review_error'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['review_error']; unset($_SESSION['review_error']); ?>
            </div>
        <?php endif; ?>

        <!-- Review Form -->
        <div class="review-form">
            <h2>Submit Your Review</h2>
            <form action="customer_reviews.php" method="POST">
                <div class="mb-3">
                    <label for="customer_name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                </div>
                <div class="mb-3">
                    <label for="review_text" class="form-label">Review:</label>
                    <textarea class="form-control" id="review_text" name="review_text" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="rating" class="form-label">Rating:</label>
                    <select class="form-select" id="rating" name="rating" required>
                        <option value="1">1 - Very Poor</option>
                        <option value="2">2 - Poor</option>
                        <option value="3">3 - Average</option>
                        <option value="4">4 - Good</option>
                        <option value="5">5 - Excellent</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit Review</button>
            </form>
        </div>

        <!-- Display Reviews -->
        <div class="reviews reviews-grid">
            <?php foreach ($reviews as $review): ?>
                <div class="review review-card">
                    <h5><?php echo htmlspecialchars($review['customer_name']); ?> <i class="fas fa-user"></i></h5>
                    <p class="rating">
                        <?php echo str_repeat('<i class="fa fa-star"></i>', $review['rating']) . str_repeat('<i class="fa fa-star-o"></i>', 5 - $review['rating']); ?>
                    </p>
                    <p><?php echo nl2br(htmlspecialchars($review['review_text'])); ?></p>
                    <small class="text-muted"><i class="fas fa-clock"></i> <?php echo date('F j, Y, g:i a', strtotime($review['created_at'])); ?></small>
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

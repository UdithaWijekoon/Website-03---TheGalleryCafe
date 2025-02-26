<?php
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
    <title>Reviews</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <style>
        /* styles for parking page */
        @import url('https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        body {
            background-image: url(../images/background/1.jpg);
            background-size: cover;
            animation: fadeIn 1.5s ease-in-out;
            font-family: 'Arial', sans-serif;
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
        .reviews {
            margin-top: 20px;
        }
        .text-center{
            color: #ffbd42;
            font-size: 4rem;
            font-family: 'Dancing Script', sans-serif;
            text-align: center;
        }
        .text-center2{
            color: #fff;
            text-align: center;
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
/* Header and footer styles*/
.nav-items{
display: flex;
list-style: none; 
flex-direction: row;
justify-content: right;
padding: 50px 10px 50px;
font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
}
.logo{
width: 320px;
height: 180px;
margin: -160px 0px 0px 0px;
display: flex;
color: #ffbd42;
font-size: 20px;
text-align: left;
font-family: 'Dancing Script', sans-serif;

}
.logo img{
    width: 125%;
    height: 100%;
    margin-top: -40px;
    transition: transform 0.3s;
}
.logo img:hover{
  transform: scale(1.1);
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

.nav-link::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -6px;
    width: 100%;
    height: 3px;
    background-color: #ffbd42;
    border-radius: 40px;
    transform: scaleX(0);
    transform-origin: right;
    transition: transform .3s;
}

.nav-link:hover::after {
    transform-origin: left;
    transform: scaleX(1);
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

.nav-button span{
    position: absolute;
    display: block;  
}

.nav-button span:nth-child(1){
    top: 0;
    left: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(90deg, transparent, #ffbd42);
    animation: btn1 1s linear infinite;
}

@keyframes btn1{
    0%{
        left: -100%;
    }
    50%,100%{
        left: 100%;
    }
}

.nav-button span:nth-child(2){
    top: -100;
    right: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(180deg, transparent, #ffbd42);
    animation: btn2 1s linear infinite;
    animation-delay: -0.75s;
}

@keyframes btn2{
    0%{
        top: -100%;
    }
    50%,100%{
        top: 100%;
    }
}

.nav-button span:nth-child(3){
    bottom: 0;
    right: 0;
    width: 100%;
    height: 2px;
    background: linear-gradient(180deg, transparent, #ffbd42);
    animation: btn3 1s linear infinite;
    animation-delay: -0.50s;
}

@keyframes btn3{
    0%{
        right: -100%;
    }
    50%,100%{
        right: 100%;
    }
}

.nav-button span:nth-child(4){
    top: -100;
    left: 0;
    width: 2px;
    height: 100%;
    background: linear-gradient(180deg, transparent, #ffbd42);
    animation: btn4 1s linear infinite;
    animation-delay: -0.25s;
}

@keyframes btn4{
    0%{
        bottom: -100%;
    }
    50%,100%{
        bottom: 100%;
    }
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
  header{
    background-image: url(../images/background/1.jpg);
    background-size: cover;
    }
    }
    h2 a{
        color: #9b0202;
        text-decoration: none;
        font-size: 2rem;
    }
    h2 a:hover{
        color: #e42424;
        text-decoration: underline;
    }
    </style>
</head>
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

    <div class="container">
        <h1 class="text-center mb-4">Customer Reviews</h1>
        <h2 class="text-center2 mb-4">Please Login or Signup for Share Your Experience. <a href="../login/login.php">Login here</a></h2>

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

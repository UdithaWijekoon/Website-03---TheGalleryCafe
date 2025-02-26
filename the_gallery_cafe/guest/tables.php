<?php
session_start();
include('../config.php');

// Fetch table data from the database
$query = "SELECT category, SUM(available) AS available_count, SUM(reserved) AS reserved_count FROM tables GROUP BY category";
$result = $conn->query($query);
$table_data = [];
while ($row = $result->fetch_assoc()) {
    $table_data[$row['category']] = $row;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Table Capacities</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
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
        .container h1{
            text-align: center;
            color: #ffbd42;
            font-family: 'Dancing Script', sans-serif;
            font-size: 4rem;
        }
        .container .notice{
            text-align: center;
            font-size: 1.5rem;
            color: #fff;
        }
        .category-card {
            cursor: pointer;
            background: #ffbd42;
            color: #000;
        }
        .modal-body img {
            width: 100%;
        }
        .table-available {
            color: green;
        }
        .table-not-available {
            color: red;
        }
        .table-reserved {
            color: orange;
        }
        .table-not-reserved {
            color: gray;
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
        <h1>Table Capacities</h1>
        <p class="notice">Click on Each Category to find Table Availability.</p>

        <div class="row">
            <?php foreach ($table_data as $category => $data): ?>
                <div class="col-md-3">
                    <div class="card category-card" data-category="<?= $category ?>">
                        <img src="../images/hotel/<?= $category ?>.jpg" class="card-img-top" alt="<?= $category ?> table">
                        <div class="card-body">
                            <h5 class="card-title"><?= $category ?> Tables</h5>
                            <p class="card-text">Available: <?= $data['available_count'] ?></p>
                            <p class="card-text">Reserved: <?= $data['reserved_count'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="tableModal" tabindex="-1" aria-labelledby="tableModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="tableModalLabel">Table Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Content will be loaded dynamically using JavaScript -->
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.category-card').click(function() {
                var category = $(this).data('category');
                $.ajax({
                    url: 'fetch_table_details.php',
                    type: 'GET',
                    data: { category: category },
                    success: function(response) {
                        $('#tableModal .modal-body').html(response);
                        $('#tableModal').modal('show');
                    }
                });
            });
        });
    </script>

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
</body>
</html>

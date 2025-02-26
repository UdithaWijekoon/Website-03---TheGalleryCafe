<?php
include('../config.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="css/menu.css">

</head>
<style>
body {
background-image: url(../images/background/1.jpg);
background-size: cover;
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

.mb-4{
    font-size:60px;
    font-family: 'Dancing Script', sans-serif;
    text-align:center;
}
/* Container */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}
.main-content{
    margin-top: -100px;
    margin-bottom: -200px;
}
/* Card styling */
.card {
    border: none;
    color: #000;
    border-radius: 10px;
    overflow: hidden;
    background-color: #ffbd42;
    background-size: cover;
}

.card.shadow-sm {
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}

.card.shadow-lg {
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
}

/* Card Image */
.card-img-top {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    max-height: 200px;
    object-fit: cover;
    width: 100%;
}

/* Card Body */
.card-body {
    margin-top: -5px;
    padding: 20px;
    background-color: #ffffff;
}

/* Card Title */
.card-title {
    font-size: 1.25rem;
    margin-bottom: 10px;
    font-weight: bold;
}

/* Card Text */
.card-text {
    font-size: 1rem;
    color: #666;
}

/* Form elements */
    .form-label {
        font-weight: bold;
        margin-bottom: 5px;
        font-size: 1rem; 
        margin-left: 10px; 
    }

    .form-control {
        margin-bottom: 20px;
        padding: 10px;
        width: 100%;
        border-radius: 8px; 
        background-color: #fdfdfd; 
        transition: border-color 0.3s, box-shadow 0.3s; 
    }

    .form-control:focus {
        border-color: #d2691e; 
        box-shadow: 0 0 8px rgba(210, 105, 30, 0.5);
    }

    .form-control option {
        padding: 20px; 
        background-color: #fff; 
        color: #333; 
        font-size: 1rem; 
        border-bottom: 1px solid #ddd; 
    }

    .form-control option:hover {
        background-color: #f0f0f0; 
        color: #000; 
    }
/* Layout */
.row {
    display: flex;
    flex-wrap: wrap;
}

.col-md-4 {
    width: 370px;
    padding: 15px;
}

.mb-3 {
    margin-bottom: 1rem;
}

.mt-5 {
    margin-top: 3rem;
}

.mb-4 {
    margin-bottom: 1.5rem;
}
.main-content h1{
    font-size: 5rem;
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
    
    <div class="main-content">
    <h1>Savor Our Meals and Beverages</h1></div>

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4">Menu Items</h2>
            <div class="mb-3">
                <label for="cuisine_filter" class="form-label">Filter by Cuisine Type</label>
                <select class="form-control" id="cuisine_filter" name="cuisine_filter" onchange="filterItems()">
                    <option value="">All</option>
                    <option value="Sri Lankan">Sri Lankan</option>
                    <option value="Chinese">Chinese</option>
                    <option value="Italian">Italian</option>
                </select>
            </div>

            <div class="mb-3">
            <label for="item_type_filter" class="form-label">Filter by Item Type</label>
            <select class="form-control" id="item_type_filter" name="item_type_filter" onchange="filterItemType()">
                <option value="">All</option>
                <option value="Food">Food</option>
                <option value="Drink">Drink</option>
                <option value="Special">Our Special</option>
            </select>
            </div>
            
            <div class="row" id="items_container">
                <?php
                $sql = "SELECT * FROM items";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-4 mb-3 item-card" data-cuisine="' . $row["cuisine_type"] . '" data-item-type="' . $row["item_type"] . '">';
                        echo '<div class="card h-100 shadow-lg">';
                        echo '<img src="' . $row["image"] . '" class="card-img-top" alt="' . $row["name"] . '">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $row["name"] . '</h5>';
                        echo '<p class="card-text">$' . $row["price"] . '</p>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
            </div>
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
    function filterItems() {
        var filter = document.getElementById("cuisine_filter").value.toLowerCase();
        var items = document.getElementsByClassName("item-card");

        for (var i = 0; i < items.length; i++) {
            if (filter == "" || items[i].getAttribute("data-cuisine").toLowerCase() == filter) {
                items[i].style.display = "block";
            } else {
                items[i].style.display = "none";
            }
        }
    }

    function filterItemType() {
        var filter = document.getElementById("item_type_filter").value.toLowerCase();
        var items = document.getElementsByClassName("item-card");

        for (var i = 0; i < items.length; i++) {
            if (filter == "" || items[i].getAttribute("data-item-type").toLowerCase() == filter) {
                items[i].style.display = "block";
            } else {
                items[i].style.display = "none";
            }
        }
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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
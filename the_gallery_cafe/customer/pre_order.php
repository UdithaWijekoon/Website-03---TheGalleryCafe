<!-- login session starting -->
<?php 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: ../index.php");
    exit();
}
?>

<?php
include('../config.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre Order</title>
    <link rel="stylesheet" href="css/pre_order.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<!-- styles for pre order -->
<style>
body {
    background-image: url(../images/background/1.jpg);
    background-size: cover;
}

.container {
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
}

.card {
    border: none;
    color: #000;
    border-radius: 10px;
    overflow: hidden;
    background-color: #ffbd42;
    background-size: cover;
}

.card-header {
    background-color: #343a40;
    color: #fff;
    text-align: center;
    padding: 20px;
    border-bottom: none;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

h2 {
    font-size: 60px;
    font-family: 'Dancing Script', sans-serif;
    text-align: center;
}

.card-body {
    background-color: #ffffff;
    padding: 30px;
}

.form-label {
    font-weight: bold;
    font-size: 1.1rem;
}

.form-control {
    border-radius: 5px;
    border: 1px solid #ced4da;
    padding: 10px;
    font-size: 1rem;
}

.row {
    margin-top: 20px;
}

.item-card {
    margin-bottom: 20px;
}

.item-card .card {
    border: none;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.item-card .card-img-top {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    max-height: 160px;
    object-fit: cover;
}

.item-card .card-body {
    padding: 20px;
    text-align: center;
}

.item-card .card-title {
    font-size: 1.2rem;
    font-weight: bold;
}

.item-card .card-text {
    font-size: 1rem;
    margin-bottom: 15px;
}

.item-card .btn-primary {
    background-color: #922828;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 1rem;
}

.item-card .btn-primary:hover {
    background-color: #420000;
}
</style>

<body>
    <!-- header -->
    <!-- header from partials -->
    <?php include('partials/header_c.php'); ?>  

<!-- pre order content -->
<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4">Pre-Order Items</h2>
        <div class="mb-3">
            <label for="search" class="form-label">Search</label>
            <input type="text" class="form-control" id="search" placeholder="Search for items...">
        </div>

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
            <select class="form-control" id="item_type_filter" name="item_type_filter" onchange="filterItems()">
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
                    echo '<div class="col-md-4 mb-3 item-card" data-name="' . $row["name"] . '" data-cuisine="' . $row["cuisine_type"] . '" data-item-type="' . $row["item_type"] . '">';
                    echo '<div class="card h-100 shadow-lg">';
                    echo '<img src="' . $row["image"] . '" class="card-img-top" alt="' . $row["name"] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $row["name"] . '</h5>';
                    echo '<p class="card-text">Available Quantity: ' . $row["quantity"] . '</p>';
                    echo '<p class="card-text">$' . $row["price"] . '</p>';
                    echo '<form action="confirm_order.php" method="POST">';
                    echo '<input type="hidden" name="item_id" value="' . $row["id"] . '">';
                    echo '<input type="hidden" name="item_name" value="' . $row["name"] . '">';
                    echo '<button type="submit" class="btn btn-primary">Pre-order</button>';
                    echo '</form>';
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
        <div class="alert alert-warning mt-4" id="noResultsAlert" style="display:none;">No matching items found.</div>
    </div>
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
// Filtering function
function filterItems() {
    var searchInput = document.getElementById('search').value.toLowerCase();
    var cuisineFilter = document.getElementById('cuisine_filter').value.toLowerCase();
    var itemTypeFilter = document.getElementById('item_type_filter').value.toLowerCase();

    var items = document.querySelectorAll('.item-card');
    var noResults = true;

    items.forEach(function(item) {
        var itemName = item.getAttribute('data-name').toLowerCase();
        var itemCuisine = item.getAttribute('data-cuisine').toLowerCase();
        var itemType = item.getAttribute('data-item-type').toLowerCase();

        var matchesSearch = itemName.includes(searchInput);
        var matchesCuisine = (cuisineFilter === "" || itemCuisine === cuisineFilter);
        var matchesType = (itemTypeFilter === "" || itemType === itemTypeFilter);

        if (matchesSearch && matchesCuisine && matchesType) {
            item.style.display = "block";
            noResults = false;
        } else {
            item.style.display = "none";
        }
    });

    document.getElementById('noResultsAlert').style.display = noResults ? 'block' : 'none';
}

// Add event listener for the search input
document.getElementById('search').addEventListener('input', filterItems);
</script>

</body>
</html>

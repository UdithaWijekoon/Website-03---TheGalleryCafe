<!-- header from partials -->
<?php include('partials/header_a.php'); ?>  

<!-- including database -->
<?php include('../config.php'); ?>

<style>
body {
    background-image: linear-gradient(to bottom, #ff2e2e, #ff5a52, #ff7b74, #ff9995, #ffb6b4, #ffc5c9, #ffd5db, #fee5eb, #fcecf4, #fbf3fa, #fcf9fd, #ffffff);
    background-size: cover;
    margin: 0;
    padding: 0;
}

/* Card styling */
.card {
    border: none;
    color: #000;
    border-radius: 10px;
    overflow: hidden;
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
}

/* Card Body */
.card-body {
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
}

.form-control {
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 20px;
}

/* Layout */
.row {
    display: flex;
    flex-wrap: wrap;
}

.col-md-4 {
    width: 33.3333%;
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

h2 {
    font-size: 2rem;
    font-family: 'Dancing Script', sans-serif;
    text-align: center;
}

.form-label, .form-control {
    margin-bottom: 15px;
}

.card-title {
    color: #000;
}

.card-body {
    text-align: center;
}

.card-text {
    font-size: 1.1rem;
    color: #590606;
}
</style>

<!-- view item container -->
<div class="container mt-5">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4"><i class="fas fa-utensils"></i> Menu Items</h2>
        <div class="mb-3">
            <label for="cuisine_filter" class="form-label"><i class="fas fa-filter"></i> Filter by Cuisine Type</label>
            <select class="form-control" id="cuisine_filter" name="cuisine_filter" onchange="filterItems()">
                <option value="">All</option>
                <option value="Sri Lankan">Sri Lankan</option>
                <option value="Chinese">Chinese</option>
                <option value="Italian">Italian</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="item_type_filter" class="form-label"><i class="fas fa-filter"></i> Filter by Item Type</label>
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
                    echo '<p class="card-text">Price: $' . $row["price"] . '</p>';
                    echo '<p class="card-text">Available Quantity: ' . $row["quantity"] . '</p>';
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
<!-- Footer from partials -->
<?php include('partials/footer_a.php'); ?>  
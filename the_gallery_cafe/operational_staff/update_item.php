<!-- header from partials -->
<?php include('partials/header_s.php'); ?> 

<!-- including database -->
<?php include('../config.php'); ?>


<style>
    /* styles for update item */
body {
    background-image: linear-gradient(to bottom, #0091ff, #00abff, #25c2ff, #67d7fa, #9be9f7, #b5f0f8, #cef7fb, #e5feff, #edfeff, #f5fdff, #fcfeff, #ffffff);
    background-size: cover;
    margin: 0;
    padding: 0;
}
        
.card {
    border: none;
    color: #000;
    border-radius: 10px;
    overflow: hidden;
    background-size: cover;

}

.card-header {
    color: #fff;
    text-align: center;
    padding: 20px;
    border-bottom: none;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.card-body {
    background-color: #ffffff;
    padding: 30px;
}

.form-label {
    font-weight: bold;
    font-size: 1.1rem;
}


.row {
    margin-top: 20px;
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
    max-height: 200px;
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
    color: #590606;
}

.item-card .btn-primary {
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    font-size: 1rem;
}

.item-card .btn-primary:hover {
    background-color: #0056b3;
}
</style>

    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4"><i class="fas fa-utensils"></i> Update Items</h2>

            <!-- This Shaws the update status -->
            <?php
            if (isset($_GET['status']) && $_GET['status'] == 'updated') {
                echo '<div class="alert alert-success" role="alert">Item updated successfully!</div>';
            }
            ?>
             <!-- update item container -->
            <div class="row" id="items_container">
                <?php
                $sql = "SELECT * FROM items";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<div class="col-md-4 mb-3 item-card" data-cuisine="' . $row["cuisine_type"] . '">';
                        echo '<div class="card h-100 shadow-lg">';
                        echo '<img src="' . $row["image"] . '" class="card-img-top" alt="' . $row["name"] . '">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $row["name"] . '</h5>';
                        echo '<p class="card-text">$' . $row["price"] . '</p>';
                        echo '<p class="card-text">Available Quantity: ' . $row["quantity"] . '</p>';
                        echo '<a href="update_item_handler.php?id=' . $row["id"] . '" class="btn btn-primary">Update</a>';
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

<!-- Footer from partials -->
<?php include('partials/footer_s.php'); ?>  
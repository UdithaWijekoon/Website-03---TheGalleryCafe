<!-- header from partials -->
<?php include('partials/header_a.php'); ?> 

<!-- including database -->
<?php include('../config.php'); ?>


<style>
    /* styles for update item */
body {
    background-image: linear-gradient(to bottom, #ff2e2e, #ff5a52, #ff7b74, #ff9995, #ffb6b4, #ffc5c9, #ffd5db, #fee5eb, #fcecf4, #fbf3fa, #fcf9fd, #ffffff);            /* background-image: linear-gradient(to bottom, #ff4a4a, #ff6663, #ff7f7c, #ff9794, #ffadac, #ffbbc0, #fec9d2, #fcd7e1, #fae2ee, #f9ecf7, #faf6fc, #ffffff); */
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
<?php include('partials/footer_a.php'); ?>  
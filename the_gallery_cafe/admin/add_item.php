<!-- header from partials -->
<?php include('partials/header_a.php'); ?>  

<!-- including database -->
<?php include('../config.php'); ?>


<style>
/* styles for add items */
    body {
        background-image: linear-gradient(to bottom, #ff2e2e, #ff5a52, #ff7b74, #ff9995, #ffb6b4, #ffc5c9, #ffd5db, #fee5eb, #fcecf4, #fbf3fa, #fcf9fd, #ffffff);            /* background-image: linear-gradient(to bottom, #ff4a4a, #ff6663, #ff7f7c, #ff9794, #ffadac, #ffbbc0, #fec9d2, #fcd7e1, #fae2ee, #f9ecf7, #faf6fc, #ffffff); */
        background-size: cover;
        margin: 0;
        padding: 0;
        }
    .container {
        margin-bottom:50px;
    }
    form{
        margin-top:20px;
        margin-bottom:20px;
    }
    .card h2{
        margin-top:0px;
    }
    .btn-primary{
        background-color: #790808;
        border: 1px solid #a00b0b;
        color: #fff;
    }
    .btn-primary:hover{
        background-color: #a00b0b;
        border: 1px solid #a00b0b;
        color: #fff;
    }
</style>
<!-- add item container -->
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4"><i class="fas fa-utensils"></i> Add New Item</h2>
            
            <form action="add_item.php" method="post" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col">
                        <label for="name" class="form-label">Item Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="col">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="number" class="form-control" id="quantity" name="quantity" required>
                    </div>
                    <div class="col">
                    <label for="item_type" class="form-label">Item Type</label>
                    <select class="form-control" id="item_type" name="item_type" required>
                        <option value="Food">Food</option>
                        <option value="Drink">Drink</option>
                        <option value="Special">Our Special</option>
                    </select>
                </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="cuisine_type" class="form-label">Cuisine Type</label>
                        <select class="form-control" id="cuisine_type" name="cuisine_type" required>
                            <option value="Sri Lankan">Sri Lankan</option>
                            <option value="Chinese">Chinese</option>
                            <option value="Italian">Italian</option>
                        </select>
                    </div>
                    <div class="col">
                        <label for="image" class="form-label">Item Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary w-100"><i class="fa fa-plus"></i> Add Item</button>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $item_type = $_POST['item_type'];
        $cuisine_type = $_POST['cuisine_type'];
        $image = $_FILES['image']['name'];
        $target_dir = "../images/foods/";
        $target_file = $target_dir . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $sql = "INSERT INTO items (name, image, price, quantity, item_type, cuisine_type) VALUES ('$name', '$target_file', '$price', '$quantity', '$item_type', '$cuisine_type')";
            if ($conn->query($sql) === TRUE) {
                echo "<div class='alert alert-success mt-3'>New item added successfully</div>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Error: " . $sql . "<br>" . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger mt-3'>Sorry, there was an error uploading your file.</div>";
        }
    }
    $conn->close();
    ?>

            </form>
        </div>
    </div>

<!-- Footer from partials -->
<?php include('partials/footer_a.php'); ?>  

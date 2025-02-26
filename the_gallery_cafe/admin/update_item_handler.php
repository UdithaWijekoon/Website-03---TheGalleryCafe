<!-- update items functions -->
<?php
include('../config.php');?>

<!-- update items functions -->
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM items WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Item not found.";
        exit;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $cuisine_type = $_POST['cuisine_type'];
    $image = $_POST['image'];
    $quantity = $_POST['quantity'];  // Adding quantity

    $sql = "UPDATE items SET name='$name', price='$price', cuisine_type='$cuisine_type', image='$image', quantity='$quantity' WHERE id=$id";  // Updating quantity

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: update_item.php?status=updated");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!-- update item container -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <style>
        /* Styles for the header */
        body {
            animation: fadeIn 0.7s ease-in-out;
            background-image: linear-gradient(to bottom, #ff2e2e, #ff5a52, #ff7b74, #ff9995, #ffb6b4, #ffc5c9, #ffd5db, #fee5eb, #fcecf4, #fbf3fa, #fcf9fd, #ffffff);            /* background-image: linear-gradient(to bottom, #ff4a4a, #ff6663, #ff7f7c, #ff9794, #ffadac, #ffbbc0, #fec9d2, #fcd7e1, #fae2ee, #f9ecf7, #faf6fc, #ffffff); */
            background-size: cover;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        } 
        .container{
            margin-bottom: 50px;
        }

        .navbar {
            display: flex;
            background-color: #343a40;
            border-bottom: 3px solid #A20D0D;
            animation: slideInTop 1s ease-in-out;
        }

        /* slide in top animation for header */
        @keyframes slideInTop {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0%);
                opacity: 1;
            }
        }

        .navbar-brand {
            margin-left: auto;
            font-weight: bold;
            color: #FF4E4E;
        }

        .navbar-brand:hover {
            color: #FF9F9F;
        }

        .btn {
            margin-left: auto;
            margin-right: 20px;
        }

        .nav-link {
            color: #FFC0C0;
            margin-right: 10px;
            transition: color 0.3s;
        }

        .nav-link:hover {
            color: #fff;
        }

        .navbar-toggler {
            border-color: #FF4E4E;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 193, 7, 0.5%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .nav-item {
            margin-right: 10px;
        }

        .btn-logout {
            background-color: #dc3545;
            border: none;
            transition: background-color 0.3s;
            padding: 5px 20px 5px 20px;
        }

        .btn-logout:hover {
            background-color: #c82333;
        }

        .collapse.navbar-collapse {
            justify-content: space-between;
        }
        .back{
            text-decoration: none;
            color: #790808;
        }
        .back:hover{
            text-decoration: underline;
            color: #a00b0b;
        }
    </style>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="admin_dashboard.php">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage Users <i class="fa fa-users-cog"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="register.php">Create Users <i class="fa fa-user-plus"></i></a></li>
                            <li><a class="dropdown-item" href="manage_users.php">Manage Users <i class="fa fa-users-cog"></i></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="itemDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage Items <i class="fa fa-box"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="itemDropdown">
                            <li><a class="dropdown-item" href="view_item.php">View Items <i class="fa fa-eye"></i></a></li>
                            <li><a class="dropdown-item" href="add_item.php">Add Items <i class="fa fa-plus"></i></a></li>
                            <li><a class="dropdown-item" href="delete_item.php">Delete Items <i class="fa fa-trash"></i></a></li>
                            <li><a class="dropdown-item" href="update_item.php">Update Items <i class="fa fa-edit"></i></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="manageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage Hotel <i class="fa fa-tasks"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="manageDropdown">
                            <li><a class="dropdown-item" href="admin_parking.php">Manage Parking <i class="fa fa-car"></i></a></li>
                            <li><a class="dropdown-item" href="manage_tables.php">Manage Tables <i class="fas fa-chair"></i></a></li>
                            <li><a class="dropdown-item" href="admin_promotions.php">Manage Special Events <i class="fas fa-cocktail"></i></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="hotelOpsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Customers <i class="fa fa-user-secret"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="hotelOpsDropdown">
                            <li><a class="dropdown-item" href="pre_order_check.php">PreOrders <i class="fas fa-clipboard-list"></i></a></li>
                            <li><a class="dropdown-item" href="get_reservation.php">Reservations <i class="fa fa-calendar-alt"></i></a></li>
                            <li><a class="dropdown-item" href="messages.php">Messages <i class="fa fa-envelope"></i></a></li>
                            <li><a class="dropdown-item" href="manage_reviews.php">Reviews <i class="fas fa-comments"></i></a></li>
                        </ul>
                    </li>
                </ul>
                <a href="logout.php" class="btn btn-logout">Logout <i class="fa fa-sign-out-alt"></i></a>
            </div>
        </div>
    </nav>
</header>
    <div class="container mt-5">
        <div class="card shadow-sm p-4">
            <h2 class="mb-4">Update Item</h2>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['name']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="text" class="form-control" id="price" name="price" value="<?php echo $row['price']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="cuisine_type" class="form-label">Cuisine Type</label>
                    <input type="text" class="form-control" id="cuisine_type" name="cuisine_type" value="<?php echo $row['cuisine_type']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image URL</label>
                    <input type="text" class="form-control" id="image" name="image" value="<?php echo $row['image']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="<?php echo $row['quantity']; ?>" required>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
                <a class="back" href="update_item.php">Back to Update Items</a>
            </form>
        </div>
    </div>

    </script>

    <script>
        <?php if (isset($_GET['message'])): ?>
            var message = "<?php echo $_GET['message']; ?>";
            var messageModal = new bootstrap.Modal(document.getElementById('messageModal'), {});
            document.getElementById('messageContent').innerText = message;
            messageModal.show();
        <?php endif; ?>
    </script>
<!-- Footer from partials -->
<?php include('partials/footer_a.php'); ?>  

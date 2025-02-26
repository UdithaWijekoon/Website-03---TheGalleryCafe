<?php include('../config.php'); ?>

<!-- login session starting -->
<?php 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: ../index.php");
    exit();
}
?>

<?php
// Get user details
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT id, username, email, role_id FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
}

// Update user details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role_id = $_POST['role_id'];

    $query = "UPDATE users SET username = ?, email = ?, role_id = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ssii', $username, $email, $role_id, $id);
    if ($stmt->execute()) {
        header('Location: manage_users.php?message=User updated successfully');
        exit();
    } else {
        $error = "Failed to update user";
    }
}
?>

<!-- edit users -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <style>
        /* Styles for the header */
        body{
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
            margin-top: 50px;
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
<div class="container">
    <h1>Edit User</h1>
    <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?php echo $error; ?></div>
    <?php endif; ?>
    <form action="edit_user.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $user['username']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $user['email']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="role_id" class="form-label">Role</label>
            <select class="form-control" id="role_id" name="role_id" required>
                <option value="1" <?php echo $user['role_id'] == 1 ? 'selected' : ''; ?>>Admin</option>
                <option value="2" <?php echo $user['role_id'] == 2 ? 'selected' : ''; ?>>Customer</option>
                <option value="3" <?php echo $user['role_id'] == 3 ? 'selected' : ''; ?>>Operational Staff</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a class="back" href="manage_users.php">Back to Manage Users</a>
    </form>
</div>

<!-- Footer from partials -->
<?php include('partials/footer_a.php'); ?>  

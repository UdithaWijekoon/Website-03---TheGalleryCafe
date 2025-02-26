<!-- login session starting -->
<?php 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 3) {
    header("Location: ../index.php");
    exit();
}
?>

<!-- including database -->
<?php include('../config.php'); ?>

<!-- This includes on every page on Staff dashboard -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Staff Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <style>
        /* styles */
        body{
            animation: fadeIn 0.7s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        } 
        .navbar {
            display: flex;
            background-color: #343a40;
            border-bottom: 4px solid #0F73C2;
            padding: 20px 0px 20px 0px;
            animation: slideInTop 1s ease-in-out;
        }
        /* animation for nav bar */
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
            font-size:25px;
            color: #1C9DFF;
        }
        .navbar-brand:hover {
            color: #6DC0FF;
        }
        .btn {
            margin-left: auto;
            margin-right: 20px;
        }
        .nav-link {
            color: #9FD6FF;
            margin-right: 10px;
            font-size:18px;
            transition: color 0.3s;
        }
        .nav-item {
            margin-right: 10px;
        }
        .nav-link:hover {
            color: #fff;
        }
        .navbar-toggler {
            border-color: #1C9DFF;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 193, 7, 0.5%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
        .btn-logout {
            background-color: #0091FF;
            border-color: #0091FF;
            padding: 10px 20px 10px 20px;
        }
        .btn-logout:hover {
            background-color: #006DC0;
            border-color: #006DC0;
        }
        .collapse.navbar-collapse {
            justify-content: space-between;
        }
    </style>
</head>
<body> 
    <!-- Header with nav bar -->
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="operational_staff_dashboard.php">Operational Staff</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="itemDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage Items <i class="fa fa-box"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="itemDropdown">
                            <li><a class="dropdown-item" href="view_item.php">View Items <i class="fa fa-eye"></i></a></li>
                            <li><a class="dropdown-item" href="update_item.php">Update Items <i class="fa fa-edit"></i></a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="manageDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage Hotel <i class="fa fa-tasks"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="manageDropdown">
                            <li><a class="dropdown-item" href="staff_parking.php">Manage Parking <i class="fa fa-car"></i></a></li>
                            <li><a class="dropdown-item" href="manage_tables.php">Manage Tables <i class="fas fa-chair"></i></a></li>
                            <li><a class="dropdown-item" href="staff_promotions.php">Manage Special Events <i class="fas fa-cocktail"></i></a></li>
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
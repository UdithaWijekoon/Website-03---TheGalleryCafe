<!-- header from partials -->
<?php include('partials/header_a.php'); ?>  

<!-- including database -->
<?php include('../config.php'); ?>


<!-- content of admin_dashboard -->
    <div class="container mt-5">
        <h1>Welcome to Admin Dashboard, <?php echo $_SESSION['username']; ?>!</h1>
    </div>

<?php

// Total users
$sql_users = "SELECT COUNT(*) AS total_users FROM users";
$result_users = $conn->query($sql_users);
$row_users = $result_users->fetch_assoc();
$total_users = $row_users['total_users'];

// Categorized users
$sql_users_admin = "SELECT COUNT(*) AS total_admins FROM users WHERE role_id = 1";
$result_users_admin = $conn->query($sql_users_admin);
$row_users_admin = $result_users_admin->fetch_assoc();
$total_admins = $row_users_admin['total_admins'];

$sql_users_staff = "SELECT COUNT(*) AS total_staff FROM users WHERE role_id = 3";
$result_users_staff = $conn->query($sql_users_staff);
$row_users_staff = $result_users_staff->fetch_assoc();
$total_staff = $row_users_staff['total_staff'];

$sql_users_customers = "SELECT COUNT(*) AS total_customers FROM users WHERE role_id = 2";
$result_users_customers = $conn->query($sql_users_customers);
$row_users_customers = $result_users_customers->fetch_assoc();
$total_customers = $row_users_customers['total_customers'];

// Total food items
$sql_items = "SELECT COUNT(*) AS total_items FROM items";
$result_items = $conn->query($sql_items);
$row_items = $result_items->fetch_assoc();
$total_items = $row_items['total_items'];

// Categorized food items
$sql_items_sri_lankan = "SELECT COUNT(*) AS total_sri_lankan FROM items WHERE cuisine_type = 'Sri Lankan'";
$result_items_sri_lankan = $conn->query($sql_items_sri_lankan);
$row_items_sri_lankan = $result_items_sri_lankan->fetch_assoc();
$total_sri_lankan = $row_items_sri_lankan['total_sri_lankan'];

$sql_items_chinese = "SELECT COUNT(*) AS total_chinese FROM items WHERE cuisine_type = 'Chinese'";
$result_items_chinese = $conn->query($sql_items_chinese);
$row_items_chinese = $result_items_chinese->fetch_assoc();
$total_chinese = $row_items_chinese['total_chinese'];

$sql_items_italian = "SELECT COUNT(*) AS total_italian FROM items WHERE cuisine_type = 'Italian'";
$result_items_italian = $conn->query($sql_items_italian);
$row_items_italian = $result_items_italian->fetch_assoc();
$total_italian = $row_items_italian['total_italian'];

$sql_items_food = "SELECT COUNT(*) AS total_food FROM items WHERE item_type = 'Food'";
$result_items_food = $conn->query($sql_items_food);
$row_items_food = $result_items_food->fetch_assoc();
$total_food = $row_items_food['total_food'];

$sql_items_drink = "SELECT COUNT(*) AS total_drink FROM items WHERE item_type = 'Drink'";
$result_items_drink = $conn->query($sql_items_drink);
$row_items_drink = $result_items_drink->fetch_assoc();
$total_drink = $row_items_drink['total_drink'];

$sql_items_special = "SELECT COUNT(*) AS total_special FROM items WHERE item_type = 'Special'";
$result_items_special = $conn->query($sql_items_special);
$row_items_special = $result_items_special->fetch_assoc();
$total_special = $row_items_special['total_special'];

// Total pre-orders
$sql_preorders = "SELECT COUNT(*) AS total_preorders FROM pre_orders";
$result_preorders = $conn->query($sql_preorders);
$row_preorders = $result_preorders->fetch_assoc();
$total_preorders = $row_preorders['total_preorders'];

// Total pre-orders to confirm
$sql_preorders_to_confirm = "SELECT COUNT(*) AS total_preorders_to_confirm FROM pre_orders WHERE status = 'pending'";
$result_preorders_to_confirm = $conn->query($sql_preorders_to_confirm);
$row_preorders_to_confirm = $result_preorders_to_confirm->fetch_assoc();
$total_preorders_to_confirm = $row_preorders_to_confirm['total_preorders_to_confirm'];

// Total confirmed pre-orders
$sql_confirmed_preorders = "SELECT COUNT(*) AS total_confirmed_preorders FROM pre_orders WHERE status = 'confirmed'";
$result_confirmed_preorders = $conn->query($sql_confirmed_preorders);
$row_confirmed_preorders = $result_confirmed_preorders->fetch_assoc();
$total_confirmed_preorders = $row_confirmed_preorders['total_confirmed_preorders'];

// Total reservations
$sql_reservations = "SELECT COUNT(*) AS total_reservations FROM reservations";
$result_reservations = $conn->query($sql_reservations);
$row_reservations = $result_reservations->fetch_assoc();
$total_reservations = $row_reservations['total_reservations'];

// Total messages
$sql_messages = "SELECT COUNT(*) AS total_messages FROM contact_messages";
$result_messages = $conn->query($sql_messages);
$row_messages = $result_messages->fetch_assoc();
$total_messages = $row_messages['total_messages'];

// Total reviews
$sql_reviews = "SELECT COUNT(*) AS total_reviews FROM reviews";
$result_reviews = $conn->query($sql_reviews);
$row_reviews = $result_reviews->fetch_assoc();
$total_reviews = $row_reviews['total_reviews'];

$conn->close();
?>

<style>
    /* some styles for dashboard */
    body {
        font-family: 'Roboto', sans-serif;
        background-image: linear-gradient(to bottom, #ff2e2e, #ff5a52, #ff7b74, #ff9995, #ffb6b4, #ffc5c9, #ffd5db, #fee5eb, #fcecf4, #fbf3fa, #fcf9fd, #ffffff); 
        background-size: cover;
        margin: 0;
        padding: 0;
    }

    .container h1 {
        color: #333;
        font-weight: 700;
        text-align: center;
        margin-bottom: 40px;
    }

    .dashboard {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        padding: 20px;
        margin-bottom: 80px;
        animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    .card {
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        margin: 20px;
        padding: 20px;
        text-align: center;
        width: calc(33.33% - 40px);
        transition: transform 0.3s, box-shadow 0.3s;
        height: auto;
    }

    .card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2);
    }

    .card h3 {
        font-size: 1.3em;
        margin: 15px 0;
        color: #555;
    }

    .card p {
        font-size: 1.3em;
        margin: 10px 0;
        color: #333;
        font-weight: 600;
    }

    .icon {
        font-size: 3em;
        margin-bottom: 10px;
        color: #800000;
    }

    .users { background-color: #ffccd5; }
    .items { background-color: #c3f0ca; }
    .pre-orders { background-color: #ffecb3; }
    .reservations { background-color: #cfe8ff; }
    .messages { background-color: #e0bbff; }
    .reviews { background-color: #ffe6e6; }

    .subcategory {
        font-size: 0.9em;
        color: #777;
    }
</style>

    <div class="dashboard">
        <div class="card users">
            <i class="fas fa-users icon"></i>
            <h3>Total Users</h3>
            <p><?php echo $total_users; ?></p>
            <div class="subcategory">Admins: <?php echo $total_admins; ?></div>
            <div class="subcategory">Staff: <?php echo $total_staff; ?></div>
            <div class="subcategory">Customers: <?php echo $total_customers; ?></div>
        </div>
        <div class="card items">
            <i class="fas fa-utensils icon"></i>
            <h3>Total Food Items</h3>
            <p><?php echo $total_items; ?></p>
            <div class="subcategory">Sri Lankan: <?php echo $total_sri_lankan; ?></div>
            <div class="subcategory">Chinese: <?php echo $total_chinese; ?></div>
            <div class="subcategory">Italian: <?php echo $total_italian; ?></div>
            <div class="subcategory">Food: <?php echo $total_food; ?></div>
            <div class="subcategory">Drink: <?php echo $total_drink; ?></div>
            <div class="subcategory">Special Foods: <?php echo $total_special; ?></div>
        </div>
        <div class="card pre-orders">
            <i class="fas fa-clipboard-list icon"></i>
            <h3>Total Pre-orders</h3>
            <p><?php echo $total_preorders; ?></p>
            <div class="subcategory">To Confirm: <?php echo $total_preorders_to_confirm; ?></div>
            <div class="subcategory">Confirmed: <?php echo $total_confirmed_preorders; ?></div>
        </div>
        <div class="card reservations">
            <i class="fas fa-calendar-check icon"></i>
            <h3>Total Reservations</h3>
            <p><?php echo $total_reservations; ?></p>
        </div>
        <div class="card messages">
            <i class="fas fa-envelope icon"></i>
            <h3>Total Messages</h3>
            <p><?php echo $total_messages; ?></p>
        </div>
        <div class="card reviews">
            <i class="fas fa-comments icon"></i>
            <h3>Total Reviews</h3>
            <p><?php echo $total_reviews; ?></p>
        </div>
    </div>

<!-- Footer from partials -->
<?php include('partials/footer_a.php'); ?>  


<!-- header from partials -->
<?php include('partials/header_s.php'); ?>  

<?php
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

    <div class="container mt-5">
        <h1>Welcome to Operational Staff Dashboard, <?php echo $_SESSION['username']; ?>!</h1>
    </div>
    <!-- styles for dashboard -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: linear-gradient(to bottom, #0091ff, #00abff, #25c2ff, #67d7fa, #9be9f7, #b5f0f8, #cef7fb, #e5feff, #edfeff, #f5fdff, #fcfeff, #ffffff);
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        .dashboard {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 20px;
            margin-bottom: 80px;
            animation: slideInLeft 1s ease-in-out;
        }
    @keyframes slideInLeft {
    from {
        transform: translateX(-100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
    }
        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px;
            padding: 20px;
            text-align: center;
            width: 300px;
            flex: 1;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 30px rgba(0, 0, 0, 0.2);
        }
        .card h3 {
            font-size: 1.5em;
            margin: 10px 0;
        }
        .card p {
            font-size: 1.2em;
            margin: 5px 0;
        }
        .icon {
            font-size: 3em;
            margin-bottom: 10px;
            color: #007bff;
        }
        .users { background-color: #ffccd5; }
        .items { background-color: #c3f0ca; }
        .pre-orders { background-color: #ffecb3; }
        .reservations { background-color: #cfe8ff; }
        .messages { background-color: #e0bbff; }
        .reviews { background-color: #ffe6e6; }
        .subcategory {
            font-size: 0.9em;
            color: #555;
        }
    </style>

<div class="dashboard">
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

    <!-- Modal -->
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="messageModalLabel">Message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <span id="messageContent"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

<!-- Footer from partials -->
<?php include('partials/footer_s.php'); ?>  


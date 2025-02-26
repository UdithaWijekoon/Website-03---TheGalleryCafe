<?php 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: ../index.php");
    exit();
}

include('../config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Order</title>
    <link rel="stylesheet" href="css/order.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-image: url(../images/background/1.jpg);
            background-size: cover;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 600px;
            width: 100%;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #790808;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        input[type="text"], input[type="email"], input[type="tel"], input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        button {
            display: block;
            width: 100%;
            padding: 10px;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 10px;
        }
        button:hover {
            background-color: #ff2e2e;
        }
        .total-price {
            font-size: 20px;
            color: #000;
            text-align: center;
            margin-top: 20px;
            font-weight: bold;
        }
        .success-message, .error-message {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
        }
        .success-message {
            color: green;
        }
        .error-message {
            color: red;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
            color: #000;
            text-decoration: none;
        }
        .back-link:hover {
            color: #790808;
            text-decoration: underline;
        }
    </style>
</head>
<body>
<section id="confirm-order" class="container">
    <h1><i class="fas fa-check-circle"></i> Confirm Your Order</h1>
    <?php
    if (isset($_SESSION['order_success'])) {
        echo "<div class='success-message'><i class='fas fa-check'></i> {$_SESSION['order_success']}</div>";
        unset($_SESSION['order_success']);
    }
    if (isset($_SESSION['order_error'])) {
        echo "<div class='error-message'><i class='fas fa-times'></i> {$_SESSION['order_error']}</div>";
        unset($_SESSION['order_error']);
    }
    ?>
    <p>You have selected: <strong><?php echo isset($_POST['item_name']) ? htmlspecialchars($_POST['item_name']) : ''; ?></strong></p>

    <form id="orderForm" action="confirm_order_handler.php" method="POST" onsubmit="return validateForm()">
        <input type="hidden" id="item_id" name="item_id" value="<?php echo isset($_POST['item_id']) ? htmlspecialchars($_POST['item_id']) : ''; ?>">
        <input type="hidden" id="item_name" name="item_name" value="<?php echo isset($_POST['item_name']) ? htmlspecialchars($_POST['item_name']) : ''; ?>">
        <input type="hidden" id="item_price" name="item_price" value="<?php 
            if (isset($_POST['item_id'])) {
                $stmt = $conn->prepare("SELECT price FROM items WHERE id = ?");
                $stmt->bind_param("i", $_POST['item_id']);
                $stmt->execute();
                $stmt->bind_result($item_price);
                $stmt->fetch();
                echo $item_price;
                $stmt->close();
            }
        ?>">
        <div class="form-group">
            <label for="quantity"><i class="fas fa-sort-numeric-up"></i> Quantity (Available: 
                <?php 
                if (isset($_POST['item_id'])) {
                    $stmt = $conn->prepare("SELECT quantity FROM items WHERE id = ?");
                    $stmt->bind_param("i", $_POST['item_id']);
                    $stmt->execute();
                    $stmt->bind_result($available_quantity);
                    $stmt->fetch();
                    echo $available_quantity;
                    $stmt->close();
                }
                ?>
            ):</label>
            <input type="number" id="quantity" name="quantity" min="1" max="<?php echo isset($available_quantity) ? $available_quantity : ''; ?>" required oninput="updateTotalPrice()">
        </div>
        <div class="form-group">
            <label for="name"><i class="fas fa-user"></i> Your Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email"><i class="fas fa-envelope"></i> Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="phone"><i class="fas fa-phone"></i> Telephone Number:</label>
            <input type="tel" id="phone" name="phone" required>
        </div>
        <div class="total-price" id="totalPrice">Total Price :$ <?php echo isset($item_price) ? $item_price : 0; ?></div>
        <button type="submit"><i class="fas fa-check-circle"></i> Confirm Order</button>
    </form>
    <a href="pre_order.php" class="back-link"><i class="fas fa-arrow-left"></i> Back to Pre-order Page</a>
</section>

<script>
    function updateTotalPrice() {
        const quantity = document.getElementById('quantity').value;
        const price = document.getElementById('item_price').value;
        const totalPrice = quantity * price;
        document.getElementById('totalPrice').innerText = 'Total Price :$ ' + totalPrice.toFixed(2);
    }
</script>
</body>
</html>

<?php
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pre_order_id = $_POST['id'];

    // Fetch the pre-order details
    $stmt = $conn->prepare("SELECT item_id, quantity FROM pre_orders WHERE id = ?");
    $stmt->bind_param("i", $pre_order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $pre_order = $result->fetch_assoc();
    $stmt->close();

    if (!$pre_order) {
        echo "Error: Pre-order not found.";
        $conn->close();
        exit();
    }

    $item_id = $pre_order['item_id'];
    $pre_order_quantity = $pre_order['quantity'];

    // Update the item quantity in the items table
    $stmt = $conn->prepare("UPDATE items SET quantity = quantity - ? WHERE id = ?");
    $stmt->bind_param("ii", $pre_order_quantity, $item_id);
    if (!$stmt->execute()) {
        echo "Error: " . $stmt->error;
        $stmt->close();
        $conn->close();
        exit();
    }
    $stmt->close();

    // Update the pre_orders table to set the status to 'confirmed'
    $stmt = $conn->prepare("UPDATE pre_orders SET status = 'confirmed' WHERE id = ?");
    $stmt->bind_param("i", $pre_order_id);
    if ($stmt->execute()) {
        header("Location: pre_order_check.php?message=Pre-order confirmed successfully");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
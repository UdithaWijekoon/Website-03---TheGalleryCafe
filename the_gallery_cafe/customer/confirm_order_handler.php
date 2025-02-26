<?php
session_start();
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $quantity = $_POST['quantity'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("INSERT INTO pre_orders (item_id, item_name, quantity, name, email, phone) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isisss", $item_id, $item_name, $quantity, $name, $email, $phone);

    if ($stmt->execute()) {
        $_SESSION['order_success'] = "Pre-order added successfully. Wait for our Staff's Confirmation";
    } else {
        $_SESSION['order_error'] = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    header("Location: confirm_order.php");
    exit();
} else {
    $_SESSION['order_error'] = "Invalid request.";
    header("Location: confirm_order.php");
    exit();
}

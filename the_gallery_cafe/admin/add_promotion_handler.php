<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: ../index.php");
    exit();
}

include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $details = $_POST['details'];
    $date_time = $_POST['date_time'];
    $ticket_price = isset($_POST['ticket_price']) ? $_POST['ticket_price'] : NULL;

    $stmt = $conn->prepare("INSERT INTO promotions (title, description, details, date_time, ticket_price) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssd", $title, $description, $details, $date_time, $ticket_price);

    if ($stmt->execute()) {
        header("Location: admin_promotions.php?message=Promotion added successfully");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

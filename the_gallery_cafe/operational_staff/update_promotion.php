<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 3) { 
    header("Location: ../index.php");
    exit();
}

include('../config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $details = $_POST['details'];
    $date_time = $_POST['date_time'];
    $ticket_price = $_POST['ticket_price'];

    // Update the promotion in the database
    $stmt = $conn->prepare("UPDATE promotions SET title = ?, description = ?, details = ?, date_time = ?, ticket_price = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $title, $description, $details, $date_time, $ticket_price, $id);

    if ($stmt->execute()) {
        // Redirect with a success message
        header("Location: staff_promotions.php?id=$id&message=Promotion updated successfully");
    } else {
        // Redirect with an error message
        header("Location: staff_promotions.php?id=$id&message=Error updating promotion&error=1");
    }

    $stmt->close();
    $conn->close();
} else {
    // If the request method is not POST, redirect back to the edit page
    header("Location: staff_promotions.php?id=" . $_POST['id']);
    exit();
}

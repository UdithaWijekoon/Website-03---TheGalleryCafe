<?php
session_start();
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, phone, subject, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $phone, $subject, $message);

    if ($stmt->execute()) {
        $_SESSION['contact_success'] = "Message sent successfully!";
    } else {
        $_SESSION['contact_error'] = "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
    
    header("Location: contact_us.php");
    exit();
}
?>

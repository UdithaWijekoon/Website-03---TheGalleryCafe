<?php
include('../config.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];
    $role_id = 2; 

    $stmt = $conn->prepare("INSERT INTO users (username, password, email, role_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sssi", $username, $password, $email, $role_id);

    if ($stmt->execute()) {
        // Registration successful
        $message = "Registration successful! You can now login.";
        header("Location: signup.php?message=" . urlencode($message));
        exit();
    } else {
        // Registration failed
        $error_message = "Registration failed. Please try again later.";
        header("Location: signup.php?error=" . urlencode($error_message));
        exit();
    }
    $stmt->close();
    $conn->close();
} else {
    header("Location: signup.php");
    exit();
}
?>


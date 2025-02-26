<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: ../index.php");
    exit();
}
?>

<?php
require '../config.php'; 

// user registration handler
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role_id = $_POST['role'];

    $sql = "INSERT INTO users (username, email, password, role_id) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $username, $email, $password, $role_id);

    if ($stmt->execute()) {
        $message = "User Registration successful!";
    } else {
        $message = "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
    header("Location: register.php?message=" . urlencode($message));
    exit();
}
?>

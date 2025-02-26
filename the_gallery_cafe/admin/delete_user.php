<?php
// Include your database connection
include('../config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    if ($stmt->execute()) {
        header('Location: manage_users.php?message=User deleted successfully');
        exit();
    } else {
        header('Location: manage_users.php?error=Failed to delete user');
        exit();
    }
}
?>

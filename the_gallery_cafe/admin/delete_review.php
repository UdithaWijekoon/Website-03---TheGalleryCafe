<?php 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: ../index.php");
    exit();
}
?>

<?php
include('../config.php');

// Handle delete review
if (isset($_GET['delete']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM reviews WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['review_success'] = "Review deleted successfully.";
    } else {
        $_SESSION['review_error'] = "Error deleting review: " . $stmt->error;
    }

    $stmt->close();
    header("Location: manage_reviews.php");
    exit();
}
?>
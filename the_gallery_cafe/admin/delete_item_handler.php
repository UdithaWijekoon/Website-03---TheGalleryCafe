<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 1) {
    header("Location: ../index.php");
    exit();
}
?>

<?php
include('../config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM items WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success mt-3'>Item deleted successfully...</div>";
        header("Location: delete_item.php?status=deleted");
    } else {
        echo "<div class='alert alert-danger mt-3'>Error deleting item: " . $conn->error . "</div>";
    }
    $conn->close();
}
?>



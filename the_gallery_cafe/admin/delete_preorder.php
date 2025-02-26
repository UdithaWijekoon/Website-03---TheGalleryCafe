<?php
// Include the database configuration file
include('../config.php');

// Check if the ID is set
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // Prepare the DELETE query
    $sql = "DELETE FROM pre_orders WHERE id = ?";

    // Initialize the prepared statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the ID parameter
        $stmt->bind_param("i", $id);

        // Execute the prepared statement
        if ($stmt->execute()) {
            // Success, redirect with a success message
            header("Location: pre_order_check.php?message=Pre-order deleted successfully");
        } else {
            // Error, redirect with an error message
            header("Location: pre_order_check.php?message=Error deleting pre-order");
        }

        // Close the statement
        $stmt->close();
    } else {
        // Error preparing the statement
        header("Location: pre_order_check.php?message=Error preparing the delete statement");
    }
} else {
    // ID not set, redirect with an error message
    header("Location: pre_order_check.php?message=Invalid pre-order ID");
}

// Close the database connection
$conn->close();
?>

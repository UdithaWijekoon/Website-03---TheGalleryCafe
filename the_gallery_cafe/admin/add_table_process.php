<?php
session_start();
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category = $_POST['category'];
    $count = $_POST['count'];

    // Prepare the SQL statement for insertion
    $stmt = $conn->prepare("INSERT INTO tables (category, capacity, available, reserved) VALUES (?, ?, TRUE, FALSE)");

    // Bind parameters and execute the statement for each table to be added
    $stmt->bind_param("si", $category, $capacity);

    // Set capacity based on category selected
    switch ($category) {
        case '2 person':
            $capacity = 2;
            break;
        case '4 person':
            $capacity = 4;
            break;
        case '6 person':
            $capacity = 6;
            break;
        case '8 person':
            $capacity = 8;
            break;
        default:
            $capacity = 2; // Default to 2 person if category is not recognized
            break;
    }

    // Insert the specified number of tables
    for ($i = 0; $i < $count; $i++) {
        $stmt->execute();
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();

    // Redirect back to manage tables page with success message
    $_SESSION['success_message'] = "Added $count tables of $category successfully.";
    header("Location: manage_tables.php");
    exit();
}
?>

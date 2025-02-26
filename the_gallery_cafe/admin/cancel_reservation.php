<?php
include('../config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "UPDATE reservations SET status='canceled' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: get_reservation.php?message=Reservation canceled successfully");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>

<?php
include('../config.php');

if (isset($_GET['category'])) {
    $category = $_GET['category'];
    $query = "SELECT id, capacity, available, reserved FROM tables WHERE category = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $category);
    $stmt->execute();
    $result = $stmt->get_result();

    echo '<table class="table table-striped">';
    echo '<thead><tr><th>Table</th><th>Capacity</th><th>Availability</th><th>Reservation</th></tr></thead>';
    echo '<tbody>';
    while ($row = $result->fetch_assoc()) {
        $available_class = $row['available'] ? 'table-available' : 'table-not-available';
        $reserved_class = $row['reserved'] ? 'table-reserved' : 'table-not-reserved';
        echo '<tr>';
        echo '<td><i class="fas fa-chair ' . $available_class . '"></i> ' . htmlspecialchars($row['id']) . '</td>';
        echo '<td>' . htmlspecialchars($row['capacity']) . '</td>';
        echo '<td><span class="' . $available_class . '">' . ($row['available'] ? 'Available' : 'Not Available') . '</span></td>';
        echo '<td><span class="' . $reserved_class . '">' . ($row['reserved'] ? 'Reserved' : 'Not Reserved') . '</span></td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';

    $stmt->close();
}

$conn->close();
?>

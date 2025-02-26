<!-- header from partials -->
<?php include('partials/header_a.php'); ?>  

<!-- including database -->
<?php include('../config.php'); ?>

<style>
    body {
        background-image: linear-gradient(to bottom, #ff2e2e, #ff5a52, #ff7b74, #ff9995, #ffb6b4, #ffc5c9, #ffd5db, #fee5eb, #fcecf4, #fbf3fa, #fcf9fd, #ffffff);
        background-size: cover;
        margin: 0;
        padding: 0;
    }
    .container h2 {
        font-size: 2rem;
        color: #343a40;
        font-weight: bold;
    }
    .container {
        margin-bottom: 100px;
    }
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 2rem;
    }
    .card h2 {
        font-size: 24px;
        font-weight: bold;
        color: #343a40;
    }
    .table {
        margin-bottom: 0;
        background-color: #fff;
    }
    .table th, .table td {
        vertical-align: middle;
    }
    .table thead th {
        background-color: #971919;
        color: #ffffff;
    }
    .table tbody tr:nth-child(odd) {
        background-color: #f2f2f2;
    }
    .table tbody tr:hover {
        background-color: #e9ecef;
    }
    .btn-success, .btn-primary {
        margin: 0 5px 10px;
    }
    .btn-primary {
        background-color: maroon;
        border: none;
    }
    .btn-primary:hover {
        background-color: brown;
    }
    .modal-content {
        border-radius: 10px;
    }
    .modal-header, .modal-footer {
        border: none;
    }
    .btn-close {
        background: transparent;
        border: none;
        font-size: 1.25rem;
    }
</style>

<!-- reservation table -->
<div class="container mt-5">
    <h2><i class="fas fa-calendar-alt"></i> Reservation Details</h2>
    <table class="table table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Time</th>
                <th>Guests</th>
                <th>Message</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM reservations";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["phone"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["time"] . "</td>";
                    echo "<td>" . $row["guests"] . "</td>";
                    echo "<td>" . $row["message"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td>";
                    if ($row["status"] == "pending") {
                        echo "<a href='confirm_reservation.php?id=" . $row["id"] . "' class='btn btn-success btn-sm'><i class='fas fa-check'></i> Confirm</a>";
                        echo "<a href='cancel_reservation.php?id=" . $row["id"] . "' class='btn btn-primary btn-sm'><i class='fas fa-times'></i> Cancel</a>";
                    } else {
                        echo "<form action='delete_reservation.php' method='POST' style='display:inline-block'>
                                <input type='hidden' name='id' value='" . $row['id'] . "'>
                                <button type='submit' class='btn btn-danger btn-sm'><i class='fas fa-trash'></i> Delete</button>
                              </form>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='10'>No reservations found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="messageContent"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Footer from partials -->
<?php include('partials/footer_a.php'); ?>

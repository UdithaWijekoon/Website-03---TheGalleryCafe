<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre-orders</title>
    <link rel="stylesheet" href="css/pre_order.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
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
    .container {
        margin-bottom: 100px;
    }
    .container h2 {
        font-size: 2rem;
        color: #343a40;
        font-weight: bold;
    }
    .alert {
        margin-top: 1rem;
    }
    .card {
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card h2 {
        font-size: 24px;
        font-weight: bold;
        color: #343a40;
    }
    .table {
        margin-bottom: 0;
    }
    .table th, .table td {
        vertical-align: middle;
        text-align: center;
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
    .btn-success, .btn-danger, .btn-primary {
        margin: 0 5px;
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

<!-- pre order page -->
<div class="container mt-5">
    <h2><i class="fas fa-clipboard-list"></i> Pre-orders</h2>
    <?php
    if (isset($_GET['message'])) {
        echo "<div class='alert alert-success mt-3'>" . $_GET['message'] . "</div>";
    }
    ?>
    <!-- pre order table -->
    <div class="card mt-4">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT * FROM pre_orders");
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['item_name'] . "</td>";
                        echo "<td>" . $row['quantity'] . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "<td>";
                        if ($row['status'] == 'pending') {
                            echo "<form action='confirm_preorder.php' method='POST' style='display:inline-block'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                    <button type='submit' class='btn btn-success'><i class='fas fa-check'></i> Confirm</button>
                                  </form>
                                  <form action='cancel_preorder.php' method='POST' style='display:inline-block'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                    <button type='submit' class='btn btn-primary'><i class='fas fa-times'></i> Cancel</button>
                                  </form>";
                        } else {
                            echo "<form action='delete_preorder.php' method='POST' style='display:inline-block'>
                                    <input type='hidden' name='id' value='" . $row['id'] . "'>
                                    <button type='submit' class='btn btn-danger'><i class='fas fa-trash'></i> Delete</button>
                                  </form>";
                        }
                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
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

<?php $conn->close(); ?>
</body>
</html>

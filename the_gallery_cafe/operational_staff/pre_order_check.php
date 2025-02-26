<!-- header from partials -->
<?php include('partials/header_s.php'); ?> 

<style>
        body {
            background-image: linear-gradient(to bottom, #0091ff, #00abff, #25c2ff, #67d7fa, #9be9f7, #b5f0f8, #cef7fb, #e5feff, #edfeff, #f5fdff, #fcfeff, #ffffff);
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
        background-color: #00144C;
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

<?php $conn->close(); ?>

<!-- Footer from partials -->
<?php include('partials/footer_s.php'); ?>  

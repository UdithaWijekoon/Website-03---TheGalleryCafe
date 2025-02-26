<!-- header from partials -->
<?php include('partials/header_a.php'); ?>  

<!-- including database -->
<?php include('../config.php'); 

// Update parking slot availability
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $slot_id = $_POST['slot_id'];
    $status = $_POST['status'];
    $sql = "UPDATE parking SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ii', $status, $slot_id);
    $stmt->execute();
}

// Fetch parking availability
$sql = "SELECT * FROM parking";
$result = $conn->query($sql);
$parking_slots = $result->fetch_all(MYSQLI_ASSOC);
?>

    <!-- Styles for admin parking page -->
    <style>
        body {
            background-image: linear-gradient(to bottom, #ff2e2e, #ff5a52, #ff7b74, #ff9995, #ffb6b4, #ffc5c9, #ffd5db, #fee5eb, #fcecf4, #fbf3fa, #fcf9fd, #ffffff);            /* background-image: linear-gradient(to bottom, #ff4a4a, #ff6663, #ff7f7c, #ff9794, #ffadac, #ffbbc0, #fec9d2, #fcd7e1, #fae2ee, #f9ecf7, #faf6fc, #ffffff); */
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        .available {
            color: green;
        }

        .occupied {
            color: red;
        }

        .status-icon {
            font-size: 20px;
        }
        .table thead th {
            background-color: #971919;
            color: #ffffff;
        }
        .table tbody tr {
            background-color: #f2f2f2;
        }
        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }
        /* header styles */
        .nav-link {
            color: #FFC0C0;
            margin-right: 10px;
            transition: color 0.3s;
        }
        .nav-link:hover {
            color: #fff;
        }
        .navbar-toggler {
            border-color: #FF4E4E;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 193, 7, 0.5%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
        .nav-item {
            margin-right: 10px;
        }
        .btn-logout {
            background-color: #dc3545;
            border: none;
            transition: background-color 0.3s;
            padding: 10px 20px 10px 20px;
        }
        .btn-logout:hover {
            background-color: #c82333;
        }
        .collapse.navbar-collapse {
            justify-content: space-between;
        }
    </style>
    
    <!-- admin parking content -->
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Admin Parking Management</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Parking Slot</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Change Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($parking_slots as $slot): ?>
                    <tr>
                        <td><?php echo $slot['id']; ?></td>
                        <td>
                            <i class="fa fa-car status-icon <?php echo $slot['status'] == 1 ? 'available' : 'occupied'; ?>"></i>
                            <?php echo $slot['status'] == 1 ? 'Available' : 'Occupied'; ?>
                        </td>
                        <td><?php echo $slot['description']; ?></td>
                        <td>
                            <form action="admin_parking.php" method="post">
                                <input type="hidden" name="slot_id" value="<?php echo $slot['id']; ?>">
                                <select name="status" class="form-select mb-2">
                                    <option value="1" <?php echo $slot['status'] == 1 ? 'selected' : ''; ?>>Available</option>
                                    <option value="0" <?php echo $slot['status'] == 0 ? 'selected' : ''; ?>>Occupied</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm">Update</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Footer from partials -->
    <?php include('partials/footer_a.php'); ?>  

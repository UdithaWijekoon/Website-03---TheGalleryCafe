<!-- header from partials -->
<?php include('partials/header_s.php'); ?>  

<!-- including database -->
<?php include('../config.php'); 

$success_message = "Status updated successfully"; //  success message variable

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

    <!-- Styles for staff parking page -->
    <style>
        body {
            background-image: linear-gradient(to bottom, #0091ff, #00abff, #25c2ff, #67d7fa, #9be9f7, #b5f0f8, #cef7fb, #e5feff, #edfeff, #f5fdff, #fcfeff, #ffffff);
            background-size: cover;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
            background-color: #00144C;
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
        .btn {
            margin-left: auto;
            margin-right: 20px;
        }
        .nav-link {
            color: #9FD6FF;
            margin-right: 10px;
            font-size:18px;
            transition: color 0.3s;
        }
        .nav-item {
            margin-right: 10px;
        }
        .nav-link:hover {
            color: #fff;
        }
        .navbar-toggler {
            border-color: #1C9DFF;
        }
        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 193, 7, 0.5%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }
        .btn-logout {
            background-color: #0091FF;
            border-color: #0091FF;
            padding: 10px 20px 10px 20px;
        }
        .btn-logout:hover {
            background-color: #006DC0;
            border-color: #006DC0;
        }
        .collapse.navbar-collapse {
            justify-content: space-between;
        }
    </style>
    
    <!-- staff parking content -->
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Staff Parking Management</h2>

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
                            <form action="staff_parking.php" method="post">
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
    <?php include('partials/footer_s.php'); ?>  

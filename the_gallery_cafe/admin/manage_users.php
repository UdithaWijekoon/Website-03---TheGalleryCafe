<!-- header from partials -->
<?php include('partials/header_a.php'); ?>  

<!-- including database -->
<?php include('../config.php'); ?>


<?php
// Get users from the database
$adminsQuery = "SELECT id, username, email FROM users WHERE role_id = 1";
$adminsResult = $conn->query($adminsQuery);

$staffQuery = "SELECT id, username, email FROM users WHERE role_id = 3";
$staffResult = $conn->query($staffQuery);

$customersQuery = "SELECT id, username, email FROM users WHERE role_id = 2";
$customersResult = $conn->query($customersQuery);
?>

    <style>
        /* styles for manage users */
        body {
            background-image: linear-gradient(to bottom, #ff2e2e, #ff5a52, #ff7b74, #ff9995, #ffb6b4, #ffc5c9, #ffd5db, #fee5eb, #fcecf4, #fbf3fa, #fcf9fd, #ffffff);            /* background-image: linear-gradient(to bottom, #ff4a4a, #ff6663, #ff7f7c, #ff9794, #ffadac, #ffbbc0, #fec9d2, #fcd7e1, #fae2ee, #f9ecf7, #faf6fc, #ffffff); */
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
            margin-bottom: 100px;
        }
        h1 {
            margin-bottom: 30px;
            color: #343a40;
        }
        .table {
            margin-top: 20px;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table th {
            background-color: #343a40;
            color: #fff;
        }
        .btn-warning, .btn-danger {
            font-size: 0.9em;
        }
        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #343a40;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .role-title {
            margin-top: 50px;
            color: #343a40;
            font-size: 1.5em;
        }
    </style>

<!-- container for user management -->
<div class="container">
    <h1><i class="fa fa-users-cog"></i> Manage Users</h1>

    <?php if (isset($_GET['message'])): ?>
        <div class="alert alert-success"><?php echo htmlspecialchars($_GET['message']); ?></div>
    <?php elseif (isset($_GET['error'])): ?>
        <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
    <?php endif; ?>

    <!-- Admins Table -->
    <div class="role-title">Admins</div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $adminsResult->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-userid="<?php echo $row['id']; ?>">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Operational Staff Table -->
    <div class="role-title">Operational Staff</div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $staffResult->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-userid="<?php echo $row['id']; ?>">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Customers Table -->
    <div class="role-title">Customers</div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $customersResult->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td>
                        <a href="edit_user.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm">
                            <i class="fa fa-edit"></i> Edit
                        </a>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-userid="<?php echo $row['id']; ?>">
                            <i class="fa fa-trash"></i> Delete
                        </button>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete this user?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <a href="#" class="btn btn-danger" id="confirmDeleteButton">Delete</a>
            </div>
        </div>
    </div>
</div>

<script>
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var userId = button.getAttribute('data-userid');
        var confirmDeleteButton = deleteModal.querySelector('#confirmDeleteButton');
        confirmDeleteButton.href = 'delete_user.php?id=' + userId;
    });
</script>
<!-- Footer from partials -->
<?php include('partials/footer_a.php'); ?>  

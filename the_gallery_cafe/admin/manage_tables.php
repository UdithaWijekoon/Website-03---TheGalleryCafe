<!-- header from partials -->
<?php include('partials/header_a.php'); ?>  

<!-- including database -->
<?php include('../config.php'); 

// Handle form submissions to update table availability
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $status = $_POST['status'];

    $available = ($status == 'available') ? 1 : 0;
    $reserved = ($status == 'reserved') ? 1 : 0;

    $stmt = $conn->prepare("UPDATE tables SET available = ?, reserved = ? WHERE id = ?");
    $stmt->bind_param("iii", $available, $reserved, $id);

    if ($stmt->execute()) {
        $_SESSION['table_success'] = "Table status updated successfully.";
    } else {
        $_SESSION['table_error'] = "Error updating table status: " . $stmt->error;
    }

    $stmt->close();
}

// Query to count tables by category
$sql = "SELECT category, COUNT(*) as table_count FROM tables GROUP BY category";
$result = $conn->query($sql);

$category_counts = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $category_counts[] = $row;
    }
}

// Fetch table data
$result = $conn->query("SELECT * FROM tables ORDER BY category, capacity ASC");
$tables = $result->fetch_all(MYSQLI_ASSOC);

// Fetch unique categories for filter
$category_result = $conn->query("SELECT DISTINCT category FROM tables");
$categories = $category_result->fetch_all(MYSQLI_ASSOC);

$conn->close();


// Check if there is a success message to display
$successMessage = '';
if (isset($_SESSION['success_message'])) {
    $successMessage = $_SESSION['success_message'];
    unset($_SESSION['success_message']); // Clear the session variable after displaying
}
?>

    <style>
        body {
            background-image: linear-gradient(to bottom, #ff2e2e, #ff5a52, #ff7b74, #ff9995, #ffb6b4, #ffc5c9, #ffd5db, #fee5eb, #fcecf4, #fbf3fa, #fcf9fd, #ffffff);            /* background-image: linear-gradient(to bottom, #ff4a4a, #ff6663, #ff7f7c, #ff9794, #ffadac, #ffbbc0, #fec9d2, #fcd7e1, #fae2ee, #f9ecf7, #faf6fc, #ffffff); */
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
        }
        .table-category {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            background-color: #fff;
            border-radius: 5px;
        }
        .table-category h3 {
            margin-top: 0;
        }
        .form-group {
            margin-bottom: 10px;
        }
        .form-group input,
        .form-group select {
            margin-right: 10px;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
        .table {
            display: inline-block;
            width: 150px;
            padding: 10px;
            margin: 5px;
            border-radius: 5px;
            text-align: center;
            color: #fff;
        }
        .table-available {
            background-color: #28a745;
        }
        .table-reserved {
            background-color: #dc3545;
        }
        .filter-container {
            margin-bottom: 20px;
            display: flex;
            justify-content: flex-start;
            align-items: center;
        }
        .filter-container select {
            margin-right: 10px;
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
        footer{
            margin-top: 40px;
        }
        .container_sub {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .container h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .table-category {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 15px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .table-category h2 {
            margin-top: 0;
            color: #790808;
        }
        .table-category p {
            margin: 10px 0;
        }
        .btn-light{
            background-color: #007bff;
            border: 1px solid #0056b3;
            color: #fff;
        }
        .btn-light:hover{
            background-color: #0056b3;
            color: #fff;
        }
        .btn-primary{
            background-color: #790808;
            border: 1px solid #a00b0b;
            color: #fff;
        }
        .btn-primary:hover{
            background-color: #a00b0b;
            border: 1px solid #a00b0b;
            color: #fff;
        }
    </style>

<div class="container">
    <h1 class="mb-4 text-center">Manage Tables</h1>

    <!-- Success or error messages -->
    <?php if (isset($_SESSION['table_success'])): ?>
        <div class="alert alert-success">
            <?php echo $_SESSION['table_success']; unset($_SESSION['table_success']); ?>
        </div>
    <?php endif; ?>

    <?php if (isset($_SESSION['table_error'])): ?>
        <div class="alert alert-danger">
            <?php echo $_SESSION['table_error']; unset($_SESSION['table_error']); ?>
        </div>
    <?php endif; ?>

    <!-- Display success message if set -->
            <?php if (!empty($successMessage)): ?>
            <div class="alert alert-success"><?php echo $successMessage; ?></div>
    <?php endif; ?>
    
    <!-- Filter -->
    <div class="filter-container">
        <select id="category-filter" class="form-select">
            <option value="all">All Categories</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo htmlspecialchars($category['category']); ?>">
                    <?php echo htmlspecialchars($category['category']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <!-- Table Management -->
    <?php
    $current_category = '';
    foreach ($tables as $index => $table):
        if ($table['category'] !== $current_category) {
            if ($current_category !== '') {
                echo '</div>'; // Close previous category div
            }
            $current_category = $table['category'];
            echo '<div class="table-category" data-category="' . htmlspecialchars($table['category']) . '">';
            echo '<h3>' . htmlspecialchars($table['category']) . ' (Capacity: ' . $table['capacity'] . ')</h3>';
        }
    ?>
        <div class="table <?= $table['reserved'] ? 'table-reserved' : ($table['available'] ? 'table-available' : '') ?>">
            <form action="manage_tables.php" method="POST">
                <div class="form-group">
                    <label for="status-<?php echo $table['id']; ?>">Table <?php echo $table['id']; ?>:</label>
                    <select id="status-<?php echo $table['id']; ?>" name="status" class="form-select">
                        <option value="available" <?= $table['available'] ? 'selected' : '' ?>>Available</option>
                        <option value="reserved" <?= $table['reserved'] ? 'selected' : '' ?>>Reserved</option>
                    </select>
                    <input type="hidden" name="id" value="<?php echo $table['id']; ?>">
                </div>
                <button type="submit" class="btn btn-light btn-sm">Update</button>
            </form>
        </div>
    <?php endforeach; ?>
    </div>

    <div class="container mt-5">
        <h1>Add New Tables</h1>
        <form action="add_table_process.php" method="POST">
            <div class="mb-3">
                <label for="category" class="form-label">Table Category:</label>
                <select class="form-select" id="category" name="category" required>
                    <option value="2 person">2 person</option>
                    <option value="4 person">4 person</option>
                    <option value="6 person">6 person</option>
                    <option value="8 person">8 person</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="count" class="form-label">Number of Tables:</label>
                <input type="number" class="form-control" id="count" name="count" min="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Tables</button>
        </form>
    </div>

    <div class="container_sub">
        <h2>Table Categories</h2>
        <?php foreach ($category_counts as $category) { ?>
            <div class="table-category">
                <h2><?php echo htmlspecialchars($category['category']); ?> Tables</h2>
                <p>Number of tables: <?php echo htmlspecialchars($category['table_count']); ?></p>
            </div>
        <?php } ?>
    </div>

<script>
document.getElementById('category-filter').addEventListener('change', function() {
    var selectedCategory = this.value;
    var categories = document.querySelectorAll('.table-category');
    categories.forEach(function(category) {
        if (selectedCategory === 'all' || category.getAttribute('data-category') === selectedCategory) {
            category.style.display = '';
        } else {
            category.style.display = 'none';
        }
    });
});
</script>

<!-- Footer from partials -->
<?php include('partials/footer_a.php'); ?>  

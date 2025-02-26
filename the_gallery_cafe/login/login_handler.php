<!-- starting the session and including the database -->
<?php
session_start();
require '../config.php';


$username = $_POST['username'];
$password = $_POST['password'];
$role_id = $_POST['role'];

// Debugging information
error_log("Attempting login with username: $username, role_id: $role_id");

// Prepare and execute the query to fetch user data
$sql = "SELECT * FROM users WHERE username = ? AND role_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $username, $role_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) { // Assuming password is hashed
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role_id'] = $user['role_id'];
        
        // Redirect based on role_id
        if ($role_id == 1) {
            header("Location: ../admin/admin_dashboard.php");
        } elseif ($role_id == 3) {
            header("Location: ../operational_staff/operational_staff_dashboard.php");
        } elseif ($role_id == 2) {
            header("Location: ../customer/customer_dashboard.php");
        }
        exit();
    } else {
        error_log("Invalid password for username: $username, role_id: $role_id");
        header("Location: login.php?message=Invalid%20password");
        exit();
    }
} else {
    error_log("No user found with username: $username, role_id: $role_id");
    header("Location: login.php?message=No%20user%20found%20with%20this%20role");
    exit();
}
$stmt->close();
$conn->close();
?>


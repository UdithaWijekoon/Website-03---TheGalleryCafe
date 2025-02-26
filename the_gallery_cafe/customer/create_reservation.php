<!-- login session starting -->
<?php 
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role_id'] != 2) {
    header("Location: ../index.php");
    exit();
}
?>

<?php include('../config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $guests = $_POST['guests'];
    $message = $_POST['message'];

    $sql = "INSERT INTO reservations (name, email, phone, date, time, guests, message, status) VALUES ('$name', '$email', '$phone', '$date', '$time', '$guests', '$message', 'pending')";

    if ($conn->query($sql) === TRUE) {
        header("Location: reservation.php?message=Reservation created successfully");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>


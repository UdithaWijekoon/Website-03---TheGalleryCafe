<!-- includig the database -->
<?php
$servername = "localhost";
$username = "root";
$password = ""; 
$dbname = "the_gallery_cafe_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!-- header from partials -->
<?php include('partials/header_s.php'); 

include('../config.php');
?>

<!--Styles for edit promotions and special events  -->
<style>
body {
    font-family: Arial, sans-serif;
    background-image: linear-gradient(to bottom, #0091ff, #00abff, #25c2ff, #67d7fa, #9be9f7, #b5f0f8, #cef7fb, #e5feff, #edfeff, #f5fdff, #fcfeff, #ffffff);
    margin: 0;
    padding: 0;
}

.container {
    width: 50%;
    margin: 50px auto;
    background: #fff;
    padding: 20px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    border-radius: 10px;
}

h1 {
    text-align: center;
    color: #333;
    margin-bottom: 30px;
}

form {
    width: 100%;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 10px;
    color: #333;
    font-weight: bold;
}

.form-group input[type="text"],
.form-group textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    background-color: #f9f9f9;
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
}

.form-group input[type="text"]:focus,
.form-group textarea:focus {
    border-color: #007bff;
    background-color: #fff;
}

.form-group textarea {
    height: 150px;
}

.button-group {
    text-align: center;
}

.button-group button {
    background-color: #007bff;
    border: none;
    color: white;
    padding: 15px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 10px 5px;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.button-group button:hover {
    background-color: #0056b3;
}

.button-group a {
    display: inline-block;
    color: #007bff;
    text-decoration: none;
    font-size: 16px;
    margin-top: 20px;
    transition: color 0.3s ease;
}

.button-group a:hover {
    color: #0056b3;
}

.alert {
    padding: 10px;
    background-color: #4CAF50;
    color: white;
    margin-bottom: 20px;
    border-radius: 5px;
}

.alert.error {
    background-color: #f44336;
}

</style>

<!-- edit promotions and special events content -->
<?php 

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM promotions WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $promotion = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $details = $_POST['details'];
    $date_time = $_POST['date_time'];
    $ticket_price = $_POST['ticket_price'];

    $stmt = $conn->prepare("UPDATE promotions SET title = ?, description = ?, details = ?, date_time = ?, ticket_price = ? WHERE id = ?");
    $stmt->bind_param("ssssdi", $title, $description, $details, $date_time, $ticket_price, $id);

    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Promotion updated successfully!";
        header("Location: promotions.php");
    } else {
        $error_message = "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
    <div class="container">
        <h1>Edit Promotion</h1>
        <!-- Alert Messages -->
        <?php if (isset($_GET['message'])): ?>
            <div class="alert <?= isset($_GET['error']) ? 'error' : ''; ?>">
                <?= htmlspecialchars($_GET['message']); ?>
            </div>
        <?php endif; ?>

        <form action="update_promotion.php" method="POST">
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?php echo $promotion['title']; ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" required><?php echo $promotion['description']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="details">Details</label>
                <textarea id="details" name="details" required><?php echo $promotion['details']; ?></textarea>
            </div>
            <div class="form-group">
                <label for="date_time">Date and Time</label>
                <input type="text" id="date_time" name="date_time" value="<?php echo $promotion['date_time']; ?>" required>
            </div>
            <div class="form-group">
                <label for="ticket_price">Ticket Price</label>
                <input type="text" id="ticket_price" name="ticket_price" value="<?php echo $promotion['ticket_price']; ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $promotion['id']; ?>">
            <div class="button-group">
                <button type="submit">Update Promotion</button>
                <a href="staff_promotions.php">Cancel</a>
            </div>
        </form>
    </div>

<!-- Footer from partials -->
<?php include('partials/footer_s.php'); 



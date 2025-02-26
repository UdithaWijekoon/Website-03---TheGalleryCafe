<!-- header from partials -->
<?php include('partials/header_a.php'); 

include('../config.php');
?>

<!-- Styles for ad promotions and special events -->
    <style>
        body {
            background-image: linear-gradient(to bottom, #ff2e2e, #ff5a52, #ff7b74, #ff9995, #ffb6b4, #ffc5c9, #ffd5db, #fee5eb, #fcecf4, #fbf3fa, #fcf9fd, #ffffff);            /* background-image: linear-gradient(to bottom, #ff4a4a, #ff6663, #ff7f7c, #ff9794, #ffadac, #ffbbc0, #fec9d2, #fcd7e1, #fae2ee, #f9ecf7, #faf6fc, #ffffff); */
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        .container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group button {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            background-color: #790808;
            color: #fff;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #a00b0b;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #790808;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>

<!-- Add promotions and special events content -->
    <div class="container">
        <h1>Add Promotion</h1>
        <form action="add_promotion_handler.php" method="POST">
            <div class="form-group">
                <label for="title"><i class="fas fa-heading"></i> Title:</label>
                <input type="text" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="description"><i class="fas fa-info-circle"></i> Description:</label>
                <textarea id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="details"><i class="fas fa-list"></i> Details (one per line):</label>
                <textarea id="details" name="details" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="date_time"><i class="fas fa-calendar-alt"></i> Date and Time:</label>
                <input type="text" id="date_time" name="date_time" required>
            </div>
            <div class="form-group">
                <label for="ticket_price"><i class="fas fa-dollar-sign"></i> Ticket Price (optional):</label>
                <input type="number" id="ticket_price" name="ticket_price" step="0.01">
            </div>
            <div class="form-group">
                <button type="submit"><i class="fas fa-plus-circle"></i> Add Promotion</button>
            </div>
        </form>
        <a href="admin_promotions.php" class="back-link"><i class="fas fa-arrow-left"></i> Back to Dashboard</a>
    </div>

<!-- Footer from partials -->
<?php include('partials/footer_a.php'); 

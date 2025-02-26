<!-- header from partials -->
<?php include('partials/header_a.php'); 

include('../config.php');
?>
<!-- styles for promotions and special events -->
    <style>
        body {   
            background-image: linear-gradient(to bottom, #ff2e2e, #ff5a52, #ff7b74, #ff9995, #ffb6b4, #ffc5c9, #ffd5db, #fee5eb, #fcecf4, #fbf3fa, #fcf9fd, #ffffff);            /* background-image: linear-gradient(to bottom, #ff4a4a, #ff6663, #ff7f7c, #ff9794, #ffadac, #ffbbc0, #fec9d2, #fcd7e1, #fae2ee, #f9ecf7, #faf6fc, #ffffff); */
            background-size: cover;
            margin: 0;
            padding: 0;            
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
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
        .promotion {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 15px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .promotion h2 {
            margin-top: 0;
            color: #790808;
        }
        .promotion ul {
            padding-left: 20px;
        }
        .promotion ul li {
            margin-bottom: 5px;
        }
        .promotion p {
            margin: 10px 0;
        }
        .form-group button {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            background-color: #790808;
            color: #fff;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .form-group button:hover {
            background-color: #a00b0b;
        }
        .form-group a {
            display: inline-block;
            padding: 10px 20px;
            border: none;
            background-color: #790808;
            color: #fff;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .form-group a:hover {
            background-color: #a00b0b;
        }
        .success-message {
        background-color: #d4edda;
        border-color: #c3e6cb;
        color: #155724;
        margin-top: 20px;
        text-align: center;
        }
    </style>
    
    <!-- promotions and special events content -->
    <div class="container">
        <h1><i class="fas fa-cocktail"></i> Manage Special Events and Promotions</h1>
        <div class="form-group">
            <a href="add_promotion.php"><i class="fas fa-plus-circle"></i> Add New Promotion</a>
        </div>
        <?php
        if (isset($_GET['message'])) {
            echo "<div class='success-message'>{$_GET['message']}</div>";
        }

        $result = $conn->query("SELECT * FROM promotions ORDER BY date_time DESC");
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="promotion">
                <h2><?php echo htmlspecialchars($row['title']); ?></h2>
                <p><?php echo htmlspecialchars($row['description']); ?></p>
                <ul>
                    <?php
                    $details = explode("\n", $row['details']);
                    foreach ($details as $detail) {
                        echo "<li>" . htmlspecialchars($detail) . "</li>";
                    }
                    ?>
                </ul>
                <p><strong>Date and Time:</strong> <?php echo htmlspecialchars($row['date_time']); ?></p>
                <?php if (!empty($row['ticket_price'])) { ?>
                    <p><strong>Tickets:</strong> $<?php echo htmlspecialchars($row['ticket_price']); ?></p>
                <?php } ?>
                <div class="form-group">
                    <a href="edit_promotion.php?id=<?php echo $row['id']; ?>"><i class="fas fa-edit"></i> Edit</a>
                    <a href="delete_promotion.php?id=<?php echo $row['id']; ?>"><i class="fas fa-trash"></i> Delete</a>
                </div>
            </div>
            <?php
        }
        ?>
    </div>

<!-- Footer from partials -->
<?php include('partials/footer_a.php'); ?>  

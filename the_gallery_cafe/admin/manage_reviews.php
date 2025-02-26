<!-- header from partials -->
<?php include('partials/header_a.php'); ?>

<?php
include('../config.php');

// Fetch reviews from the database
$result = $conn->query("SELECT * FROM reviews ORDER BY created_at DESC");
$reviews = $result->fetch_all(MYSQLI_ASSOC);

$conn->close();
?> 

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-image: linear-gradient(to bottom, #ff2e2e, #ff5a52, #ff7b74, #ff9995, #ffb6b4, #ffc5c9, #ffd5db, #fee5eb, #fcecf4, #fbf3fa, #fcf9fd, #ffffff);            /* background-image: linear-gradient(to bottom, #ff4a4a, #ff6663, #ff7f7c, #ff9794, #ffadac, #ffbbc0, #fec9d2, #fcd7e1, #fae2ee, #f9ecf7, #faf6fc, #ffffff); */
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
        }

        .review {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .review h5 {
            margin-top: 0;
            margin-bottom: 10px;
            color: #343a40;
        }
        .review p {
            margin-bottom: 10px;
            color: #495057;
        }
        .review .rating {
            color: #ffc107;
            margin-bottom: 5px;
        }
        .review small {
            color: #6c757d;
        }
        .alert {
            border-radius: 5px;
        }
        .fa-star {
            margin-right: 2px;
        }
        .btn-delete {
            background-color: #dc3545;
            border: none;
            transition: background-color 0.3s;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
        }
        .btn-delete:hover {
            background-color: #c82333;
        }
        .btn-delete i {
            margin-right: 5px;
        }
    </style>

    <div class="container">
        <h1 class="text mb-4"><i class="fas fa-comments"></i> Manage Reviews</h1>

        <!-- Success or error messages -->
        <?php if (isset($_SESSION['review_success'])): ?>
            <div class="alert alert-success">
                <?php echo $_SESSION['review_success']; unset($_SESSION['review_success']); ?>
            </div>
        <?php endif; ?>
        <?php if (isset($_SESSION['review_error'])): ?>
            <div class="alert alert-danger">
                <?php echo $_SESSION['review_error']; unset($_SESSION['review_error']); ?>
            </div>
        <?php endif; ?>

        <!-- Display Reviews -->
        <div class="reviews">
            <?php foreach ($reviews as $review): ?>
                <div class="review">
                    <h5><?php echo htmlspecialchars($review['customer_name']); ?> <i class="fas fa-user"></i></h5>
                    <p class="rating">
                        <?php echo str_repeat('<i class="fa fa-star"></i>', $review['rating']) . str_repeat('<i class="fa fa-star-o"></i>', 5 - $review['rating']); ?>
                    </p>
                    <p><?php echo nl2br(htmlspecialchars($review['review_text'])); ?></p>
                    <small class="text-muted"><i class="fas fa-clock"></i> <?php echo date('F j, Y, g:i a', strtotime($review['created_at'])); ?></small>
                    <form action="delete_review.php" method="GET" class="mt-3">
                        <input type="hidden" name="id" value="<?php echo $review['id']; ?>">
                        <button type="submit" name="delete" class="btn-delete"><i class="fas fa-trash"></i> Delete</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<!-- Footer from partials -->
<?php include('partials/footer_a.php'); ?> 


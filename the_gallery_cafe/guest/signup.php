<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>

    <link rel="stylesheet" href="css/user_signup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">

    <style>
        body{
        background-image: url(../images/background/login_bg.jpeg);
        background-size: cover;
        }
        
        .signup-form{
        position:absolute;
        inset: 4px;
        background: #1c1c1c;
        border-radius: 8px;
        padding: 0 50px 0;
        z-index: 2;
        }
        .signup-container{
        position: relative;
        width: 600px;
        height: 650px;
        background: #1D1A10;
        border-radius: 8px;
        animation: fadeIn 1.5s ease-in-out;
        overflow: hidden;
        }

        .form-group input{
        width: 90.45%;
        height: 50px;
        background: transparent;
        border: 2px solid #FFAD0A;
        border-radius: 40px;
        font-size: 1em;
        color: #fff;
        padding: 0 20px 0;
        transition: 0.5s;
        }

        .alert {
        margin-top: 20px;
        }
        .alert-success {
            background-color: #1c1c1c;
            color: #1be909;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            border-color: #c3e6cb;
        }
        .alert-danger {
            background-color: #1c1c1c;
            color: #f70101;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            border-color: #f5c6cb;
        }

        p{
            margin-top:-15px;
        }
    </style>
</head>

<body>
    <div class="signup-container">
        <div class="signup-box">
          <span class="border"></span>
            <form class="signup-form" action="customer_registration_handler.php" method="POST">
                <h2>Register</h2>
                <p>Hey! After registration, you can pre-order items, book your table, and if you wish to contact us, you can send us messages.</p>

                <?php
                // Check for success or error messages in URL parameters
                if (isset($_GET['message'])) {
                    echo '<div class="alert alert-success">' . htmlspecialchars($_GET['message']) . '</div>';
                } elseif (isset($_GET['error'])) {
                    echo '<div class="alert alert-danger">' . htmlspecialchars($_GET['error']) . '</div>';
                }
                ?> 

                <div class="form-group">
                    <input type="text" class="form-control" id="username" name="username" required>
                    <label for="username"><i class="fa fa-user"></i> User Name</label>
                    
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" id="email" name="email" required>
                    <label for="email"><i class="fa fa-envelope"></i> Email</label>
                    
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <label for="password"><i class="fa fa-lock"></i> Password</label>
                    
                </div>

                <button type="submit">Register</button>

                <div class="link">Registered? <a href="../login/login.php">Login here</a></div>
                <p>OR</p>
                <div class="link2">Go to the home page as a guest , <a href="../index.php"><strong>Home</strong></a></div>

            </form>
        </div>
    </div>

</body>
</html>

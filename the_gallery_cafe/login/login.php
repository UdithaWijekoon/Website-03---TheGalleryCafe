<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="login.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

/* styles for login page */
    body{
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: 'Poppins';
    background-image: url(../images/background/login_bg.jpeg);
    background-color:#000;
    background-size: cover;
    min-height: 100vh;
    }    

    *{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }
    .login-container{
    position: relative;
    width: 256px;
    height: 256px;
    display: flex;
    justify-content: center;
    align-items: center;
    animation: fadeIn 1.5s ease-in-out;
    }

    @keyframes fadeIn {
    from {
        opacity: 0;
    }
    to {
        opacity: 1;
    }
    } 
    .login-box{
    position: absolute;
    width: 400px;
    }

    .login-form{
    width: 100%;
    padding:0px 50px;
    }

    .form-group{
    position: relative;
    margin: 20px 0;
    }
    .form-group label{
    position: absolute;
    top: 50%;
    left: 20px;
    transform: translateY(-50%);
    font-size: 1em;
    color: #ffffff;
    pointer-events: none;
    transition: 0.5s ease;
    }


    .form-group-s{
    display: flex;
    justify-content: center;
    justify-content: space-between;
    margin-bottom: 6%;
    margin-top: -3%;
    }
    .form-label{
    color: #fff;
    }

    .form-control{
    width: 250px;
    height: 40px;
    color: #fff;
    background-color: #000000;
    border: 2px solid #FFAD0A;
    border-radius: 30px;
    font-family: 'Poppins';
    font-size: 15px;
    }

    h2{
    font-size: 2.5rem;
    color: #FFAD0A;
    text-align: center;
    margin-bottom: -5px;
    }

    .form-group input{
    width: 100%;
    height: 50px;
    background: transparent;
    border: 2px solid #FFAD0A;
    border-radius: 40px;
    font-size: 1em;
    color: #fff;
    padding: 0 20px;
    transition: 0.5s;
    }

    .form-group input:focus ~ label,
    .form-group input:valid ~ label{
    top: 1px;
    font-size: 0.8em;
    background-color: black;
    padding: 0 6px;
    color: #ffbd42;
    }

    .btn{
    width: 100%;
    height: 45px;
    border-radius: 45px;
    background: #FFAD0A;
    border: none;
    outline: none;
    cursor: pointer;
    font-size: 1em;
    color: #000;
    font-weight: 600;
    }

    .btn:hover{
    background: #FFE800;
    color: #000;
    transform: scale(1.1);
    }
    .link{
    margin: 10px 0 10px;
    text-align: center;
    color: #fff;
    text-decoration: none;   
    }

    .link a{
    margin: 10px 0 10px;
    text-align: center;
    color: #FFAD0A;
    text-decoration: none;   
    }
    p{
    color: #fff;
    text-align: center;
    }

    .link a:hover{
    color: #B17500;
    text-decoration: underline;  
    }
    .login-container span{
    position: absolute;
    left: 0;
    width: 32px;
    height: 5px;
    background: #673816;
    border-radius: 8px;
    transform-origin: 128px;
    transform: scale(2.2) rotate(calc(var(--i) * (360deg / 50)));
    animation: animateBlink 1s linear infinite;
    animation-delay: calc(var(--i) * (3s / 50));
    }
    
    @keyframes animateBlink{
    0%{
    background: #FFbd42;
    }
    25%{
    background: #FFAD0A;
    }
    }
</style>
</head>

<body>
    <!-- login page content -->
    <div class="login-container">
        <div class="login-box">
        
            <h2>Login</h2>
            <form class="login-form" action="login_handler.php" method="POST">
            <div class="form-group">
                <input type="text" class="form-control" id="username" name="username" required>
                <label for="uid"><i class="fa fa-user"></i> Username</label>
            </div>

            <div class="form-group">  
                <input type="password" class="form-control" id="password" name="password" required>
                <label for="password"><i class="fa fa-lock"></i> Password</label>
            </div>
            <div class="form-group-s">
                <label for="role" class="form-label">Role :</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="">Select Role</option>
                    <option value="2">Customer</option>
                    <option value="1">Admin</option>
                    <option value="3">Operational Staff</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">LOGIN</button>
            <div class="link">New here?  <a href="../guest/signup.php">Register as Customer</a></div>
            <p>OR</p>
            <div class="link"><a href="../index.php">Continue as Guest</a></div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="messageModalLabel">Message</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <span id="messageContent"></span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    
<!-- functions for login Page -->
<script src="login.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    <?php if (isset($_GET['message'])): ?>
        var message = "<?php echo $_GET['message']; ?>";
        var messageModal = new bootstrap.Modal(document.getElementById('messageModal'), {});
        document.getElementById('messageContent').innerText = message;
        messageModal.show();
    <?php endif; ?>
</script> 

</body>
</html>

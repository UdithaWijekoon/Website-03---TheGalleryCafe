<!-- header from partials -->
<?php include('partials/header_a.php'); ?>  

<!-- including database -->
<?php include('../config.php'); ?>


<!-- styles for register_container -->
<style>
        body {
            background-image: linear-gradient(to bottom, #ff2e2e, #ff5a52, #ff7b74, #ff9995, #ffb6b4, #ffc5c9, #ffd5db, #fee5eb, #fcecf4, #fbf3fa, #fcf9fd, #ffffff);            /* background-image: linear-gradient(to bottom, #ff4a4a, #ff6663, #ff7f7c, #ff9794, #ffadac, #ffbbc0, #fec9d2, #fcd7e1, #fae2ee, #f9ecf7, #faf6fc, #ffffff); */
            background-size: cover;
            margin: 0;
            padding: 0;
        }
        .register-container {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 100px 0px 150px 0px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .register-form {
            padding: 30px;
            width: 600px;
        }
        .register-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #343a40;
        }
        .register-form .form-label {
            font-weight: bold;
        }
        .register-form .btn {
            width: 100%;
        }
        .register-form .input-group-text {
            background-color: #fff;
            border-right: 0;
        }
        .register-form .form-control {
            border-left: 0;
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

<!-- Register Users container -->
       <div class="register-container">
        <div class="register-form">
            <h2><i class="fa fa-user-plus"></i> Register a User</h2>
            <form action="register_handler.php" method="POST">
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                </div>
                <div class="mb-3 input-group">
                    <span class="input-group-text"><i class="fa fa-users"></i></span>
                    <select class="form-control" id="role" name="role" required>
                        <option value="">Select Role</option>
                        <option value="1">Admin</option>
                        <option value="2">Customer</option>
                        <option value="3">Operational Staff</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mb-2">Register User</button>
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

<!-- Footer from partials -->
<?php include('partials/footer_a.php'); ?>  



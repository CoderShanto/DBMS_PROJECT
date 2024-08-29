<?php
include('../includes/connect.php');
include('../functions/common_function.php');
@session_start();

if(isset($_POST['admin_login'])){
    $admin_username = $_POST['admin_username'];
    $admin_password = $_POST['admin_password'];
    
    $select_query = "SELECT * FROM `admin_table` WHERE admin_name='$admin_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    // Retrieve the admin's IP address
    $admin_ip = $_SERVER['REMOTE_ADDR'];

    // Your remaining code here...
    //cart item
    $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address='$admin_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);

    if($row_count > 0){
        $_SESSION['admin_name'] = $admin_username;

        if(password_verify($admin_password, $row_data['admin_password'])){
            if($row_count == 1 and $row_count_cart == 0){
                $_SESSION['admin_name'] = $admin_username;
                echo "<script>alert('Login successful')</script>";
                echo "<script>window.open('index.php','_self')</script>";
            }
        }else{
            echo "<script>alert('Invalid Login')</script>";
        }

    }else{
        echo "<script>alert('Invalid Login')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <style>
       body {
    background-color: #e0f2f1;
}

        .login-container {
            margin-top: 100px; /* Adjust the top margin for centering */
        }
        .login-form {
            background-color: #ffffff; /* White background for form */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Soft shadow effect */
        }
    </style>
</head>
<body>

<div class="container login-container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="login-form">
                <h2 class="text-center mb-4">Admin Login</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="admin_username">Username</label>
                        <input type="text" id="admin_username" class="form-control" name="admin_username" placeholder="Enter your username" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="admin_password">Password</label>
                        <input type="password" id="admin_password" class="form-control" name="admin_password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="admin_login">Login</button>
                    <p class="text-center mt-3 text-light">Don't have an account? <a href="admin_registration.php">Register</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

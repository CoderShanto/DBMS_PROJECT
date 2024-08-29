<?php 
include('../includes/connect.php'); 
include('../functions/common_function.php');
@session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css">
    <style>
      body {
    background-color: #e3f2fd;
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
                <h2 class="text-center mb-4">User Login</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="user_username">Username</label>
                        <input type="text" id="user_username" class="form-control" name="user_username" placeholder="Enter your username" autocomplete="off" required>
                    </div>
                    <div class="form-group">
                        <label for="user_password">Password</label>
                        <input type="password" id="user_password" class="form-control" name="user_password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="user_login">Login</button>
                    <p class="text-center mt-3">Don't have an account? <a href="user_registration.php">Register</a></p>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php

if(isset($_POST['user_login'])){
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "SELECT * FROM `user_table` WHERE username = '$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);

    if($row_count > 0 && password_verify($user_password, $row_data['user_password'])) {
        $_SESSION['username'] = $user_username;
        echo "<script>alert('Login successful')</script>";
        if($row_count == 1 && !isset($_SESSION['cart_initialized'])) {
            echo "<script>window.open('profile.php', '_self')</script>";
        } else {
            echo "<script>window.open('payment.php', '_self')</script>";
        }
    } else {
        echo "<script>alert('Invalid Login')</script>";
    }
}

?>

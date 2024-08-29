<?php include('../includes/connect.php'); 
include('../functions/common_function.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Page</title>

       <!--!bootstrap css link -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<style>
   .payment_img{
        width:100%;
        margin:auto;
        display:block;
    }
</style>
<body>
    
<!--php code to access user id -->

<?php 
$user_ip=getIPAddress();
$get_user="Select * from `user_table` where user_ip='$user_ip'";
$result=mysqli_query($con,$get_user);
$run_query=mysqli_fetch_array($result);
$user_id=$run_query['user_id'];

?>
    
<div class="container">
    <h2 class="text-center text-info my-5">Payment Options</h2>
    <div class="row d-flex justify-content-center align-items-center my-5">

        <div class="col-md-6">
        <a href="https://www.bikash.com" target="_blank"><img src="../images/pay.jpg" alt="" class="payment_img"></a>
        </div>
        <div class="col-md-6">
        <a href="order.php?user_id=<?php echo $user_id ?>"><h2 class="text-center">Pay Online</h2></a>
        </div>
      
      
    </div>
</div>


</body>
</html>
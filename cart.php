<!--connect file -->
<?php  
include('includes/connect.php');
include('functions/common_function.php');
session_start();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopify-cart details</title>
    <style>
        /* CSS to style the image */
        img {
            width: 100px; /* Specify the width of the image */
            height: 100px; /* Maintain aspect ratio */
            object-fit:contain;
        }
        .car {
  display: table;
  color: red;
}

.car > * {
  display: table-cell;
  text-align: center;
  position: relative;
}

.car > *::after {
  content: "\1F614"; /* Unicode for sad emoji */
  display: block;
  font-size: 24px; /* Adjust size as needed */
  margin-top: 10px; /* Adjust spacing as needed */
}



    </style>
    <!--!bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
<!--navbar -->
<div class="container-fluid p-0">
    <!--first child -->

    <nav class="navbar navbar-expand-lg navbar-light bg-warning"> <!--bg-info for doing colors look -->
<img src="./images/lo2.jpg" alt="" class="logo">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse font-weight-bold" id="navbarSupportedContent"><!-- if i change id or data target it will not give any output -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="display_all.php">Products</a></a>
      </li>
      <?php
if(isset($_SESSION['username'])){
  echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/profile.php'>My Account</a>
      </li>";


}else{
    echo "<li class='nav-item'>
  <a class='nav-link' href='./users_area/user_registration.php'>Register</a>
</li>";
}

      ?>
      <li class="nav-item">
        <a class="nav-link" href="#">Contact</a></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
      </li>
     
    </ul>
    

  </div>
  </nav>

<!-- calling cart function -->
<?php
cart();
?>

<!-- second child -->
<nav class="navbar navbar-expand-lg alert alert-success">
  <ul class="navbar-nav me-auto font-weight-bold">
 
      <?php 
       if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome Guest</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
      </li>";
      }

      if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href='./user_login.php'>Login</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='logout.php'>Logout</a>
      </li>";
      }


      ?>
  </ul>

</nav>

<!-- third child -->

<div class="bg-light">
  <h3 class="text-center">Foodie Wonderland</h3>
  <p class="text-center">Discover a world of flavor</p>
  
</div>

<!-- fourth <child_table-->

<div class="container">
<div class="row">

<form action="" method="post">

<table class="table table-bordered text-center">

        <tbody>
          <!-- php code to display dynamic data -->
<?php  
 
 
 $get_ip_add = getIPAddress();  
 $total_price=0;
 $cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
 $result=mysqli_query($con,$cart_query);
$result_count=mysqli_num_rows($result);
if($result_count>0){

  echo "<thead>
  <tr>
      <th>Product Title</th>
      <th>Product Image</th>
      <th>Quantity</th>
      <th>Total Price</th>
     
      <th colspan='2'>Operations</th>
  </tr>
  <thead>";

 while($row=mysqli_fetch_array($result)){

   $product_id=$row['product_id'];
   $select_products="Select * from `products` where product_id='$product_id'";
   $result_products=mysqli_query($con,$select_products);
   while($row_product_price=mysqli_fetch_array($result_products)){
     $product_price=array($row_product_price['product_price']); //100,200
    $price_table=$row_product_price['product_price'];
    $product_title=$row_product_price['product_title'];
    $product_image1=$row_product_price['product_image1'];

     $product_values=array_sum($product_price); //300
     $total_price+=$product_values; //300

   



?>

            <tr>
                <td><?php echo $product_title  ?></td>
                <td><img src="./images/<?php echo $product_image1  ?>" alt=" " class="cart_img"></td>
                <td><input type="text" name="qty" class="form-input w-50"></td>
                
                <?php  
                
                $get_ip_add = getIPAddress(); 
              
                
                if(isset($_POST['update_cart'])){

                  $quantities=$_POST['qty'];
                  $update_cart="update `cart_details` set quantity=$quantities where ip_address='$get_ip_add'";

                  $result_products_quantity=mysqli_query($con,$update_cart);
                  $total_price= $total_price*$quantities; 
                  
                  //$total_price+=$price_table;
                }
                
                
                ?>

                <td><?php echo $price_table ?>/-</td>
                <!--<td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>-->
                <td>
                 
                   <input type="submit" value="Update Cart" class="bg-info px-3 py-2 border-0 mx-3 text-light" 
                   name="update_cart">
                   <!-- <button class="bg-info px-3 py-2 border-0 mx-3 text-light">Remove</button> -->
                   <input type="submit" value="Remove Cart" class="bg-info px-3 py-2 border-0 mx-3 text-light" 
                   name="remove_cart">
                </td>
            </tr>
            <?php  
            }
          }
        }
        else{
          
          echo "<div class='row justify-content-center mb-1'>
          <div class='col-md-12'>
          <h2><p class='car'>Cart is empty</p></h2>
          

          </div>
      </div>";



        }
         
            ?>
        </tbody>
    </thead>
</thead>

</table>

<!--subtotal -->

<div class="d-flex mb-5">
   <?php

$get_ip_add = getIPAddress();  
$cart_query="Select * from `cart_details` where ip_address='$get_ip_add'";
$result=mysqli_query($con,$cart_query);
$result_count=mysqli_num_rows($result);
if($result_count>0){

  echo"<h4 class='px-3'>Subtotal:<strong class='text-info'>  $total_price /-</strong></h4>
  <a href='index.php' class='bg-info px-3 py-2 border-0 mx-3 text-light' style='text-decoration: none;'>Continue Shopping</a>

  <button class='bg-secondary px-3 py-2 border-0'><a href='./users_area/checkout.php' class='text-light'  style='text-decoration: none;'>Checkout</a></button>";

}else{
  echo" <a href='index.php' class='bg-info px-3 py-2 border-0 mx-3 text-light' style='text-decoration: none;'>Continue Shopping</a>";
}

?>
   

</div>


</div>
</div>
</form>

<!--function to remove item -->

<?php 

function remove_cart_item() {
    global $con;
    if (isset($_POST['remove_cart'])) { 
        $delete_query = "DELETE FROM `cart_details`";
        $run_delete = mysqli_query($con, $delete_query);
        if ($run_delete) {
            echo "<script>window.open('cart.php','_self')</script>";
        }
    }
}

remove_cart_item();
?>


<!-- last child -->
<!-- include foter-->
<?php  include("./includes/footer.php")?>



</div>


<!-- Bootstrap js links -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
















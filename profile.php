<!--connect file -->
<?php  
include('../includes/connect.php');
include('../functions/common_function.php');
session_start();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome <?php echo $_SESSION['username'] ?></title>
    <!--!bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="../style.css">
    <style>
    .body{
        overflow-x:hidden;
    }
    .profile_img{

width:90%;
margin:auto;
display:block;
/*height:90%;*/
object-fit:contain;
}
.edit_image{
  width:100px;
  height:100px;
  object-fit:contain;
}
.welcome{
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
  line-height: 2em; /* Adjust as needed */
  animation: slideInFromLeft 1s ease forwards;
}

@keyframes slideInFromLeft {
  from {
    left: -100%;
  }
  to {
    left: 50%;
  }
}




.cor{
  line-height: 2em; /* Adjust as needed */
}
.logo {
    width: 200px; /* Adjust the width as needed */
    height: auto; /* Maintain aspect ratio */
    display: block; /* Center the image */
    margin: 0 auto; /* Center the image */
  }


   </style>
</head>
<body>
<!--navbar -->
<div class="container-fluid p-0">
    <!--first child -->

    <nav class="navbar navbar-expand-lg navbar-light alert alert-warning"> <!--bg-info for doing colors look -->
<img src="../images/logo8.png" alt="" class="logo">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse font-weight-bold" id="navbarSupportedContent"><!-- if i change id or data target it will not give any output -->
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../display_all.php">Products</a></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">My Account</a></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../offer.php">Offers</a></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="../locations.php">Our Branches</a></a>
      </li>
      <!--<li class="nav-item">
        <a class="nav-link" href="#">Contact</a></a>
      </li>-->
      <li class="nav-item">
        <a class="nav-link" href="../cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Total Price: <?php total_cart_price() ?>/-</a>
      </li>      
      
    </ul>
    <!--<form class="form-inline my-2 my-lg-0" action="../search_product.php" method="get">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
    <input type="submit" value="Search" class="btn btn-outline-light" name="search_data_product">
</form>-->

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
  <a class='nav-link 'btn btn-info' href='#'>Welcome Guest</a>
</li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link' href='#'><h1 class='welcome font-weight-bold'>Welcome To Our Foodie World  ".$_SESSION['username']."</h1></a>
</li>";
}

     /* if(!isset($_SESSION['username'])){
        echo "<li class='nav-item'>
        <a class='nav-link' href='./users_area/user_login.php'>Login</a>
      </li>";
      }else{
        echo "<li class='nav-item'>
        <a class='nav-link' href='../users_area/logout.php'>Logout</a>
      </li>";
      }
*/

      ?>



  </ul>

</nav>

<!-- third child -->

<div class="bg-light">
  <h2 class="text-center">Foodie Wonderland</h2>
  <p class="text-center">Discover a world of flavor</p>
  
</div>

<!--  fourth child -->
<div class="row">

<div class="col-md-2">
<ul class="navbar-nav bg-secondary text-center" style="height:100vh">
<li class="nav-item  bg-info">
        <a class="nav-link text-light" href="#"><h4 class="cor">Your Profile</h4></a>
      </li>
      
       <?php

      $username=$_SESSION['username'];
      $user_image="Select * from `user_table` where username='$username'";
      $user_image=mysqli_query($con,$user_image);
      $row_image=mysqli_fetch_array($user_image);
      $user_image=$row_image['user_image'];
      echo "<li class='nav-item'>
        <img src='./user_images/$user_image' class='profile_img my-4' alt=''>
      </li>";

       ?>



      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php">Pending Orders</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?edit_account">Edit Account</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?balance_check">Balance</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?Order_track">Order Track</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?share_exp">Share experience</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?review_rating">Review & Rating</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?about_us">About Us</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?privacy_policy">Privacy Policy</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?contact_us">Contact Us</a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-light" href="logout.php">Logout</a>
      </li>

</ul>

</div>

<div  class="col-md-10 text-center">
  <?php 
  if(isset($_GET['edit_account'])){
    include('edit_account.php');
  }
 
  else if(isset($_GET['my_orders'])){
    include('user_orders.php');
  }
 
  else if(isset($_GET['delete_account'])){
    include('delete_account.php');
  }
  else if(isset($_GET['about_us'])){
    include('about_us.php');
  }
  else if(isset($_GET['privacy_policy'])){
    include('privacy_policy.php');
  }
  else if(isset($_GET['contact_us'])){
    include('contact_us.php');
  }
  else if(isset($_GET['balance_check'])){
    include('balance_check.php');
  }
  else if(isset($_GET['Order_track'])){
    include('Order_track.php');
  }
  else if(isset($_GET['share_exp'])){
    include('share_exp.php');
  }
  else if(isset($_GET['review_rating'])){
    include('review_rating.php');
  }
 
  
  else{
    get_user_order_details(); 
  }
 
  ?>
  

</div>

    </div>


<!-- last child -->
<!-- include foter-->
<?php  include("../includes/footer.php")?>


</div>


<!-- Bootstrap js links -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
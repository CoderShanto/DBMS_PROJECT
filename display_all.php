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
    <title>Shopify</title>
    <!--!bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- font awesome link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css file -->
    <link rel="stylesheet" href="style.css">
    <style>

.text-primary{
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

    <nav class="navbar navbar-expand-lg navbar-light bg-warning"> <!--bg-info for doing colors look -->
<img src="./images/logo8.png" alt="" class="logo">
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
        <a class="nav-link" href="offer.php">Offers</a></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="locations.php">Our Branches</a></a>
      </li>
      

      <li class="nav-item">
        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_item() ?></sup></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Total Price: <?php total_cart_price() ?>৳</a>
      </li>
      
      
    </ul>
    <form class="form-inline my-2 my-lg-0"><!-- we get horizental rows here -->
      <input class="form-control mr-sm-2" type="search" placeholder="Search your food" aria-label="Search"><!-- in search i can edit -->
      <button class="btn btn-outline-light" type="submit">Search</button>
    </form>
  </div>
</nav>
</div>

<!-- Second child -->
<nav class="navbar navbar-expand-lg alert alert-success">
<div class="text-center">
    <!-- Your content goes here -->
    <h2 class="text-primary">Discover Our Latest Innovations</h2>
</div>
    <div class="navbar-collapse justify-content-end"> <!-- Align items to the right -->
        <ul class="navbar-nav font-weight-bold text-center">
            <?php 
                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='#'>Welcome Guest</a>
                          </li>";
                } else {
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='#'>Welcome ".$_SESSION['username']."</a>
                          </li>";
                }

                if(!isset($_SESSION['username'])){
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='./users_area/user_login.php'>Login</a>
                          </li>";
                } else {
                    echo "<li class='nav-item'>
                            <a class='nav-link' href='./users_area/logout.php'>Logout</a>
                          </li>";
                }
            ?>
        </ul>
    </div>
</nav>


<!-- third child -->

<div class="bg-light">
  <h2 class="text-center">Have a look around</h2>
 
  
</div>

<!--  fourth child -->

<div class="row px-1">
  <div class="col-md-10">
    <!-- products list -->

<div class="row">
  <!--fetching gproducts    -->
  <?php  
  // calling function
  get_all_products();
  get_unique_categories();
  get_unique_brands();
  ?>

<!-- row end-->

</div>

<!--col end-->

  </div>

  <div class="col-md-2 bg-secondary">

    <!-- brands to be displayed-->

    <ul class="navbar-nav me-auto text-center">

      <li class="nav-item bg-info text-center">
        <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>

      </li>
      <?php
      // calling function

     getbrands();

      ?>
   
    </ul>

    <!-- categories to be displayed -->

    <ul class="navbar-nav me-auto text-center">

    
   

<li class="nav-item bg-info">
  <a href="#" class="nav-link text-light"><h4>Categories</h4></a>

</li>
<?php  
   // calling function
     getcategories();
      ?>
</ul>
    <!--sidenav-->


  </div>
</div>













<!-- last child -->
<div class="bg-warning p-3 text-center">
    <p>This project is created by shanto -2024</p>
    <li class="nav-item">
        <a class="nav-link" href="admin_area/admin_login.php"><p class="text-dark">Login As Admin</p></a></a>
      </li>
</div>

</div>


<!-- Bootstrap js links -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>
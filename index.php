<!--connect file -->
<?php  
include('../includes/connect.php');
include('../functions/common_function.php');

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <!-- bootstrap css link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     
   
<!--font awesome link-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />



<!-- css file -->
<link rel="stylesheet" href="../style.css">
<style>/* edit here*/
    .admin_image{
    width: 100px;
    object-fit: contain;
}
.footer {
    position: absolute;
    bottom: 0;
    width: 100%; /* Set the width to fill the entire width of the viewport */
    text-align: center; /* Center the content horizontally */
}
.product_img{
    width:100px;
    object-fit: contain;
}
.mid{
    line-height: 2em; /* Adjust as needed */
}

</style>

</head>
<body>
<!-- navbar -->

<div class="container-fluid p-0">
    <!-- FIRST CHILD-->
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
            <img src="../images/logo8.png" alt="" class="logo">
            <nav class="navbar navbar-expand-lg">
<ul class="navbar-nav">



<?php 
session_start();
if(!isset($_SESSION['admin_name'])){
  echo "<li class='nav-item'>
  <a class='nav-link' href='#'>Welcome sir</a>
</li>";
}else{
  echo "<li class='nav-item'>
  <a class='nav-link  d-flex ' href='#'><h1 class='mid'>Welcome ".$_SESSION['admin_name']."</h1></a>
</li>";
}
?>


</ul>

</nav>

        </div>
    </nav>

    <!-- SECOND CHILD-->
    <div class="bg-light">
        <h3 class="text-center p-2">Manage Admin Details</h3>
    </div>
    <!-- 3rd child -->
    <div class="row">
        <div class="col-md-12 bg-secondary p-1 d-flex align-items-center"><!--edit here-->
            <div class="p-3"><!--edit here-->
                <a href="#"><img src="../images/red.jpg." alt="" class="admin_image"></a>
                <p class="text-light text-center">Admin Panel</p>
            </div>
            <div>
                <!-- button*10>a.nav-link.text-light.bg-info.my-1-->
                <div class="button text-center">
                    <button class="my-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button><a href="index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="index.php?list_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
                    <button><a href="index.php?list_payment" class="nav-link text-light bg-info my-1">All Payments</a></button>
                    <button><a href="index.php?list_users" class="nav-link text-light bg-info my-1">List users</a></button>
                    <button><a href="index.php?user_text" class="nav-link text-light bg-info my-1">User Text</a></button>
                    <button><a href="index.php?review_ratings" class="nav-link text-light bg-info my-1">Review & Ratings</a></button>
                    <button><a href="index.php?order_confirmed" class="nav-link text-light bg-info my-1">Order Confirmation</a></button>
                    <button><a href="edit_offer.php" class="nav-link text-light bg-info my-1">Edit Offers</a></button>
                  
                    <button><a href="../index.php" class="nav-link text-light bg-info my-1">Back Home</a></button>
                    <button><a href="admin_login.php" class="nav-link text-light bg-info my-1">Logout</a></button>
                  
                </div>
            </div>

        </div>
    </div>

    <!-- fourth child -->
<div class="container my-3">
    <?php
if(isset($_GET['insert_category'])){
    include('insert_categories.php');
}

if(isset($_GET['insert_brand'])){ // for searching edit here
    include('insert_brands.php');
}
if(isset($_GET['view_products'])){
    include('view_products.php');
}
if(isset($_GET['edit_products'])){
    include('edit_products.php');
}
if(isset($_GET['delete_product'])){
    include('delete_product.php');
}

if(isset($_GET['view_categories'])){
    include('view_categories.php');
}

if(isset($_GET['view_brands'])){
    include('view_brands.php');
}

if(isset($_GET['edit_category'])){
    include('edit_category.php');
}

if(isset($_GET['edit_brands'])){
    include('edit_brands.php');
}

if(isset($_GET['delete_category'])){
    include('delete_category.php');
}

if(isset($_GET['delete_brands'])){
    include('delete_brands.php');
}
if(isset($_GET['list_orders'])){
    include('list_orders.php');
}

if(isset($_GET['list_payment'])){
    include('list_payment.php');
}

if(isset($_GET['list_users'])){
    include('list_users.php');
}
if(isset($_GET['user_text'])){
    include('user_text.php');
}
if(isset($_GET['edit_offer'])){
    include('edit_offer.php');
}
if(isset($_GET['review_ratings'])){
    include('review_ratings.php');
}
if(isset($_GET['order_confirmed'])){
    include('order_confirmed.php');
}




    ?>
</div>



    <!-- last child -->
<!--<div class="bg-info p-3  text-center footer">
  <p>This project is designed by Shanto-2024</p>
</div> -->
<?php  include("../includes/footer.php")?>
</div>

 <!-- bootstrap js link -->
 <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
   

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>
</html>
<?php 
session_start();
require './helpers/dbConnection.php';
require './helpers/functions.php';
        require './layouts/header.php';
        require './layouts/navbar.php';

   # Fetch product Data .... 
   $product = "select * from product";
   $op  = mysqli_query($con,$product);



?>
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Shop Detail</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Shop</a></li>
                        <li class="breadcrumb-item active">Shop Detail </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Shop Detail  -->
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
            <?php 
                                                    
                while($data = mysqli_fetch_assoc($op)){
                                                                                                                                                                                                                                
            ?>  
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100" src="../Dashboard/product/uploads/<?php echo $data['image']; ?>" alt="First slide"> </div>
                        </div>
                    </div>
                </div>
        
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <h2><?php echo $data['title']; ?></h2>
                        <h5> Pound <?php echo $data['price']; ?><</h5>
                        <p class="available-stock"><span> More than 20 available / <a href="#">8 sold </a></span>
                            <p>
                                <h4>Short Description:</h4>
                                <p>
                                <?php echo $data['description']; ?>
                                </p>


                                <div class="price-box-bar">
                                    <div class="cart-and-bay-btn">
                                        <a class="btn hvr-hover" data-fancybox-close="" href="checkout.php">Buy New</a>
                                        <a class="btn hvr-hover" data-fancybox-close="" href="cart.php">Add to cart</a>
                                    </div>
                                </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </div>
    </div>
    <!-- End Cart -->
    <?php require './layouts/footer.php';?>
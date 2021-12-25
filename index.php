<?php 
session_start();

    require './helpers/dbConnection.php';
    require './helpers/functions.php';
   //require 'checkLogin.php';
    //require 'checkadmin.php';
        require './layouts/header.php';
        require './layouts/navbar.php';


    /*if(isset($_SESSION['role_id']) == 1 ){
       require './layouts/header.php';
    }elseif(isset($_SESSION['role_id']) != 1){
        require './layouts/userheader.php';
    }*/

    # Fetch category Data .... 
    $category = "select * from category";
    $op  = mysqli_query($con,$category);

    # Fetch product Data .... 
    $product = "select * from product";
    $op1  = mysqli_query($con,$product);





?>

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="images/b1.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>أهلا بك في  <br> سوق الفيروز</strong></h1>
                            <p class="m-b-40">يقدم لكم سوق الفيروز عدد من المنتجات السيناوية <br>
                            ذات الجودة العالية و الخامات المتميزة</p>
                            <p><a class="btn hvr-hover" >استمتع الان بالتسوق</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/b2.jpg" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>أهلا بك في  <br> سوق الفيروز</strong></h1>
                            <p class="m-b-40">يقدم لكم سوق الفيروز عدد من المنتجات السيناوية <br>
                            ذات الجودة العالية و الخامات المتميزة</p>
                            <p><a class="btn hvr-hover" >استمتع الان بالتسوق</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!-- End Slider -->

    <!-- Start Categories  -->
    <div class="categories-shop">

        <div class="container">
                <p style="text-align: center;font-size: x-large;font-weight: bold;">الاقسام</p> <br> <hr>
            <div class="row">
                    <?php 
                                                        
                        while($data = mysqli_fetch_assoc($op)){                                                                    
                    ?>
                        <div class="shop-cat-box">
                            <img class="img-fluid" src="../Dashboard/category/uploads/<?php echo $data['image']; ?>" alt="" />
                            <a class="btn hvr-hover" href="#"><?php echo $data['title']; ?></a>
                        </div>
                    <?php } ?>
            </div>
        </div>
    </div>
    <!-- End Categories -->

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>منتجاتنا المميزة</h1>
                        <p>نقدم لكم مجموعة متميزة من المنتجات السيناوية</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">الكل</button>
                            <button data-filter=".top-featured">الاكثر مبيعاً</button>
                            <button data-filter=".best-seller">العروض</button>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
            <?php 
                                                    
                                                    while($data = mysqli_fetch_assoc($op1)){
                                                                                                                                                                                                                                
                                                ?>  
                <div class="col-lg-4 col-md-8 special-grid best-seller" style="position: initial; left: 0px; top: 0px;">
  

                        <div class="card" style="width: 18rem;">
                            <img src="../Dashboard/product/uploads/<?php echo $data['image']; ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h3 class="card-title"><?php echo $data['name']; ?></h3>
                                <p class="card-text"><?php echo $data['description']; ?></p>
                                <p class="card-text"><?php echo $data['price']; ?></p>
                                <a href="cart.php" class="btn btn-primary">أضف الي السلة</a>
                            </div>
                        </div>
                   
                </div>
                <?php } ?>
            </div>
            
        </div>
    </div>
    <!-- End Products  -->



    <?php 
               
        require './layouts/footer.php';
    ?>
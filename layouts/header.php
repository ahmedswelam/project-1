<?php 
//print_r($_SESSION);
    require './helpers/dbConnection.php';

    $sql = "SELECT * FROM roles";
    $op = mysqli_query($con,$sql);
    
    $sql = "SELECT name FROM users";
    $op = mysqli_query($con,$sql);
    $data = mysqli_fetch_assoc($op)
    

?>
<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Fairouz Website</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="./images/01.png" type="image/x-icon">
    <link rel="apple-touch-icon" href="./images/01.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="./css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/custom.css">

    <!-- sign in and up header css -->

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="text-slid-box">
                    <!-- Start offers --> 
                        <div id="offer-box" class="carouselTicker">
                            <ul class="offer-box">
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Now olive oil
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Ajwa
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT20
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 10%! Shop Now Man Sinai fashion
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> 50% - 80% off on Women Sinai fashion
                                </li>
                                <li>
                                    <i class="fab fa-opencart"></i> Off 50%! Shop Now
                                </li>
                            </ul>
                        </div>
                        <!-- End  offers -->
                    </div>
                </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      
                    <div class="our-link">
                    <?php if (empty($_SESSION['user'])) { ?>
                        <div class="our-link">
                                    <ul>
                                        <li><a href="login.php">login</a></li>
                                    </ul>
                                </div>
                    <?php }elseif ($_SESSION['user'] == 'omar') { ?>
                            <ul>
                            <li><a>Welcome <?php  echo $_SESSION['user'] ?>   </a></li>
                            <li><a href="#"><P><?php echo $_SESSION['email'] ?></P></a></li>
                            <li><a href="http://localhost/fairouz/Dashboard//users/index.php">Dashboard</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>

                        <?php }else{ ?>
                        <ul>
                            <li><a>Welcome <?php  echo $_SESSION['user'] ?>   </a></li>
                            <li><a href="cart.php"><P>My Cart</P></a></li>
                            <li><a href="my-account.php">MY Account</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                        <?php } ?>
                    </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

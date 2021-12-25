<?php 
    require './helpers/dbConnection.php';
    require './helpers/functions.php';

    require './layouts/header.php';
    require './layouts/navbar.php';


        # Fetch category Data .... 
        $product = "select * from product";
        $op  = mysqli_query($con,$product);
    



?>
    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>My Cart</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">My Cart</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
        <?php if (empty($_SESSION['user'])) { ?>
                        <div class="breadcrumb">
                                    <ul>
                                        <li><a href="login.php">login</a></li>
                                    </ul>
                                </div>
                    <?php }else{ ?>
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Images</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                            <?php 
                                            
                                                while($data = mysqli_fetch_assoc($op)){
                                            ?>
                                <tr>
                                    <td class="thumbnail-img">
                                       
                                        <img src="../Dashboard/product/uploads<?php echo $data['image']; ?>" width="45" height="45">
								
                                    </td>
                                    <td class="name-pr"><?php echo $data['name']; ?></td>
                                    <td class="price-pr">
                                        <p><?php echo $data['price']; ?></p>
                                    </td>
                                    <td class="quantity-box"><input type="number" size="4" value="1" min="0" step="1" class="c-input-text qty text"></td>
                                    <td class="total-pr">
                                            <?php                     
                                                // input numbers with arbitrary precision
                                                $num_str1 = $data['price'];
                                                $num_str2 = $data['quantity'];
                                                
                                                // calculates the multiplication of the two
                                                // numbers when $scaleVal is not specified
                                                $res = bcmul($num_str1, $num_str2);
                                                
                                                echo $res; 
                                            ?>
                                    </td>
                                    <td class="remove-pr">
                                        <a href='../Dashboard/product/delete.php?id=<?php echo $data['id']; ?>'
                                        class='btn btn-danger m-r-1em'>Delete</a>
									<i class="fas fa-times"></i>
								</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-6 col-sm-6">
                    <div class="coupon-box">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Enter your coupon code" aria-label="Coupon code" type="text">
                            <div class="input-group-append">
                                <button class="btn btn-theme" type="button">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6">
                    <div class="update-box">
                        <input value="Update Cart" type="submit">
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex">
                            <h4>Sub Total</h4>
                            <div class="ml-auto font-weight-bold"> $ 130 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 40 </div>
                        </div>
                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Coupon Discount</h4>
                            <div class="ml-auto font-weight-bold"> $ 10 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Tax</h4>
                            <div class="ml-auto font-weight-bold"> $ 2 </div>
                        </div>
                        <div class="d-flex">
                            <h4>Shipping Cost</h4>
                            <div class="ml-auto font-weight-bold"> Free </div>
                        </div>
                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Grand Total</h5>
                            <div class="ml-auto h5"> $ 388 </div>
                        </div>
                        <hr> </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="checkout.html" class="ml-auto btn hvr-hover">Checkout</a> </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <!-- End Cart -->
    <?php require './layouts/footer.php';?>
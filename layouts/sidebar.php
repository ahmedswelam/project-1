<?php 

?>
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
      <?php 
                  
                  
                  //$role_id = ['user'];
                  if(isset($_SESSION['user'])){
                      $modules = ["Category","product"];
                  }elseif(isset($_SESSION['user'])){

                      $modules = ["Users","Category","product"];
                    
                  }
      ?>
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/fairouz/home/index.php">
              <span data-feather="layers"></span>
              Home Page
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page"  href="<?php echo url('/users/index.php');?>">
              <span data-feather="home"></span>
              Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('/customer/index.php');?>">
              <span data-feather="file"></span>
              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('/product/index.php');?>">
              <span data-feather="shopping-cart"></span>
              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="users"></span>
              Orders
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo url('/category/category.php');?>">
              <span data-feather="bar-chart-2"></span>
              category
            </a>
          </li>

        </ul>

        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
          <span>Saved reports</span>
          <a class="link-secondary" href="#" aria-label="Add a new report">
            <span data-feather="plus-circle"></span>
          </a>
        </h6>
        <ul class="nav flex-column mb-2">
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Current month
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Last quarter
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Social engagement
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <span data-feather="file-text"></span>
              Year-end sale
            </a>
          </li>
        </ul>
      </div>
    </nav>

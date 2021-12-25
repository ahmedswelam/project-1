<?php 
   
    require '../helpers/dbConnection.php';
    require '../helpers/functions.php';


        # DB OP
    $sql = 'select * from category';
    $op = mysqli_query($con, $sql);


    require '../layouts/header.php';
    require '../layouts/navbar.php';
    require '../layouts/sidebar.php';

?>




<div class="container-fluid">
  <div class="row">

    
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">

                <?php 
                            
                            if(isset(['Message'])){
                              foreach(['Message'] as $key => $val){
                              echo '* '.$key.' : '.$val;
                              }
                              unset(['Message']); 
                          }else{
                          
                          ?>

                <li class="breadcrumb-item active">Dashboard/Category</li>

                <?php } ?>
            </ol>


            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table mr-1"></i>
                    Category Data
                </div>
                <div class="btn-group me-2">
                    <a href='create.php' class="btn btn-sm btn-outline-secondary">Add New category</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>name</th>
                                    <th>description</th>
                                    <th>Control</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                            
                                    while($data = mysqli_fetch_assoc($op)){
                                            
                                ?>
                                <tr>
                                    <td><?php echo $data['id']; ?></td>
                                    <td><?php echo $data['title']; ?></td>
                                    <td><?php echo $data['description']; ?></td>
                                    <td>
                                        <a href='delete.php?id=<?php echo $data['id']; ?>'
                                            class='btn btn-danger m-r-1em'>Delete</a>
                                        <a href='edit.php?id=<?php echo $data['id']; ?>'
                                            class='btn btn-primary m-r-1em'>Edit</a>
                                    </td>

                                </tr>
                                <?php } ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>
    </main>


    <?php
    
    require '../layouts/footer.php';
    ?>
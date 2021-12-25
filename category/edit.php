<?php

    require '../helpers/dbConnection.php';
    require '../helpers/functions.php';


# Get Data related to id ...... 
$id = $_GET['id'];

$sql = "select * from category where id = $id";
$op   = mysqli_query($con,$sql);

  if(mysqli_num_rows($op) == 1){

     $data = mysqli_fetch_assoc($op);
  }else{

     ['Message'] = "Access Denied";
     header("Location: ".url('category.php'));
  }






if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // CODE ......
    $title = Clean($_POST['title']);
    $description = Clean($_POST['description']);

    # Validation ......
    $errors = [];

    # Validate Name
    if (!validate($title, 1)) {
        $errors['Title'] = 'Field Required';
    }

    if (count($errors) > 0) {
        ['Message'] = $errors;
    } else {
        // db ..........

        $sql = "update  category set title = '$title', description = '$description' where id = $id";
        $op = mysqli_query($con, $sql);

        if ($op) {
            ['Message'] = ['message' => 'Raw Updated'];

            header("Location: ".url('/category/category.php'));

        } else {
            ['Message'] = ['message' => 'Error Try Again'];

        }

       
    }
}

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

                <li class="breadcrumb-item active">Dashboard/Edit category</li>

                <?php } ?>
            </ol>



            <div class="card-body">


                <div class="container">



                    <form action="edit.php?id=<?php echo $data['id']; ?>" method="post" enctype="multipart/form-data">



                    <div class="form-group">
                        <label for="exampleInputName">Title</label>
                        <input type="text" value="<?php echo $data['title']; ?>" class="form-control" id="exampleInputName" name="title" aria-describedby=""
                        placeholder="Enter Title">
                    </div>
<br>
                    <div class="form-group">
                        <label for="exampleInputName">Description</label>
                        <input type="textarea" value="<?php echo $data['description']; ?>"class="form-control" id="exampleInputName" name="description" aria-describedby=""
                        placeholder="Enter description">
                    </div>
<br>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>







                </div>
            </div>


        </div>
    </main>


    <?php
    
    require '../layouts/footer.php';
    ?>
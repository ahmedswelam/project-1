 <?php 

require '../helpers/dbConnection.php';
require '../helpers/functions.php';

# Fetch Roles Data .... 
$sql ='SELECT * FROM `product` INNER JOIN users ON product.seller_id = users.id';
$sql = "select * from category";
$op  = mysqli_query($con,$sql);



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // CODE ......

   $name = Clean($_POST['name']);
   $quantity = Clean($_POST['quantity']);
   $price = Clean($_POST['price']);
   $description = Clean($_POST['description']);
   $category_id = Clean($_POST['category']);
   $date_added = Clean($_POST['dateadded']);



   //print_r($_POST);
   //exit();
   # Validation ......
   $errors = [];

   # Validate Name
   if (!validate($name, 1)) {
       $errors['first'] = 'Field Required';
   }

    # Validate image 
    if(!validate($_FILES['image']['name'],1)){
        $errors['image'] = "Field Required";
    }else{
        
    $tmpPath    =  $_FILES['image']['tmp_name'];
    $imageName  =  $_FILES['image']['name'];
    $imageSize  =  $_FILES['image']['size'];
    $imageType  =  $_FILES['image']['type'];

    $exArray   = explode('.',$imageName);
    $extension = end($exArray);

    $FinalName = rand().time().'.'.$extension;

    $allowedExtension = ["png",'jpg'];

    if(!validate($extension,5)){
        $errors['Image'] = "Error In Extension";
    }

    }

    //print_r($errors);
    if(count($errors) > 0){
        foreach ($errors as $key => $value) {
            # code...
            echo '* '.$key.' : '.$value.'<br>';
        }
    }else{
 
     // db .......... 
 
     $desPath = './uploads/'.$FinalName;
 
     if(move_uploaded_file($tmpPath,$desPath)){
   

       // $password = md5($password);   // e10adc3949ba59abbe56e057f20f883e

              
        $sql = "INSERT INTO `product`(`id`, `name`, `category_id`, `quantity`, `price`, `description`, `image`,
         `date_added`)
         VALUES (NULL, '$name', '$category_id', '$quantity', '$price', '$description', '$FinalName', '$date_added')";

        $op  = mysqli_query($con,$sql);

         if($op){
             echo 'Data Inserted';
         }else{
             echo 'Error Try Again'.mysqli_error($con);                      
         }
       }else{
       echo 'Error In Uploading file';
       }


       if (count($errors) > 0) {
      
        ['Message']  = $errors;

    } else {

       if($op){
           $message = "Raw Inserted";
       }else{
           $message = "Error Try Again";
       }

        ['Message'] =  ["message" => $message];

    }
 
    }

}






require '../layouts/header.php';
require '../layouts/navbar.php'; 
require '../layouts/sidebar.php';
?>










          <div id="layoutSidenav_content">
          <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                  <div class="container-fluid">
                    
                    
                    
                    
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

                          <li class="breadcrumb-item active">Dashboard/Add New product</li>
                      
                      <?php } ?>
                      
                       </ol>
                       
                        <div class="btn-group me-2">
                            <a href='index.php' class="btn btn-sm btn-outline-secondary">Back to product</a>
                        </div>

               
                
                
                   
                         
                          <div class="card-body">
                        

                           <div class="container">
                              
                       
                       
                               <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                       
                    

                                                                        
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"  name="name" aria-describedby="" placeholder="Enter Product Name">
                                            <label for="floatingInput">Name</label>
                                        </div>
<br>
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"  name="quantity" aria-describedby="" placeholder="Enter Name">
                                            <label for="floatingInput">Quantity</label>
                                        </div>
<br>
                                        <div class="form-floating mb-3">
                                            <input type="number" name="price" class="form-control" id="floatingInput" placeholder="name@example.com">
                                            <label for="floatingInput">Price</label>
                                        </div>
<br>
                                        
                                        <div class="form-floating">
                                            <input type="textarea" name="description" class="form-control" id="floatingPassword" placeholder="Password">
                                            <label for="floatingPassword">Description</label>
                                        </div>
<br>
                                        <div class="form-select form-select-lg mb-3">
                                            <label for="exampleInputPassword">category</label>
                                            <select class="form-control"  name="category">
                                                <?php 
                                                    while($data = mysqli_fetch_assoc($op)){
                                                ?>   
                                                    <option value="<?php echo $data['id'];?>"><?php echo $data['title'];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>


                                        <?php echo $data['seller_id']; ?>

<br>
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="floatingInput"  name="dateadded" aria-describedby="" placeholder="Enter address">
                                            <label for="floatingInput">Date Added</label>
                                        </div>
<br>
                                        <div class="form-group">
                                            <label for="exampleInputPassword">Image</label>
                                            <input type="file"   name="image" >
                                        </div>
                                                                        
                                        <br>

                                   <button type="submit" class="btn btn-sm btn-outline-secondary">Submit</button>
                               </form>
                   

                          




                          </div>
                      </div>


                  </div>
              </main>
            
            
            <?php 
               
               require '../layouts/footer.php';
            ?>
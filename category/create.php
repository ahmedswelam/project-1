
 <?php 

require '../helpers/dbConnection.php';
require '../helpers/functions.php';

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
     
       ['Message']  = $errors;

   } else {
       // db ..........

      $sql = "insert into category (title,description) values ('$title','$description')";
      $op  = mysqli_query($con,$sql);
        
      #Search error
      //echo mysqli_error($con);
      //exit();
      if($op){
          $message = "Raw Inserted";
      }else{
          $message = "Error Try Again";
      }

       ['Message'] =  ["message" => $message];
       header("Location: ".url('/category/category.php'));
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

                          <li class="breadcrumb-item active">Dashboard/Add category</li>
                      
                      <?php } ?>
                       </ol>

               
                
                
                   
                         
                          <div class="card-body">
                        

                           <div class="container">
                              
                       
                       
                               <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                       
                       
                       
                                   <div class="form-group">
                                       <label for="exampleInputName">Title</label>
                                       <input type="text" class="form-control" id="exampleInputName" name="title" aria-describedby=""
                                           placeholder="Enter Title">
                                   </div>
                                   <br>
                                   <div class="form-group">
                                       <label for="exampleInputName">Description</label>
                                       <input type="textarea" class="form-control" id="exampleInputName" name="description" aria-describedby=""
                                           placeholder="Enter description">
                                   </div>
                                   <br>
                       
                                   <button  type="submit" class="btn btn-primary">Submit</button>
                               </form>
                   

                          




                          </div>
                      </div>


                  </div>
              </main>
            
            
            <?php 
               
               require '../layouts/footer.php';
            ?>
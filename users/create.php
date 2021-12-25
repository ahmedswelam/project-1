
 <?php 

require '../helpers/dbConnection.php';
require '../helpers/functions.php';

# Fetch Roles Data .... 
$sql = "select * from roles";
$op  = mysqli_query($con,$sql);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // CODE ......

   $name = Clean($_POST['name']);
   $email = Clean($_POST['email']);
   $password = Clean($_POST['password']);
   $phone = Clean($_POST['phone']);
   $address = Clean($_POST['address']);
   $about = Clean($_POST['aboutus']);
   $role_id = $_POST['role_id'];


   //print_r($_POST);
   //exit();
   # Validation ......
   $errors = [];

   # Validate Name
   if (!validate($name, 1)) {
       $errors['name'] = 'Field Required';
   }

   
    # Validate Email 
    if(!validate($email,1)){
        $errors['email'] = "Field Required";
    }elseif(!validate($email,2)){
    $errors['email'] = "Invalid Email Format";
    }


    # Validate Password 
    if(!validate($password,1)){
        $errors['password'] = "Field Required";
    }elseif(!validate($password,3)){
    $errors['password'] = "Length Must >= 6 chs";
    }


    # Validate dep_id  
    if(!validate($role_id,4)){
    $errors['role'] = "Invalid role";
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
   

        $password = md5($password);   // e10adc3949ba59abbe56e057f20f883e
    
        $sql = "insert into users (name,email,pass,phone,address,image,about,roles_id) values ('$name','$email','$password','$phone','$address','$FinalName','$about',$role_id)";
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
      
        $_SESSION['Message']  = $errors;

    } else {

       if($op){
           $message = "Raw Inserted";
       }else{
           $message = "Error Try Again";
       }

       $_SESSION['Message'] =  ["message" => $message];

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
                           
                             if(isset($_SESSION['Message'])){
                               foreach($_SESSION['Message'] as $key => $val){
                               echo '* '.$key.' : '.$val;
                               }
                               unset($_SESSION['Message']); 
                           }else{
                           
                           ?>

                          <li class="breadcrumb-item active">Dashboard/Add New User</li>
                      
                      <?php } ?>
                      
                       </ol>
                       
                        <div class="btn-group me-2">
                            <a href='index.php' class="btn btn-sm btn-outline-secondary">Back to Sellers</a>
                        </div>

               
                
                
                   
                         
                          <div class="card-body">
                        

                           <div class="container">
                              
                       
                       
                               <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                       
                    

                                                                        
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"  name="name" aria-describedby="" placeholder="Enter Name">
                                            <label for="floatingInput">Name</label>
                                        </div>
<br>
                                        <div class="form-floating mb-3">
                                            <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                                            <label for="floatingInput">Email address</label>
                                        </div>
<br>
                                        <div class="form-floating">
                                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                                            <label for="floatingPassword">Password</label>
                                        </div>
<br>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"  name="phone" aria-describedby="" placeholder="Enter phone">
                                            <label for="floatingInput">Phone</label>
                                        </div>
<br>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"  name="address" aria-describedby="" placeholder="Enter address">
                                            <label for="floatingInput">address</label>
                                        </div>
                                        <div class="form-select form-select-lg mb-3">
                                        <label for="exampleInputPassword">Roles</label>
                                        
                                        <select class="form-control"  name="role_id">
                                        <?php 
                                            while($data = mysqli_fetch_assoc($op)){
                                        ?>   
                                        <option value="<?php echo $data['id'];?>"><?php echo $data['title'];?></option>
                                        <?php } ?>
                                        </select>
                                        </div>

                                            <br>

                                        <div class="form-group">
                                            <label for="exampleInputPassword">Image</label>
                                            <input type="file"   name="image" >
                                        </div>
                                                                        
                                        <br>

                                        <div class="form-floating">
                                            <textarea class="form-control" name="aboutus" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                            <label for="floatingTextarea2">About us</label>
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
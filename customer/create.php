 <?php 

require '../helpers/dbConnection.php';
require '../helpers/functions.php';



if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // CODE ......

   $firstname = Clean($_POST['first']);
   $lastname = Clean($_POST['last']);
   $email = Clean($_POST['email']);
   $password = Clean($_POST['password']);
   $address = Clean($_POST['address']);
   $city = Clean($_POST['city']);
   $postal = Clean($_POST['postal']);
   $phone1 = Clean($_POST['phone1']);
   $phone2 = Clean($_POST['phone2']);
   $credit = Clean($_POST['credit']);
   $credittype = Clean($_POST['credit-type']);
   $creditdate = Clean($_POST['creditdate']);



   //print_r($_POST);
   //exit();
   # Validation ......
   $errors = [];

   # Validate Name
   if (!validate($firstname, 1)) {
       $errors['first'] = 'Field Required';
   }
   if (!validate($lastname, 1)) {
    $errors['last'] = 'Field Required';
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

              
        $sql = "INSERT INTO `customer` (`id`, `fname`, `lname`, `email`, `password`, `address`, `city`, `pcode`, `number1`, `number2`, `image`, `creditcard`, `cardtype`, `expirydate`)
         VALUES (NULL, '$firstname', '$lastname', '$email', '$password', '$address', '$city', '$postal',
          '$phone1', '$phone2', '$FinalName', '$credit', '$credittype', '$creditdate')";

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

                          <li class="breadcrumb-item active">Dashboard/Add New customer</li>
                      
                      <?php } ?>
                      
                       </ol>
                       
                        <div class="btn-group me-2">
                            <a href='index.php' class="btn btn-sm btn-outline-secondary">Back to customers</a>
                        </div>

               
                
                
                   
                         
                          <div class="card-body">
                        

                           <div class="container">
                              
                       
                       
                               <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
                       
                    

                                                                        
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"  name="first" aria-describedby="" placeholder="Enter Name">
                                            <label for="floatingInput">First name</label>
                                        </div>
<br>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"  name="last" aria-describedby="" placeholder="Enter Name">
                                            <label for="floatingInput">Last name</label>
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
                                            <input type="text" class="form-control" id="floatingInput"  name="address" aria-describedby="" placeholder="Enter address">
                                            <label for="floatingInput">address</label>
                                        </div>

<br>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"  name="city" aria-describedby="" placeholder="Enter address">
                                            <label for="floatingInput">city</label>
                                        </div>
<br>
                                         <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"  name="postal" aria-describedby="" placeholder="Enter address">
                                            <label for="floatingInput">postal code</label>
                                        </div>
<br>                                        
                                        <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"  name="phone1" aria-describedby="" placeholder="Enter address">
                                            <label for="floatingInput">phone1</label>
                                        </div>
<br>                                       <div class="form-floating mb-3">
                                            <input type="number" class="form-control" id="floatingInput"  name="phone2" aria-describedby="" placeholder="Enter phone">
                                            <label for="floatingInput">Phone2</label>
                                        </div>
<br>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"  name="credit" aria-describedby="" placeholder="Enter address">
                                            <label for="floatingInput">credit card</label>
                                        </div>
<br>
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput"  name="credit-type" aria-describedby="" placeholder="Enter address">
                                            <label for="floatingInput">credit card type</label>
                                        </div>
<br>
                                        <div class="form-floating mb-3">
                                            <input type="date" class="form-control" id="floatingInput"  name="creditdate" aria-describedby="" placeholder="Enter address">
                                            <label for="floatingInput">card expiry date</label>
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
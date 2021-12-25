<?php 
// Initialize the session
session_start();
//print_r($_SESSION);
//exit();

require './helpers/dbConnection.php';
require './helpers/functions.php';




if($_SERVER['REQUEST_METHOD'] == "POST"){

// CODE ...... 
$username = clean($_POST['username']);
$email    = Clean($_POST['email']);
$password = Clean($_POST['password']);

                           
                            
# Validation ...... 
$errors = [];

# Validate Email 
if(!validate($email,1)){
    $errors['Email'] = "Field Required";
}elseif(!validate($email,2)){
   $errors['Email'] = "Invalid Email Format";
}


 # Validate Password 
 if(!validate($password,1)){
    $errors['password'] = "Field Required";
}elseif(!validate($password,3)){
   $errors['password'] = "Length Must >= 6 chs";
}



   if(count($errors) > 0){
       foreach ($errors as $key => $value) {
           # code...
           echo '* '.$key.' : '.$value.'<br>';
       }
   }else{

    // Login Code ....... 
   $password = md5($password);

    $sql = "select name , pass , roles_id from users where 	email = '$email' and pass = '$password'";
    $op  = mysqli_query($con,$sql);
   // print_r($errors);
    //exit();
//echo mysqli_error($con);
  //exit();
    //$roles_id = "SELECT roles_id FROM users";
    //$op1      = mysqli_query($con,$roles_id);
 //   echo mysqli_error($con);
 // exit();
    if(mysqli_num_rows($op) == 1){
      $data = mysqli_fetch_assoc($op);
  
          // Store data in session variables
          $_SESSION['user'] = $username;
          $_SESSION['password'] = $password;
          $_SESSION['email'] = $email;
          $_SESSION['id'] = intval($roles_id['id']);



          //redirict
          //header("Location: ".url('/Dashboard/users/index.php'));
          header("Location: ".url('/home/index.php'));
          //echo 'welcome';
          exit;

      }else{
        //header("Location: ".url('/home/index.php'));

      }


   }


}



  
?>




<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<html>
  <head>

  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link href="./css/style1.css" rel="stylesheet">
  </head>
<body id="LoginForm">
<div class="container"> 
    <h1 class="form-heading">Admin login Form</h1>
    
    <div class="btn-group me-2">
        
        <a href='index.php' class="btn btn-sm btn-secondary">Back to Home Page</a>
    </div>
<div class="login-form">
<div class="main-div">
    <div class="panel">
   <h2>Admin Login </h2>
   <p>Please enter your email and password</p>
   </div>
   <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
        <div class="form-group">


        <input type="taxt" class="form-control" name="username" id="inputEmail" placeholder="Enter Username">

        </div>
        <div class="form-group">


            <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email Address">

        </div>

        <div class="form-group">

            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password">

        </div>
        <div class="forgot">
        <a href="reset.html">Forgot password?</a> <br>
        <a href="sellercreate.php">SignUp seller</a> <br>
        <a href="customercreate.php">SignUp Customer</a> 
       
</div>
        <button type="submit" class="btn btn-primary">Login</button>


        
    </form>

    </div>

</div>
</div></div>


</body>
</html>








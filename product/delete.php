<?php
    require '../helpers/dbConnection.php';
    require '../helpers/functions.php';

    $id = $_GET['id'];

    if(!validate($id,4)){
        $message =  'Invalid Number';
    }else{
    
       $sql = "select * from product where id = $id";
       $op   = mysqli_query($con,$sql);
    
         if(mysqli_num_rows($op) == 1){
       
     $data = mysqli_fetch_assoc($op);
    
       $sql = "delete from product where id = $id ";
       $op  = mysqli_query($con,$sql);
    
    
       if($op){
        
        unlink('./uploads/'.$data['image']); 
    
        $message = 'raw deleted';
       }else{
        $message = 'error Try Again !!!!!! ';
       }
    }else{
        $message = 'Error In User Id ';
    }
    
    }
    
       $_SESSION['Message'] = ["Message" =>  $message];
    
       //header("Location: ".url('/product/index.php'));
    
    
  


    
  require '../layouts/header.php';
  require '../layouts/navbar.php';
  require '../layouts/sidebar.php';

?>
<?php 
/// delete ...... 
require '../helpers/dbConnection.php';
require '../helpers/functions.php';


$id = $_GET['id'];


if(!validate($id,4)){
    $message =  'Invalid Number';
}else{

   $sql = "select * from category where id = $id";
   $op   = mysqli_query($con,$sql);

     if(mysqli_num_rows($op) == 1){
   
 $data = mysqli_fetch_assoc($op);

   $sql = "delete from category where id = $id ";
   $op  = mysqli_query($con,$sql);


   if($op){

    $message = 'raw deleted';
   }else{
    $message = 'error Try Again !!!!!! ';
   }
}else{
    $message = 'Error In role Id ';
}

}



['Message'] = ["Message" =>  $message];

   header("Location: ".url('/category/category.php'));


?>
<?php 
    
   
    if(!isset($_SESSION['username']['roles_id']) != 1){
        header("Location: ".url('/users/index.php'));
    }else{
        header("Location: http://localhost/fairouz/home/index.php");

    }


   

?>
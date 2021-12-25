<?php 

if(['user'] == 1){
    
    header("Location: ".url('/index.php'));
}else{
    header("Location: ".url('/logout.php'));
}

?>
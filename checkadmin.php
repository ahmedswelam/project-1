<?php 
/*
if(['username'] == 1){
    
    header("Location: ".url('/users/index.php'));
}else{
    header("Location: ".url('../home/index.php'));
}
*/

if (['username'] == 1)

{
        //do stuff here for them both admin and users

        header("Location: ".url('/users/index.php'));

}elseif (['user'] == 2) {
    # code...
    header("Location: ".url('/product/userproduct.php'));
}

?>


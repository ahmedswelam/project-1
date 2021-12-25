<?php 
 /*
 session_start();

 require './helpers/functions.php';

 session_unset();
 session_destroy();

 header("Location: ".url('/home/index.php'));
 exit();

*/
require './helpers/functions.php';
session_start();
if (isset($_SESSION['user'])) {
    # code...
    session_destroy();
    header("Location: ".url('/home/index.php'));
    exit();
}

?>
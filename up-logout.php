<?php include("include/functions.php");


setcookie('up_id', $id , time() - 2592000);
if(isset($_SESSION['up_id'])){
    unset($_SESSION['up_id']);
    session_destroy();
    header('location:up-login.php');
}
header('location:up-login.php');

?>
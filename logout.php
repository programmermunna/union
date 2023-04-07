<?php include("common/header.php");

setcookie('admin_id', $id , time() - 2592000);
if(isset($_SESSION['admin_id'])){
    unset($_SESSION['admin_id']);
    session_destroy();
    header('location:login.php');
}
header('location:login.php');
?>
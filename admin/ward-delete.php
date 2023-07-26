<?php include("../include/functions.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
    $delete_tax_holder = mysqli_query($conn,"DELETE FROM person WHERE ward=$id");
    $delete_ward = mysqli_query($conn,"DELETE FROM ward WHERE id=$id");
    if($delete_tax_holder && $delete_ward){
      $msg = "ওয়ার্ড মুছে দেওয়া সম্পুর্ন হয়েছে";
      header("location:ward.php?msg=$msg");
    }

























?>
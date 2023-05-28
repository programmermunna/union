<?php include("../include/functions.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
    $delete_tax_holder = mysqli_query($conn,"DELETE FROM person WHERE village=$id");
    $delete_village = mysqli_query($conn,"DELETE FROM village WHERE id=$id");
    if($delete_tax_holder && $delete_village){
      $msg = "গ্রাম মুছে দেওয়া সম্পুর্ন হয়েছে";
      header("location:village.php?msg=$msg");
    }

























?>
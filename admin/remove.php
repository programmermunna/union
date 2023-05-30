<?php include("../include/functions.php");
if(isset($_GET['id'])){   
    $action = $_GET['action'];
    $id = $_GET['id'];
} 
    $update = mysqli_query($conn,"UPDATE person SET obostha='$action' WHERE id=$id");
    if($update){
      $msg = "প্রতিক্রিয়া সফল হয়েছে!";
      header("location:tax-holder.php?msg=$msg");
    }

























?>
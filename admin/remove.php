<?php include("../include/functions.php");
if(isset($_GET['id'])){    
    $id = $_GET['id'];
} 
    $update = mysqli_query($conn,"UPDATE person SET obostha='বাতিল' WHERE id=$id");
    if($update){
      $msg = "সফল ভাবে মুছে দেওয়া হয়েছে!";
      header("location:tax-holder.php?msg=$msg");
    }

























?>
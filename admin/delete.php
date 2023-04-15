<?php include("../include/functions.php");
if(isset($_GET['src'])){
    $src = $_GET['src'];
    $table = $_GET['table'];
    $id = $_GET['id'];
}
    $delete = mysqli_query($conn,"DELETE FROM $table WHERE id=$id");    
    if($delete){
      $msg = "সফল ভাবে মুছে দেওয়া হয়েছে!";
      header("location:$src.php?msg=$msg");
    }

























?>
<?php include("../include/functions.php");
if(isset($_GET['src'])){
    $src = $_GET['src'];
    $table = $_GET['table'];
    $id = $_GET['id'];
}

    $union = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM unions WHERE id=$id"));
    $admin_id = $union['admin_id'];

    $delete_person = mysqli_query($conn,"DELETE FROM tax_holder WHERE admin_id=$admin_id");
    $delete_ward = mysqli_query($conn,"DELETE FROM ward WHERE admin_id=$admin_id");
    $delete_union = mysqli_query($conn,"DELETE FROM unions WHERE id=$id");

    if($delete_ward && $delete_person && $delete_union){
      $msg = "মুছে দেওয়া সফল হয়েছে";
      header("location:$src.php?msg=$msg");
    }

























?>
<?php include("../include/functions.php");
if(isset($_GET['src'])){
    $src = $_GET['src'];
    $table = $_GET['table'];
    $id = $_GET['id'];
}

    $union = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM union_name WHERE id=$id"));
    $admin_id = $union['admin_id'];

    $delete_village = mysqli_query($conn,"DELETE FROM village WHERE admin_id=$admin_id");
    $delete_person = mysqli_query($conn,"DELETE FROM person WHERE admin_id=$admin_id");
    $delete_union = mysqli_query($conn,"DELETE FROM union_name WHERE id=$id");

    if($delete_village && $delete_person && $delete_union){
      $msg = "মুছে দেওয়া সফল হয়েছে";
      header("location:$src.php?msg=$msg");
    }

























?>
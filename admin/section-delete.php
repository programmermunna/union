<?php include("../include/functions.php");
if(isset($_GET['id'])){
    $id = $_GET['id'];
}
    $delete_tax_holder = mysqli_query($conn,"DELETE FROM person WHERE section=$id");
    $delete_section = mysqli_query($conn,"DELETE FROM section WHERE id=$id");
    if($delete_tax_holder && $delete_section){
      $msg = "পাড়া/মহল্লা মুছে দেওয়া সফল হয়েছে";
      header("location:section.php?msg=$msg");
    }

























?>
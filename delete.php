<?php include("include/functions.php");

if (isset($_GET['src'])) {
  $src = $_GET['src'];
  $table = $_GET['table'];
  $id = $_GET['id'];
}
// $delete = mysqli_query($conn, "DELETE FROM $table WHERE id='$id'");
$update = mysqli_query($conn, "UPDATE $table SET obostha='বাতিল' WHERE id=$id");
if($update){
  header("location:$src.php?msg=তথ্যটি বাতিল করা হয়েছে");
}else{
  header("location:$src.php?err=কোনো ত্রুটি হয়েছে। দয়া করে আবার চেষ্টা করুন");

}


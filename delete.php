<?php include("include/functions.php");

if (isset($_GET['src'])) {
  $src = $_GET['src'];
  $table = $_GET['table'];
  $id = $_GET['id'];
}
$delete = mysqli_query($conn, "DELETE FROM $table WHERE id='$id'");
if($delete){
  header("location:$src.php?msg=তথ্যটি মুছে দেওয়া হয়েছে");
}else{
  header("location:$src.php?err=কোনো ত্রুটি হয়েছে। দয়া করে আবার চেষ্টা করুন");

}


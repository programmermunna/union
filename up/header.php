<?php include("../include/functions.php");?>



<?php      
    // $present_year = date("Y",time());
    // $total_tax_holder = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM person WHERE up_id=$id"));
    // $pending_tax_holder = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM person WHERE up_id=$id AND present_year=$present_year AND status='Pending'"));
    // $success_tax_holder = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM person WHERE up_id=$id AND present_year=$present_year AND status='Success'"));
    // $ward = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM ward WHERE up_id=$id"));
    
    // $annual_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(annual_tax) FROM person WHERE up_id=$id"));
    // $ablable_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ablable_tax) FROM person WHERE  up_id=$id  AND status='Success'"));
    // $due_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_tax) FROM person WHERE up_id=$id AND status='Success'"));

    // $annual_tax = $annual_tax['SUM(annual_tax)'];
    // $ablable_tax = $ablable_tax['SUM(ablable_tax)'];
    // $due_tax = $due_tax['SUM(due_tax)'];
    

    // //this year data
    // $this_year_annual_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(annual_tax) FROM person WHERE up_id=$id AND present_year=$present_year"));
    // $this_year_ablable_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ablable_tax) FROM person WHERE  up_id=$id  AND status='Success' AND present_year=$present_year"));
    // $this_year_due_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_tax) FROM person WHERE up_id=$id AND status='Success' AND present_year=$present_year"));

    // $this_year_annual_tax = $this_year_annual_tax['SUM(annual_tax)'];
    // $this_year_ablable_tax = $this_year_ablable_tax['SUM(ablable_tax)'];
    // $this_year_due_tax = $this_year_due_tax['SUM(due_tax)'];

?>



<?php

if(isset($_SESSION['up_id'])){
  $up_id = $_SESSION['up_id'];  
}elseif(isset($_COOKIE['up_id'])){
  $up_id = $_COOKIE['up_id'];
}else{
  $up_id = 0;
}
if(isset($_SESSION['up_id'])){
  $up_id = $_SESSION['up_id'];
}

if($up_id<1){
  header('location:up-login.php');
}

$union = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM unions WHERE id=$up_id"));
if($union<1){
  header("location:home.php");
}

$id = $union['admin_id'];

$union_id = $union['id'];
$upazila_id = $union['upazila_id'];
$upazilas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM upazilas WHERE id=$upazila_id"));
$district_id = $upazilas['district_id'];
$districts = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM districts WHERE id=$district_id"));
$division_id = $districts['division_id'];
$divisions = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM divisions WHERE id=$division_id"));

if(isset($_GET['session_destroy'])){
  $reload = $_GET['reload'];
  if($_GET['session_destroy'] == 'true'){
      unset($_SESSION['union']);
      unset($_SESSION['ward']);
      header("location:$page_name");
  }
}

//union Year
if(isset($_GET['year'])){
  $year = $_SESSION['year'] = $_GET['year'];
}

if(isset($_SESSION['year'])){
    $year = $_SESSION['year'];
}else{
    $year = $present_year;
}

//union session
if(isset($_GET['union'])){
    if(is_numeric($_GET['union']) && !empty($_GET['union'])){
      $_SESSION['union'] = $_GET['union'];
    }
}
if(isset($_SESSION['union'])){
    $sess_union = $_SESSION['union'];
}else{
    $sess_union = 0;
}

//vilage session
if(isset($_GET['ward'])){
    if(is_numeric($_GET['ward']) && !empty($_GET['ward'])){
      $_SESSION['ward'] = $_GET['ward'];
    }
}
if(isset($_SESSION['ward'])){
    $sess_ward = $_SESSION['ward'];
}else{
    $sess_ward = 0;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $union['bn_name'];?></title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/6788eb3be6.js" crossorigin="anonymous"></script>

    <link rel="icon" type="image/png" href="../upload/<?php echo $website['favicon']?>">

    <link href='https://fonts.googleapis.com/css?family=Anek Bangla' rel='stylesheet'>

    <link href="../dist/css/category.css" rel="stylesheet" />
    <link href="../dist/css/styles.css" rel="stylesheet" />
    <link href="../dist/css/up-styles.css" rel="stylesheet" />
    <link href="../dist/css/custom.css" rel="stylesheet" />
  </head>
  <body>
    <!-- Header -->
    <div class=" top_head">
    <?php echo $union['bn_name'];?>
    </div>
    <hr>
    <header class="header">
      <div class="header_nav">
      <ul>
        <li><a href="../home.php"><i class="fa-solid fa-house-chimney"></i></a>
        <li><a href="up-home.php">স্বাগতম</a>
        </li>
          <li><a href="#">হোম <i class="fa-solid fa-caret-down"></i></a>
            <ul class="nav_dropdown_link">
              <li><a href="up-dashboard.php"><img src="../upload/home.png" alt="Card Image" > সমস্ত তথ্য</a></li>
              <li><a href="up-tax-holder.php"><img src="../upload/home.png" alt="Card Image" > করদাতার তালিকা</a></li>
              <li><a href="up-tax-holder-add"><img src="../upload/home.png" alt="Card Image" > করদাতা যুক্ত করুন </a></li>
            </ul>
        </li>
          <li><a href="#">গ্রাহক <i class="fa-solid fa-caret-down"></i></a>
            <ul class="nav_dropdown_link">
              <li><a href="#"><img src="../upload/grahok.png" alt="Card Image" > খানা প্রদানের তথ্য এন্ট্রি </a></li>
              <li><a href="#"><img src="../upload/grahok.png" alt="Card Image" > অফিস/অন্যান্য প্রতিষ্ঠানের তথ্য এন্ট্রি </a></li>
              <li><a href="#"><img src="../upload/grahok.png" alt="Card Image" > সদস্যের তথ্য এন্ট্রি</a></li>
              <li><a href="up-tax-holder.php"><img src="../upload/grahok.png" alt="Card Image" > খানা প্রদানের তালিকা</a></li>
              <li><a href="#"><img src="../upload/grahok.png" alt="Card Image" > খানা প্রদানের তথ্য এডিট</a></li>
              <li><a href="#"><img src="../upload/grahok.png" alt="Card Image" > সর্বশেষ হোল্ডিং</a></li>
            </ul>
          </li>
          <li><a href="#">কর জেনারেটর <i class="fa-solid fa-caret-down"></i></a>
            <ul class="nav_dropdown_link">
            <li><a href="#"><img src="../upload/kor-genarator.png" alt="Card Image" > সিঙ্গেল কিস্তি জেনারেটর</a></li>
            <li><a href="#"><img src="../upload/kor-genarator.png" alt="Card Image" > কিস্তি জেনারেটের তালিকা </a></li>
            <li><a href="#"><img src="../upload/kor-genarator.png" alt="Card Image" >  সিঙ্গেল ধার্য এডিট</a></li>
          </ul>
          </li>
          <li><a href="#">হিসাব <i class="fa-solid fa-caret-down"></i></a>
            <ul class="nav_dropdown_link">
              <li><a href="#"><img src="../upload/hisab.png" alt="Card Image" > টাকা জমার ফর্ম </a></li>
              <li><a href="#"><img src="../upload/hisab.png" alt="Card Image" > কিস্তির টাকা ডিলিট </a></li>
              <li><a href="#"><img src="../upload/hisab.png" alt="Card Image" > ওয়ার্ড ভিক্তিক ধার্য </a></li>
              <li><a href="#"><img src="../upload/hisab.png" alt="Card Image" > ওয়ার্ড ভিত্তিক ধার্য </a></li>
              <li><a href="#"><img src="../upload/hisab.png" alt="Card Image" > অনলাইন ট্যাক্স আদ্যায়</a></li>
            </ul>
          </li>
          <li><a href="#">প্রতিবেদন <i class="fa-solid fa-caret-down"></i></a>
            <ul class="nav_dropdown_link">
              <li><a href="#"><img src="../upload/aday-bokeya.png" alt="Card Image" > প্রতিবেদন সংক্ষিপ্ত</a></li>
              <li><a href="#"><img src="../upload/aday-bokeya.png" alt="Card Image" > প্রতিবেদন বিস্তারিত </a></li>
              <li><a href="#"><img src="../upload/aday-bokeya.png" alt="Card Image" > আদায়ের তালিকা </a></li>
              <li><a href="#"><img src="../upload/aday-bokeya.png" alt="Card Image" > বকেয়া আদায়ের তালিকা</a></li>
              <li><a href="#"><img src="../upload/aday-bokeya.png" alt="Card Image" > বকেয়ার তালিকা</a></li>
              <li><a href="#"><img src="../upload/aday-bokeya.png" alt="Card Image" > আদায় রেজিস্টার</a></li>
            </ul>
          </li>
          <li><a href="#">টপলিষ্ট<i class="fa-solid fa-caret-down"></i></a>
            <ul class="nav_dropdown_link">
              <li><a href="#"><img src="../upload/dayli-posting.png" alt="Card Image" > ধার্য আদায় টপশীট</a></li>
              <li><a href="#"><img src="../upload/dayli-posting.png" alt="Card Image" > ডেইলি প্রোষ্টিং</a></li>
              <li><a href="#"><img src="../upload/dayli-posting.png" alt="Card Image" > ডেইলি পোষ্টিং টপশীট</a></li>
            </ul>
          </li>
          <li><a href="#">বিল প্রিন্ট <i class="fa-solid fa-caret-down"></i></a>
            <ul class="nav_dropdown_link">
              <li><a href="#"><img src="../upload/bill-print.png" alt="Card Image" > সমস্ত বিল প্রিন্ট</a></li>
              <li><a href="#"><img src="../upload/bill-print.png" alt="Card Image" > সিঙ্গেল বিল প্রিন্ট</a></li>
              <li><a href="#"><img src="../upload/bill-print.png" alt="Card Image" > সমস্ত বিল প্রিন্ট (পুরাতন)</a></li>
              <li><a href="#"><img src="../upload/bill-print.png" alt="Card Image" > সিঙ্গেল বিল প্রিন্ট (পুরাতন)</a></li>
              <li><a href="#"><img src="../upload/bill-print.png" alt="Card Image" > সমস্ত বিল প্রিন্ট -২</a></li>
              <li><a href="#"><img src="../upload/bill-print.png" alt="Card Image" > সিঙ্গেল বিল প্রিন্ট -২</a></li>
            </ul>
          </li>
          <li><a href="#">ট্রেড লাইসেন্স <i class="fa-solid fa-caret-down"></i>
            <ul class="nav_dropdown_link">
              <li><a href="#"><img src="../upload/tred-licence.png" alt="Card Image" > প্রতিষ্ঠানের তালিকা </a></li>
              <li><a href="#"><img src="../upload/tred-licence.png" alt="Card Image" > ফি ধার্যের তালিকা </a></li>
              <li><a href="#"><img src="../upload/tred-licence.png" alt="Card Image" > ফি আদায়ের তালিকা </a></li>
              <li><a href="#"><img src="../upload/tred-licence.png" alt="Card Image" > ফি বকেয়া তালিকা </a></li>
              <li><a href="#"><img src="../upload/tred-licence.png" alt="Card Image" > ফি জমা করুন </a></li>
              <li><a href="#"><img src="../upload/tred-licence.png" alt="Card Image" > লাইসেন্স নাম্বার লিখুন </a></li>
            </ul>
          </a>
          <li><a href="#">অন্যান্য রিপোর্ট <i class="fa-solid fa-caret-down"></i></a>
            <ul class="nav_dropdown_link">
              <li><a href="#"><img src="../upload/onnano.png" alt="Card Image" > অন্যান্য রিপোর্ট</a></li>
              <li><a href="#"><img src="../upload/onnano.png" alt="Card Image" > পেশাজীবির তালিকা </a></li>
              <li><a href="#"><img src="../upload/onnano.png" alt="Card Image" > অন্তর্বকালীন তালিকা </a></li>
              <li><a href="#"><img src="../upload/onnano.png" alt="Card Image" > পরিচয় নাগরিক সনদ</a></li>
            </ul>
          </li>
      </ul>
      </div>
      <div class="header_src">
        <form action="up-search.php">
        <input type="search" placeholder="সার্চ হোল্ডিং..............">
      </form>      
      </div>
      <div class="header_btn">
      <a href="up-logout.php">লগআউট</a>
      </div>       
    </header>
<!-- Header -->


    <!-- Main Content -->
    <main class="w-full flex bg-gray-100">
      <section class="content_wrapper">
      <div class="content">
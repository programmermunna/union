<?php include("include/functions.php");?>



<?php      
    // $present_year = date("Y",time());
    // $total_tax_holder = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM person WHERE up_id=$id"));
    // $pending_tax_holder = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM person WHERE up_id=$id AND present_year=$present_year AND status='Pending'"));
    // $success_tax_holder = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM person WHERE up_id=$id AND present_year=$present_year AND status='Success'"));
    // $village = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM village WHERE up_id=$id"));
    
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

// if($id<1){
//     header('location:up-login.php');
// }
// $union = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM union_name WHERE up_id=$id"));
// if($union<1){
//   header("location:home.php");
// }
// $union_id = $union['id'];
// $upazila_id = $union['upazila_id'];
// $upazilas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM upazilas WHERE id=$upazila_id"));
// $district_id = $upazilas['district_id'];
// $districts = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM districts WHERE id=$district_id"));
// $division_id = $districts['division_id'];
// $divisions = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM divisions WHERE id=$division_id"));

// if(isset($_GET['session_destroy'])){
//   $reload = $_GET['reload'];
//   if($_GET['session_destroy'] == 'true'){
//       unset($_SESSION['union']);
//       unset($_SESSION['village']);
//       header("location:$page_name");
//   }
// }

// //union Year
// if(isset($_GET['year'])){
//   $year = $_SESSION['year'] = $_GET['year'];
// }

// if(isset($_SESSION['year'])){
//     $year = $_SESSION['year'];
// }else{
//     $year = $present_year;
// }

// //union session
// if(isset($_GET['union'])){
//     if(is_numeric($_GET['union']) && !empty($_GET['union'])){
//       $_SESSION['union'] = $_GET['union'];
//     }
// }
// if(isset($_SESSION['union'])){
//     $sess_union = $_SESSION['union'];
// }else{
//     $sess_union = 0;
// }

// //vilage session
// if(isset($_GET['village'])){
//     if(is_numeric($_GET['village']) && !empty($_GET['village'])){
//       $_SESSION['village'] = $_GET['village'];
//     }
// }
// if(isset($_SESSION['village'])){
//     $sess_village = $_SESSION['village'];
// }else{
//     $sess_village = 0;
// }
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ইউপি লগিন</title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/6788eb3be6.js" crossorigin="anonymous"></script>

    <link rel="icon" type="image/png" href="upload/<?php echo $website['favicon']?>">

    <link href='https://fonts.googleapis.com/css?family=Anek Bangla' rel='stylesheet'>

    <link href="dist/css/category.css" rel="stylesheet" />
    <link href="dist/css/styles.css" rel="stylesheet" />
    <link href="dist/css/up-styles.css" rel="stylesheet" />
    <link href="dist/css/custom.css" rel="stylesheet" />
  </head>
  <body>
    <!-- Header -->
    <header class="header">
      <div class="header_nav">
      <ul>
        <li><a href="up-home.php">স্বাগতম</a>
        </li>
          <li><a href="#">গ্রাহক <i class="fa-solid fa-caret-down"></i></a></li>
          <li><a href="#">কর জেনারেটর <i class="fa-solid fa-caret-down"></i></a></li>
          <li><a href="#">হিসাব <i class="fa-solid fa-caret-down"></i></a></li>
          <li><a href="#">প্রতিবেদন <i class="fa-solid fa-caret-down"></i></a></li>
          <li><a href="#">টপলিষ্ট<i class="fa-solid fa-caret-down"></i></a></li>
          <li><a href="#">বিল প্রিন্ট <i class="fa-solid fa-caret-down"></i></a></li>
          <li><a href="#">ট্রেড লাইসেন্স <i class="fa-solid fa-caret-down"></i></a>
          <li><a href="#">অন্যান্য রিপোর্ট <i class="fa-solid fa-caret-down"></i></a>
            <ul>
              <li><a href="#"><img style="width:20px;" src="https://file-rajshahi.portal.gov.bd/files/sirajganj.gov.bd/front_service_box/aba89bd3_9c7a_4898_98a0_be074d2dcc3e/5a2bbe70f9b1c78579a48a4620025416.png"> <p>স্বাগতম</p></a></li>
              <li><a href="#"><img style="width:20px;" src="https://file-rajshahi.portal.gov.bd/files/sirajganj.gov.bd/front_service_box/aba89bd3_9c7a_4898_98a0_be074d2dcc3e/5a2bbe70f9b1c78579a48a4620025416.png"> <p>স্বাগতম</p></a></li>
              <li><a href="#"><img style="width:20px;" src="https://file-rajshahi.portal.gov.bd/files/sirajganj.gov.bd/front_service_box/aba89bd3_9c7a_4898_98a0_be074d2dcc3e/5a2bbe70f9b1c78579a48a4620025416.png"> <p>স্বাগতম</p></a></li>
              <li><a href="#"><img style="width:20px;" src="https://file-rajshahi.portal.gov.bd/files/sirajganj.gov.bd/front_service_box/aba89bd3_9c7a_4898_98a0_be074d2dcc3e/5a2bbe70f9b1c78579a48a4620025416.png"> <p>স্বাগতম</p></a>
            </li>
            </ul>
        </li>
      </ul>
      </div>
      <div class="header_src">
        <input type="search" placeholder="সার্চ হোল্ডিং..............">
      </div>       
      <div class="header_btn">
      <a href="up-logout.php">লগআউট</a>
      </div>       
    </header>
<!-- Header -->

    <!-- Main Content -->
    <main class="w-full flex bg-gray-100">
      <!-- Content -->
      <section class="content_wrapper">
      <div class="content">
        
      <div class="card">
        <h2 class="heading">হোম</h2>
        <div class="card-content">
          <div class="image_item">
            <img src="https://file-rajshahi.portal.gov.bd/files/sirajganj.gov.bd/front_service_box/aba89bd3_9c7a_4898_98a0_be074d2dcc3e/5a2bbe70f9b1c78579a48a4620025416.png" alt="Card Image" >
          </div>
          <ul class="link-list">
            <li><a href="#"><i class="fa-solid fa-share"></i> পাসওয়ার্ড পরিবর্তন</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> সর্বশেষ হোল্ডিং </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> সিঙ্গেল ধার্য এডিট </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> সচিব এপ্রুভ</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> সার্চ হোল্ডিং</a></li>
          </ul>
        </div>
      </div>

      <div class="card">
        <h2 class="heading">গ্রাহক</h2>
        <div class="card-content">
          <div class="image_item">
            <img src="https://file-rajshahi.portal.gov.bd/files/sirajganj.gov.bd/front_service_box/aba89bd3_9c7a_4898_98a0_be074d2dcc3e/5a2bbe70f9b1c78579a48a4620025416.png" alt="Card Image" >
          </div>
          <ul class="link-list">
            <li><a href="#"><i class="fa-solid fa-share"></i> খানা প্রদানের তথ্য এন্ট্রি </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> অফিস/অন্যান্য প্রতিষ্ঠানের তথ্য এন্ট্রি </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> সদস্যের তথ্য এন্ট্রি</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> খানা প্রদানের তালিকা</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> খানা প্রদানের তথ্য এডিট</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> সর্বশেষ হোল্ডিং</a></li>
          </ul>
        </div>
      </div>

      <div class="card">
        <h2 class="heading">কর জেনারেটর</h2>
        <div class="card-content">
          <div class="image_item">
            <img src="https://file-rajshahi.portal.gov.bd/files/sirajganj.gov.bd/front_service_box/aba89bd3_9c7a_4898_98a0_be074d2dcc3e/5a2bbe70f9b1c78579a48a4620025416.png" alt="Card Image" >
          </div>
          <ul class="link-list">
            <li><a href="#"><i class="fa-solid fa-share"></i> সিঙ্গেল কিস্তি জেনারেটর</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> কিস্তি জেনারেটের তালিকা </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i>  সিঙ্গেল ধার্য এডিট</a></li>
          </ul>
        </div>
      </div>

      <div class="card">
        <h2 class="heading">হিসাব</h2>
        <div class="card-content">
          <div class="image_item">
            <img src="https://file-rajshahi.portal.gov.bd/files/sirajganj.gov.bd/front_service_box/aba89bd3_9c7a_4898_98a0_be074d2dcc3e/5a2bbe70f9b1c78579a48a4620025416.png" alt="Card Image" >
          </div>
          <ul class="link-list">
            <li><a href="#"><i class="fa-solid fa-share"></i> টাকা জমার ফর্ম </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> কিস্তির টাকা ডিলিট </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> গ্রাম ভিক্তিক ধার্য </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> ওয়ার্ড ভিত্তিক ধার্য </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> অনলাইন ট্যাক্স আদ্যায়</a></li>
          </ul>
        </div>
      </div>

      <div class="card">
        <h2 class="heading">আদায়/বকেয়া প্রতিবেদন</h2>
        <div class="card-content">
          <div class="image_item">
            <img src="https://file-rajshahi.portal.gov.bd/files/sirajganj.gov.bd/front_service_box/aba89bd3_9c7a_4898_98a0_be074d2dcc3e/5a2bbe70f9b1c78579a48a4620025416.png" alt="Card Image" >
          </div>
          <ul class="link-list">
            <li><a href="#"><i class="fa-solid fa-share"></i> প্রতিবেদন সংক্ষিপ্ত</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> প্রতিবেদন বিস্তারিত </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> আদায়ের তালিকা </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> বকেয়া আদায়ের তালিকা</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> বকেয়ার তালিকা</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> আদায় রেজিস্টার</a></li>
          </ul>
        </div>
      </div>

      <div class="card">
        <h2 class="heading">টপলিষ্ট/ডেইলি পোষ্টিং</h2>
        <div class="card-content">
          <div class="image_item">
            <img src="https://file-rajshahi.portal.gov.bd/files/sirajganj.gov.bd/front_service_box/aba89bd3_9c7a_4898_98a0_be074d2dcc3e/5a2bbe70f9b1c78579a48a4620025416.png" alt="Card Image" >
          </div>
          <ul class="link-list">
            <li><a href="#"><i class="fa-solid fa-share"></i> ধার্য আদায় টপশীট</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> ডেইলি প্রোষ্টিং</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> ডেইলি পোষ্টিং টপশীট</a></li>
          </ul>
        </div>
      </div>

      <div class="card">
        <h2 class="heading">বিল প্রিন্ট</h2>
        <div class="card-content">
          <div class="image_item">
            <img src="https://file-rajshahi.portal.gov.bd/files/sirajganj.gov.bd/front_service_box/aba89bd3_9c7a_4898_98a0_be074d2dcc3e/5a2bbe70f9b1c78579a48a4620025416.png" alt="Card Image" >
          </div>
          <ul class="link-list">
            <li><a href="#"><i class="fa-solid fa-share"></i> সমস্ত বিল প্রিন্ট</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> সিঙ্গেল বিল প্রিন্ট</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> সমস্ত বিল প্রিন্ট (পুরাতন)</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> সিঙ্গেল বিল প্রিন্ট (পুরাতন)</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> সমস্ত বিল প্রিন্ট -২</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> সিঙ্গেল বিল প্রিন্ট -২</a></li>
          </ul>
        </div>
      </div>

      <div class="card">
        <h2 class="heading">ট্রেড লাইসেন্স</h2>
        <div class="card-content">
          <div class="image_item">
            <img src="https://file-rajshahi.portal.gov.bd/files/sirajganj.gov.bd/front_service_box/aba89bd3_9c7a_4898_98a0_be074d2dcc3e/5a2bbe70f9b1c78579a48a4620025416.png" alt="Card Image" >
          </div>
          <ul class="link-list">
            <li><a href="#"><i class="fa-solid fa-share"></i> প্রতিষ্ঠানের তালিকা </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> ফি ধার্যের তালিকা </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> ফি আদায়ের তালিকা </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> ফি বকেয়া তালিকা </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> ফি জমা করুন </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> লাইসেন্স নাম্বার লিখুন </a></li>
          </ul>
        </div>
      </div>

      <div class="card">
        <h2 class="heading">অন্যান্য</h2>
        <div class="card-content">
          <div class="image_item">
            <img src="https://file-rajshahi.portal.gov.bd/files/sirajganj.gov.bd/front_service_box/aba89bd3_9c7a_4898_98a0_be074d2dcc3e/5a2bbe70f9b1c78579a48a4620025416.png" alt="Card Image" >
          </div>
          <ul class="link-list">
            <li><a href="#"><i class="fa-solid fa-share"></i> অন্যান্য রিপোর্ট</a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> পেশাজীবির তালিকা </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> অন্তর্বকালীন তালিকা </a></li>
            <li><a href="#"><i class="fa-solid fa-share"></i> পরিচয় নাগরিক সনদ</a></li>
          </ul>
        </div>
      </div>

    </div>
    <br>
    <br>
      <div class="dev">Developer: &nbsp; &nbsp;  <a target="_blank" href="http://twinklerain.com"><i class="fa-brands fa-chrome"></i>TwinkleRain.com</a> &nbsp; &nbsp; <a href="tel:+8801938031025"><i class="fa-solid fa-phone"></i> +8801938031025</a></div>
      </section>
      <!-- Content -->
    </main>

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->


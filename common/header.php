<?php include("include/functions.php");?>
<?php

if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];  
}elseif(isset($_COOKIE['admin_id'])){
  $id = $_COOKIE['admin_id'];
}else{
  $id = 0;
}
if(isset($_SESSION['admin_id'])){
  $id = $_SESSION['admin_id'];
}
if($id<1){
    header('location:home.php');
}
$union = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM union_name WHERE admin_id=$id"));
// if($union<1){
//   header("location:home.php");
// }
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
      unset($_SESSION['village']);
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
    $year_left = 86400*365;
    $year_cal = $time-$year_left;
    $year = date("Y",$year_cal) ." - ". date("Y",time());
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
if(isset($_GET['village'])){
    if(is_numeric($_GET['village']) && !empty($_GET['village'])){
      $_SESSION['village'] = $_GET['village'];
    }
}
if(isset($_SESSION['village'])){
    $sess_village = $_SESSION['village'];
}else{
    $sess_village = 0;
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $website['name']?>-<?php echo $union['bn_name']?></title>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://kit.fontawesome.com/6788eb3be6.js" crossorigin="anonymous"></script>

    <link rel="icon" type="image/png" href="upload/<?php echo $website['favicon']?>">

    <link href='https://fonts.googleapis.com/css?family=Anek Bangla' rel='stylesheet'>

    <link href="dist/css/category.css" rel="stylesheet" />
    <link href="dist/css/styles.css" rel="stylesheet" />
    <link href="dist/css/custom.css" rel="stylesheet" />
  </head>
  <body>
    <!-- Header -->
    <header class="header">
    <div id="popup_message"></div>
      <div class="header_container">
        <div class="header_left">
          <!-- LOGO -->
          <div class="header_brand">
            <a href="index.php" class="go_home">
              <div>
                <?php if($website['logo']=""){ ?>               
                  <img style="width:150px;height:50px" src="upload/<?php echo $website['logo'];?>" alt="">
                 <?php }else{ ?>                  
                  <span style="font-size:18px;color:#fff;"><?php echo $union['bn_name']?></span>
               <?php  } ?>
              </div>
            </a>
          </div>

          <button onclick="toggle_nav()" class="menu_icon"></button>
            <hidden id="search_toggle"></hidden>       
        </div>

        <div class="header_right">
          <button onclick="toggle_full_screen()" class="expand_icon"></button>
        </div>
      </div>
    </header>
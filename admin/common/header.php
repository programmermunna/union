<?php include('../include/functions.php');

if(isset($_SESSION['super_admin_id'])){
   $id = $_SESSION['super_admin_id'];
   $getUser = "SELECT * FROM super_admin WHERE id='$id'";
   $userQuery = mysqli_query($conn,$getUser);
   $user = mysqli_fetch_assoc($userQuery);   
}elseif(isset($_COOKIE['super_admin_id'])){
  $id = $_COOKIE['super_admin_id'];
}else{
  $id = 0;
}
if(isset($_SESSION['super_admin_id'])){
  $id = $_SESSION['super_admin_id'];
}
if($id<1){
  header('location:login.php');
}
$admin = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM super_admin WHERE id=1"));

if(isset($_GET['session_destroy'])){
  $reload = $_GET['reload'];
  if($_GET['session_destroy'] == 'true'){
      unset($_SESSION['division']);
      unset($_SESSION['district']);
      unset($_SESSION['upazila']);
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

//union division
if(isset($_GET['division'])){
    if(is_numeric($_GET['division']) && !empty($_GET['division'])){
      $_SESSION['division'] = $_GET['division'];
    }
}
if(isset($_SESSION['division'])){
    $sess_division = $_SESSION['division'];
}else{
    $sess_division = 0;
}

//union district
if(isset($_GET['district'])){
    if(is_numeric($_GET['district']) && !empty($_GET['district'])){
      $_SESSION['district'] = $_GET['district'];
    }
}
if(isset($_SESSION['district'])){
    $sess_district = $_SESSION['district'];
}else{
    $sess_district = 0;
}

//vilage upazila
if(isset($_GET['upazila'])){
    if(is_numeric($_GET['upazila']) && !empty($_GET['upazila'])){
      $_SESSION['upazila'] = $_GET['upazila'];
    }
}
if(isset($_SESSION['upazila'])){
    $sess_upazila = $_SESSION['upazila'];
}else{
    $sess_upazila = 0;
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
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../upload/<?php echo $website['favicon']?>">
  <title><?php echo $website['name']?></title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <!-- SUMMERNOTE TEXTAREA -->
  <script src="https://code.jquery.com/jquery-3.2.1.js" crossorigin="anonymous"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js" crossorigin="anonymous"></script>    
  <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet" />

  <!-- CSS Files -->
  <link id="pagestyle" href="assets/css/material-dashboard.css?v=3.0.0" rel="stylesheet" />
  <link rel="stylesheet" href="../landing-dist/css/slicknav.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/custom.css">
</head>
<body class="g-sidenav-show  bg-gray-200">


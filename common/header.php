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
    header('location:logout.php');
}


$union = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM union_name WHERE admin_id=$id"));
if($union<1){
  header("location:home.php");
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php echo $website['name']?></title>

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
                <?php if($website['logo']!=""){ ?>               
                  <img style="width:150px;height:50px" src="upload/<?php echo $website['logo'];?>" alt="">
                 <?php }else{ ?>                  
                  <span style="font-size:18px;color:#fff;"><?php echo $union['union_name']?></span>
               <?php  } ?>
              </div>
            </a>
          </div>

          <button onclick="toggle_nav()" class="menu_icon"></button>
            <hidden id="search_toggle"></hidden>       
        </div>

        <div class="header_right">
          <button onclick="toggle_full_screen()" class="expand_icon"></button>
          <a style="color:#fff" href="logout.php">Logout</a>

        </div>
      </div>
    </header>
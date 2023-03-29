<?php include("include/functions.php");?>
<?php
if(isset($_SESSION['landing_id'])){
   $landing_id = $_SESSION['landing_id'];  
}elseif(isset($_COOKIE['landing_id'])){
 $landing_id = $_COOKIE['landing_id'];
}else{
  $landing_id = 0;
}



$user_info = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE id=$landing_id"));
$order_info = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM orders WHERE user_id=$landing_id"));
$setting = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM website_setting"));
$product = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM product_setting"));
$pages = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pages"));
$mail = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM mail_setting WHERE id=1"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $setting['name']?></title>

    <meta charset="UTF-8">
    <meta name="author" content="<?php echo $setting['author']?>">
    <meta name="keywords" content="<?php echo $setting['keywords']?>">
    <meta name="description" content="<?php echo $setting['description']?>">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="HandheldFriendly" content="true" />

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://kit.fontawesome.com/6788eb3be6.js" crossorigin="anonymous"></script>  

    <link rel="icon" type="image/png" href="upload/<?php echo $setting['favicon']?>">
    <link rel="stylesheet" href="https://fonts.maateen.me/mukti/font.css">

    <link rel="stylesheet" href="landing-dist/css/style.css">
    <link rel="stylesheet" href="landing-dist/css/slicknav.css">
    <link rel="stylesheet" href="landing-dist/css/custom.css">
</head>
<body class="is-boxed has-animations">
    <div class="body-wrap">
    <header class="site-header">
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <div class="logo">
                            <a href="home.php">
                                <?php if(!empty($setting['logo'])){?>
                                <div class="logo_img"><img src="upload/<?php echo $setting['logo'];?>"></div>
                                <?php }else{?>
                                <div class="logo_text" ><a href="home.php"><?php echo $setting['name'];?></div>
                                <?php }?>
                            </a>
                        </div>

                        <div class="nav">
                            <?php
                            $check = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_info WHERE id=$landing_id"));
                            if($check>0){ ?>
                            <ul id="menu">
                                <li><a href="home.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="terms.php">Terms</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="my-account.php">My Account</a></li>
                                <li><a href="user-logout.php">Logout</a></li>
                                <?php 
                                $renew_check = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM orders WHERE user_id=$landing_id AND status='Success'"));
                                if($renew_check){ ?>
                                <li><a class="header-last-itme" target="_blank" href="login.php">Dashboard</a></li>
                                <?php   }else{?>
                                    <li><a class="header-last-itme" href="order.php">Buy now</a></li>
                                <?php }?>
                            </ul>
                          <?php  }else{?>
                            <ul>
                                <li><a href="home.php">Home</a></li>
                                <li><a href="about.php">About</a></li>
                                <li><a href="terms.php">Terms</a></li>
                                <li><a href="contact.php">Contact</a></li>
                                <li><a href="user-login.php">Login</a></li>
                                <li><a href="user-signin.php">Sign In</a></li>                                
                                <li><a class="header-last-itme" href="order.php">Buy now</a></li>
                            </ul>
                            <?php }?>
                        </div>                        
                    </div>
                </div>
            </div>
        </header>

<script>
	$(function(){
		$('#menu').slicknav();
	});
</script>
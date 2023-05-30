<?php include("include/functions.php");?>
<?php
$setting = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM website_setting"));
$pages = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM pages"));
$mail = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM mail_setting WHERE id=1"));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $setting['name']?></title>

    <meta charset="UTF-8">

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="HandheldFriendly" content="true" />

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
    <script src="https://kit.fontawesome.com/6788eb3be6.js" crossorigin="anonymous"></script>  

    <link rel="icon" type="image/png" href="upload/<?php echo $setting['favicon']?>">
    <!-- <link rel="stylesheet" href="https://fonts.maateen.me/mukti/font.css"> -->
    <!-- <link href="https://fonts.maateen.me/apona-lohit/font.css" rel="stylesheet"> -->
    <!-- <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet"> -->
    <link href='https://fonts.googleapis.com/css?family=Anek Bangla' rel='stylesheet'>

    <link rel="stylesheet" href="landing-dist/css/style.css">
    <link rel="stylesheet" href="landing-dist/css/slicknav.css">
    <link rel="stylesheet" href="landing-dist/css/home-slider.css">
    <link rel="stylesheet" href="landing-dist/css/custom.css">
    <link rel="stylesheet" href="landing-dist/css/form.css">
</head>
<body class="is-boxed has-animations">
    <div class="body-wrap header_area">
        <a class="mobile_logo" href="home.php">
            <?php if(!empty($setting['logo'])){?>
            <div><img src="upload/home-logo.png"></div>
            <?php }else{?>
            <div style="color:#fff;" class="logo_text" ><?php echo $setting['name'];?></div>
            <?php }?>
        </a>
        <div class="top_space">
            <br>
            <br>
        </div>
        <header class="site-header">            
            <div class="container">
                <div class="site-header-inner">
                    <div class="brand header-brand">
                        <div class="logo">
                            <a href="home.php">
                                <?php if(!empty($setting['logo'])){?>
                                <div><img src="upload/home-logo.png"></div>
                                <?php }else{?>
                                <div class="logo_text" ><?php echo $setting['name'];?></div>
                                <?php }?>
                            </a>
                        </div>


                        
                        <div class="nav">                                                        
                            <ul id="menu">
                                <li><a href="home.php">হোম</a></li>
                                <li><a href="about.php">আমাদের সম্পর্কে</a></li>
                                <li><a href="terms.php">নিতিমালা</a></li>
                                <li><a href="contact.php">যোগাযোগ</a></li>
                                <li><a href="admin/">এডমিন </a></li>
                                 <li><a href="login.php">লগিন</a></li>
                            </ul>     
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
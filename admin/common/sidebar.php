
<div class="header-area">
  <a class="logo" href="index.php">
      <?php 
      if(!empty($website['logo'])){ ?>
        <img style="width:50px;height:50px;position: fixed;top:0px" src="../upload/<?php echo $website['logo'];?>">          
    <?php }else{ ?>
      <span><?php echo $website['name'];?></span>
      <?php }?>
  </a>
  <ul id="menu">
    <li><a href="index.php">ড্যাশবোর্ড</a></li>
    <li><a href="division.php">বিভাগ</a></li>
    <li><a href="district.php">জেলা</a></li>
    <li><a href="upazila.php">উপজেলা</a></li>
    <li><a href="union.php">ইউনিয়ন</a></li>
    <li><a href="village.php">গ্রাম</a></li>
    <li><a href="tax-holder.php">করদাতা</a></li>
    <hr>
    <li><a href="profile.php">আমার একাউন্ট</a></li>
    <li><a href="website-setting.php">ওয়েবসাইট</a></li>
    <li><a href="page-setting.php">পেজ</a></li>
    <li><a href="mail-setting.php">মেইল</a></li>
    <li><a href="../home.php">হোম</a></li>
    <li><a href="../login.php">স্টাফ</a></li>
    <li><a href="logout.php">লগআউট</a></li>
  </ul>
</div>
  
  <script>
    $(function(){
		$('#menu').slicknav();
	});
</script>

<div class="top_space"></div>


<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a style="padding:0;padding-left:65px" class="navbar-brand m-0" href="index.php">
        <?php 
        if(!empty($website['logo'])){ ?>
          <img style="width:100px;height:100px;" src="../upload/<?php echo $website['logo'];?>">          
       <?php }else{ ?>
        <span style="font-size: 30px;" class="ms-1 font-weight-bold text-white"><?php echo $website['name'];?></span>
        <?php }?>
      </a>
    </div>
    <hr class="horizontal light mt-4 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white active bg-gradient-primary" href="index.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">ড্যাশবোর্ড</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="division.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">বিভাগ</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="district.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">জেলা</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="upazila.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">উপজেলা</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="union.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">ইউনিয়ন</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="village.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">গ্রাম</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="tax-holder.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">table_view</i>
            </div>
            <span class="nav-link-text ms-1">করদাতা</span>
          </a>
        </li>      

        <hr>
        <li class="nav-item">
          <a class="nav-link text-white " href="profile.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">আমার একাউন্ট</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="website-setting.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">ওয়েবসাইট</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="page-setting.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">পেজ</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="mail-setting.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span class="nav-link-text ms-1">মেইল</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white" href="../home.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span  class="nav-link-text ms-1">হোম</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="../login.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span  class="nav-link-text ms-1">স্টাফ</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white" href="logout.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">person</i>
            </div>
            <span  class="nav-link-text ms-1">লগআউট</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php


if(isset($_POST['submit'])){
  $name = $_POST['name'];

  $insert = mysqli_query($conn,"INSERT INTO village (admin_id,name) VALUE ($id,'$name')");
  if($insert){
    header("Location:village.php?msg=সফল ভাবে গ্রামের নাম যুক্ত হয়েছে");
  }
}
?>
    <!-- Main Content --> 
    <main class="main_content">
<!-- Side Navbar Links -->
<?php include("common/sidebar.php");?>
<!-- Side Navbar Links -->

      <!-- Page Content -->
      <section class="content_wrapper">
        <!-- Page Details Title -->
        <div class="page_details">
          <div>
            <a href="index.php" class="go_home"><small>Home</small></a>
            <small>/</small>
            <small>Admin</small>
          </div>
        </div>

        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <h1 class="add_page_title">গ্রাম যুক্ত করুন
              </h1>
          <form id="setting_form" action="" method="POST" enctype="multipart/form-data">
          <div>
              <label>গ্রামের নাম</label>
              <input type="text" name="name" class="input"/>
            </div>
            <input name="submit" class="btn submit_btn" type="submit" value="যুক্ত করুণ" />
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

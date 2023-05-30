<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
echo $union_id;
if(isset($_POST['submit'])){
  $name = $_POST['name'];

  $insert = mysqli_query($conn,"INSERT INTO village (admin_id,union_id,bn_name,time) VALUE ($id,'$union_id','$name','$time')");
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
        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <h1 class="add_page_title">গ্রাম যুক্ত করুন
              </h1>
          <form id="setting_form" action="" method="POST" enctype="multipart/form-data">
          <div>
              <label>গ্রামের নাম</label>
              <input required type="text" name="name" class="input"/>
            </div>
            <input  name="submit" class="btn submit_btn" type="submit" value="যুক্ত করুণ" />
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->


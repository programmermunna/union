<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ward WHERE id=$id"));
}

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $update = mysqli_query($conn,"UPDATE ward SET bn_name='$name' WHERE id=$id");
  if($update){
    header("Location:ward.php?msg=সফল ভাবে ওয়ার্ডের নাম সংসধন করা হয়েছে");
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
          <h1 class="add_page_title">ওয়ার্ড যুক্ত করুন
              </h1>
          <form id="setting_form" action="" method="POST" enctype="multipart/form-data">
          <div>
              <label>ওয়ার্ডের নাম</label>
              <input required type="text" name="name" class="input" value="<?php echo $data['bn_name']?>" />
            </div>
            <input name="submit" class="btn submit_btn" type="submit" value="সম্পাদন করুণ" />
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->


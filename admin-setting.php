<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php


if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];

  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"upload/$file_name");

  if(empty($file_name)){
  $sql = "UPDATE admin_info SET name='$name',email='$email' WHERE id=$id";
  }else{
  $sql = "UPDATE admin_info SET name='$name',email='$email',file='$file_name' WHERE id=$id"; 
  }
  
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "সংশোধন সফল হয়েছে";
    header("location:admin-setting.php?msg=$msg");
  }else{
    $err = "কোনো ত্রুটি হয়েছে। দয়া করে আবার চেষ্টা করুন";
    header("location:admin-setting.php?err=$err");  
  }
}else{
    $err = "কোনো ত্রুটি হয়েছে। দয়া করে আবার চেষ্টা করুন";
    header("location:admin-setting.php?err=$err");  
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
          <h1 class="add_page_title">ADMIN INFORMATIONS
              </h1>
          <form id="setting_form" action="" method="POST" enctype="multipart/form-data">
          <div>
              <label>Name</label>
              <input type="text" name="name" class="input" value="00" />
            </div>
          <div>
              <label>Email</label>
              <input type="text" name="email" class="input" value="00" />
            </div>
            <div>
              <label>Image</label>
              <input type="file" name="file" class="input"/>
            </div>
            <input name="submit" class="btn submit_btn" type="submit" value="Update" />
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->


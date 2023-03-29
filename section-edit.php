<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM section WHERE id=$id"));
  $vlg_id = $data['vlg_id'];
  $village = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM village WHERE id=$vlg_id"));
}

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $update = mysqli_query($conn,"UPDATE section SET name='$name' WHERE id=$id");
  if($update){
    header("Location:section.php?msg=সফল ভাবে গ্রামের নাম সংসধন করা হয়েছে");
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
              <select name="vlg_id" class="input">
              <option><?php echo $village['name']?></option>
              </select>
            </div>

            <div>
              <label>পাড়ার নাম</label>
              <input type="text" name="name" class="input" value="<?php echo $data['name']?>"/>
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
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

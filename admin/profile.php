<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
<?php
if(isset($_GET['src'])){
  $src = $_GET['src'];
  $id = $_GET['id'];
}

if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];

  $address = $_POST['address'];
  $old_pass = md5($_POST['old_pass']);
  $new_pass = md5($_POST['new_pass']);
  $c_pass = md5($_POST['c_pass']);
  
  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"../upload/$file_name");
  
  if(empty($file_name)){
    $file_name = $admin['file'];
  }  
  
  if($admin['pass'] == $old_pass){
    if($new_pass == $c_pass){
      $user_update = mysqli_query($conn,"UPDATE super_admin SET name='$name', email='$email', address='$address',pass='$new_pass',file='$file_name', time='$time' WHERE id=1");
    }
  }else{
    $user_update = mysqli_query($conn,"UPDATE super_admin SET name='$name', email='$email', address='$address',file='$file_name', time='$time' WHERE id=1");
  }

  


  if($user_update){
    $msg = "সংশোধন সফল হয়েছে";
    header("location:profile.php?msg=$msg");
  }
}
$user_data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM super_admin WHERE id=1"));
?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">আমার একাউন্ট</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-4">

                <div class="order-view">
                  <div class="edit">
                      <form action="" method="POST" enctype="multipart/form-data">
                        <div class="profile">
                          <div style="display:block">
                              <div>
                                <label for="name">Name</label>
                                <input name="name" type="text" value="<?php echo $user_data['name']?>">
                              </div>
                              <div>
                                <label for="email">Email</label>
                                <input name="email" type="text" value="<?php echo $user_data['email']?>">
                              </div>
                              <div>
                                <label for="address">Address</label>
                                <input name="address" type="text" value="<?php echo $user_data['address']?>">
                              </div>
                              <div>
                                <label for="address">Old Password</label>
                                <input type="password" name="old_pass" type="text" >
                              </div>
                              <div>
                                <label for="address">New Password</label>
                                <input type="password" name="new_pass" type="text" >
                              </div>
                              <div>
                                <label for="address">Confirm Password</label>
                                <input type="password" name="c_pass" type="text" >
                              </div>
                              <div>
                                <label for="address">Photo</label>
                                <input name="file" type="file">
                              </div>
                          </div>
                          <div>                            
                            <input name="submit" class="submit_btn" type="submit" value="Save">
                          </div>
                        </div>
                      </form>
                      </div>

                      <div class="view">
                        <div class="view-img">
                          <img style="width: 100%;height:auto" src="../upload/<?php echo $user_data['file']?>">
                        </div>
                        <div class="view-content">
                          <h3><?php echo strtoupper($user_data['name']);?></h3>
                          <h6><?php echo $user_data['email']?></h6>
                          <h6><?php echo $user_data['address']?></h6>
                        </div>
                      </div>
                </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  </main>  
  
  <?php include("common/footer.php")?>

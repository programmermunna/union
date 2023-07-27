<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $unions = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM unions WHERE id=$id"));
}

if(isset($_POST['submit'])){
  $union = $_POST['bn_name'];
  $old_pass = md5($_POST['old_pass']);
  $new_pass = md5($_POST['new_pass']);
  $c_pass = md5($_POST['c_pass']);

  if(empty($old_pass) || empty($new_pass) || empty($c_pass) && !empty($union)){
    $sql = "UPDATE union SET bn_name='$union' WHERE id=$id";    
  }elseif(!empty($old_pass) && !empty($new_pass) && !empty($c_pass) && !empty($union)){
    if($new_pass == $c_pass && !empty($old_pass)){
      $check = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM unions WHERE id=$id"));
      if($check){
        $sql = "UPDATE unions SET bn_name='$union' WHERE id=$id";
      }
    }
  }elseif($new_pass == $c_pass && !empty($old_pass)){
    $check = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM unions WHERE id=$id"));
  }

  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "সংশোধন সফল হয়েছে";
    header("location:union.php?msg=$msg");
  }
}


?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">ইউনিয়ন এডিট করুন</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-4">

                <div class="order-view">
                  <div class="edit">
                      <form action="" method="POST">
                        <div class="profile">
                          <div style="display:block">
                              <div>
                                <label for="name">ইউনিয়নের নাম</label>
                                <input type="text" name="unions" value="<?php echo $unions['bn_name']?>">
                              </div>
                              <div>
                                <label for="old_pass">আগের পাসওয়ার্ড</label>
                                <input name="old_pass" type="password">
                              </div>
                              <div>
                                <label for="new_pass">নতুন পাসওয়ার্ড</label>
                                <input name="new_pass" type="password">
                              </div>
                              <div>
                                <label for="c_pass">কনফার্ম পাসওয়ার্ড</label>
                                <input name="c_pass" type="password">
                              </div>
                          </div>
                          <div>                            
                            <input name="submit" class="submit_btn" type="submit" value="Save">
                          </div>
                        </div>
                      </form>
                      </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>  
  
  <?php include("common/footer.php")?>



  
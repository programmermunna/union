<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
<?php
if(isset($_GET['id'])){
  $up_id = $_GET['id'];
  $admin_up = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM admin_up WHERE id=$up_id"));
  $union_id = $admin_up['union_id'];
  $union = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM unions WHERE id=$union_id"));
}


if(isset($_POST['submit'])){
  $union_id = $_POST['union_id'];
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $password = $_POST['pass'];
  $pass = md5($_POST['pass']);
  $cpass = md5($_POST['cpass']);

  if(empty($_FILES['file']['name'])){
    $file_name = $_POST['hidden_file'];
  }else{
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"../upload/$file_name");
  }

  if($pass == $cpass){
    $sql = "UPDATE admin_up SET union_id='$union_id', name='$name', phone='$phone', address='$address', pass='$pass',password='$password',file='$file_name' WHERE id=$up_id"; 
  }else{
    $sql = "UPDATE admin_up SET union_id='$union_id', name='$name', phone='$phone', address='$address',file='$file_name' WHERE id=$up_id"; 
  }
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "সম্পাদন সফল হয়েছে।";
    header("location:up.php?msg=$msg");
  }else{
    $err = "কোনো ত্রুটি হয়েছে। দয়া করে আবার চেষ্টা করুন";
    header("location:up-add.php?err=$err");
  }  
}
?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">ইউনিয়নের তালিকা সমূহ</h6>
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
                                <label for="union">ইউনিয়নের নাম</label>
                                <select class="input" name="union_id">
                                  <?php ?> <option selected value="<?php echo $union['id'];?>"><?php echo $union['bn_name'];?></option> <?php ?>
                                  <?php $unions = mysqli_query($conn,"SELECT * FROM unions");
                                  while($union = mysqli_fetch_assoc($unions)){ ?>
                                  <option value="<?php echo $union['id']?>"><?php echo $union['bn_name']?></option>
                                  <?php  }?>
                                </select>
                              </div>
                              <div>
                                <label for="name">নাম</label>
                                <input required name="name" type="text" value="<?php echo $admin_up['name']?>">
                              </div>
                              <div>
                                <label for="phone">ফোন</label>
                                <input  name="phone" type="number" value="<?php echo $admin_up['phone']?>">
                              </div>
                              <div>
                                <label for="address">ঠিকানা</label>
                                <input  name="address" type="text" value="<?php echo $admin_up['address']?>">
                              </div>
                              <div>
                                <label>আগের পাসওয়ার্ড</label>
                                <input  disabled type="text" value="<?php echo $admin_up['password']?>">
                              </div>
                              <div>
                                <label for="pass">নতুন পাসওয়ার্ড</label>
                                <input  name="pass" type="password">
                              </div>
                              <div>
                                <label for="cpass">পুনরায় পাসওয়ার্ড</label>
                                <input  name="cpass" type="password">
                              </div>
                              <div>
                                <label for="file">ছবি যুক্ত করুন</label>
                                <input name="file" type="file">
                                <input name="hidden_file" type="hidden" value="<?php echo $admin_up['file']?>">
                                <img src="../upload/<?php echo $admin_up['file']?>" alt="">
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
  
  
  <script>

    $(".division").on("change",function(){
      var division = $(this).val();
      return opt_func("../","districts","division_id",division,".district");
      })

    
    $(".district").on("change",function(){
      var district = $(this).val();
      return opt_func("../","upazilas","district_id",district,".upazila");
      })
  </script>
  
  <?php include("common/footer.php")?>



  
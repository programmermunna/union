<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
<?php
if(isset($_POST['submit'])){
  $union = $_POST['union'];
  $ward = $_POST['ward'];

  $sql = "INSERT INTO ward (admin_id,bn_name,time) VALUE ('$union','$ward','$time')";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "ওয়ার্ড যুক্ত করা সফল হয়েছে।";
    header("location:ward-add.php?msg=$msg");
  }else{
    $err = "কোনো ত্রুটি হয়েছে। দয়া করে আবার চেষ্টা করুন";
    header("location:ward-add.php?err=$err");
  }
}
?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">ওয়ার্ড সমূহ</h6>
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
                                <label for="union_name">ইউনিয়নের নাম</label>
                                <select name="union" class="input">
                                  <?php 
                                  $unions = mysqli_query($conn,"SELECT * FROM union_name");
                                  while($union = mysqli_fetch_assoc($unions)){ ?>
                                    <option value="<?php echo $union['admin_id'];?>"><?php echo $union['bn_name'];?></option>
                                 <?php }?>
                                </select>
                              </div>
                              <div>
                                <label for="ward">ওয়ার্ডের নাম</label>
                                <input required name="ward" type="text">
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



  
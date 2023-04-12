<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
<?php
if(isset($_POST['submit'])){
  $village = $_POST['village'];
  $section = $_POST['section'];

  $sql = "INSERT INTO section (vlg_id,name) VALUE ('$village','$section')";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "পাড়া যুক্ত করা সফল হয়েছে।";
    header("location:section.php?msg=$msg");
  }else{
    $err = "Something is error";
    header("location:section.php?err=$err");
  }
}
?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">পাড়া সমূহ</h6>
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
                                <label for="village">গ্রামের নাম</label>
                                <select name="village" class="input">
                                  <?php 
                                  $villages = mysqli_query($conn,"SELECT * FROM village");
                                  while($village = mysqli_fetch_assoc($villages)){ ?>
                                    <option value="<?php echo $village['id'];?>"><?php echo $village['name'];?></option>
                                 <?php }?>
                                </select>
                              </div>
                              <div>
                                <label for="section">পাড়ার নাম</label>
                                <input required name="section" type="text">
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
  <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>



  
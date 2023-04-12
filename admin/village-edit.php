<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
<?php
if(isset($_GET['id'])){
  $vlg_id = $_GET['id'];
  $village = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM village WHERE id=$vlg_id"));
  $admin_id = $village['admin_id'];
  $union = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM union_name WHERE admin_id=$admin_id"));
}else{
  header("location:village.php");
}


if(isset($_POST['submit'])){
  $village = $_POST['village'];
  $sql = "UPDATE village SET name='$village' WHERE id=$vlg_id";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "গ্রাম যুক্ত করা সফল হয়েছে।";
    header("location:village.php?msg=$msg");
  }else{
    $err = "Something is error";
    header("location:village.php?err=$err");
  }
}




?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">গ্রাম সম্পাদন</h6>
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
                                    <option selected disabled value="<?php echo $union['admin_id'];?>"><?php echo $union['union_name'];?></option>
                                </select>
                              </div>
                              <div>
                                <label for="village">গ্রামের নাম</label>
                                <input required name="village" type="text" value="<?php echo $village['name'];?>">
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



  
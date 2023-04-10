<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <?php include("common/navbar.php")?>
<?php
if(isset($_GET['id'])){
  $sec_id = $_GET['id'];
  $section = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM section WHERE id=$sec_id"));
  $vlg_id = $section['vlg_id'];
  $village = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM village WHERE id=$vlg_id"));
}else{
  header("location:section.php");
}


if(isset($_POST['submit'])){
  $section = $_POST['section']; 
  $sql = "UPDATE section SET name='$section' WHERE id=$sec_id";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "পাড়া সম্পাদন করা সফল হয়েছে।";
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
                                <label for="village_name">গ্রামের নাম</label>
                                <select name="village" class="input">
                                    <option selected disabled value="<?php echo $village['id'];?>"><?php echo $village['name'];?></option>
                                </select>
                              </div>
                              <div>
                                <label for="section">পাড়ার নাম</label>
                                <input required name="section" type="text" value="<?php echo $section['name'];?>">
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



  
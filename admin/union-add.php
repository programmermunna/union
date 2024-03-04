<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
<?php
if(isset($_POST['submit'])){
  $division = $_POST['division'];
  $district = $_POST['district'];
  $upazila = $_POST['upazila'];
  $union = $_POST['union'];
  $admin_id = rand(1000,99999999);
  $pass = $_POST['pass'];
  $cpass = $_POST['cpass'];
  
  if($pass === $cpass && !empty($union)){
    $pass = md5($pass);
    $sql = "INSERT INTO unions (admin_id,upazila_id,bn_name,pass,time) VALUE ('$admin_id','$upazila','$union','$pass',$time)";
    $query = mysqli_query($conn,$sql);

      if($query){
        $msg = "ইউনিয়ন যুক্ত করা সফল হয়েছে।";
        header("location:union.php?msg=$msg");
      }else{
      $err = "কোনো ত্রুটি হয়েছে। দয়া করে আবার চেষ্টা করুন";
      header("location:union.php?err=$err");
    }
       
  }else{
    $err = "কোনো ত্রুটি হয়েছে। দয়া করে আবার চেষ্টা করুন";
    header("location:union.php?err=$err");
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
                      <form action="" method="POST">
                        <div class="profile">
                          <div style="display:block">
                              <div>
                                <label for="unions">বিভাগ নাম sdfdsf</label>
                                <select class="input division" name="division" id="division">
                                  <option>সিলেক্ট বিভাগ</option>
                                  <?php $divisions = mysqli_query($conn,"SELECT * FROM divisions");
                                  while($division = mysqli_fetch_assoc($divisions)){ ?>
                                  <option value="<?php echo $division['id']?>"><?php echo $division['bn_name']?></option>
                                  <?php  }?>
                                </select>
                              </div>
                              <div>
                                <label for="district">জেলা নাম</label>
                                <select class="input district" name="district" id="district">

                                </select>
                              </div>
                              <div>
                                <label for="upazila">উপজেলা নাম</label>
                                <select class="input upazila" name="upazila" id="upazila">

                                </select>
                              </div>
                              <div>
                                <label for="union">ইউনিয়নের নাম</label>
                                <input required name="union" type="text">
                              </div>
                              <div>
                                <label for="pass">পাসওয়ার্ড</label>
                                <input required name="pass" type="password">
                              </div>
                              <div>
                                <label for="cpass">পুনরায় পাসওয়ার্ড</label>
                                <input required name="cpass" type="password">
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



  
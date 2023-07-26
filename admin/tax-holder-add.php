<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
<?php

if(isset($_POST['submit'])){
  $id_no = $_POST['id_no'];
  $name = $_POST['name'];
  $guardian_name = $_POST['guardian_name'];

  $division = $_POST['division'];
  $district = $_POST['district'];
  $upazila = $_POST['upazila'];
  $union = $_POST['union'];
  $admin_id = $_POST['union'];
  $ward = $_POST['ward'];  

  $word_no = $_POST['word_no'];
  $family_member = $_POST['family_member'];
  $male = $_POST['male'];
  $female = $_POST['female'];
  $holding_no = $_POST['holding_no'];
  $nid_no = $_POST['nid_no'];
  $profession = $_POST['profession'];
  $home = $_POST['home'];  
  $net_worth = $_POST['net_worth'];
  $annual_tax = $_POST['annual_tax'];
  $ablable_tax = $_POST['ablable_tax'];
  $due_tax = $_POST['due_tax'];
  $mobile_no = $_POST['mobile_no'];

  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"../upload/$file_name");
  if(empty($file_name)){
    $file_name = "avatar.jpg";
  } 

  if( empty($id_no) || empty($name) || empty($guardian_name) || empty($division) || empty($district) || empty($upazila) || empty($union) || empty($ward) || empty($family_member) || empty($net_worth)){
    header("Location:tax-holder-add.php?err=সঠিক ভাবে ফরম পূরন করুন");
  }else{
    $sql = "INSERT INTO person (admin_id,id_no,name,guardian_name,division_id,district_id,upazila_id,union_id,ward,word_no,family_member,male,female,holding_no,nid_no,profession,home,net_worth,annual_tax,ablable_tax,due_tax,present_year,mobile_no,file_name,time) 
    VALUES ('$admin_id','$id_no','$name','$guardian_name','$division','$district','$upazila','$union','$ward','$word_no','$family_member','$male','$female','$holding_no','$nid_no','$profession','$home','$net_worth','$annual_tax','$ablable_tax','$due_tax','$present_year','$mobile_no','$file_name','$time')";
    $insert = mysqli_query($conn,$sql);
    if($insert){
      header("location:tax-holder-add.php?msg=নতুন করদাতা যুক্ত হয়েছে");
    }else{
      echo mysqli_error($conn);
    }
  }

}
?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">নতুন করদাতা যুক্ত করুণ</h6>
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
            <label>আইডি নং <span class="requird_star">*</span></label>
            <input type="number" name="id_no" class="input" required value="<?php echo rand(100,99999999);?>"/>
            </div>

            <div>
            <label>করদাতার নাম <span class="requird_star">* </span></label>
            <input type="text" name="name" class="input" required/>
            </div>

            <div>
            <label>পিতা/স্বামীর নাম <span class="requird_star">* </span></label>
            <input type="text" name="guardian_name" class="input" required/>
            </div>

            <div>
            <label>বিভাগ <span class="requird_star" >* </span></label>
            <select name="division" id="division" class="input division" required>
              <option style="display:none;" value="বাছাই করুন">বাছাই করুন</option>
              <?php 
              $divisions = mysqli_query($conn,"SELECT * FROM divisions");
              while($division = mysqli_fetch_assoc($divisions)){ ?>
                <option value="<?php echo $division['id']?>"><?php echo $division['bn_name']?></option>
             <?php }?>
            </select>
            </div>

            <div>
            <label>জেলা <span class="requird_star" >* </span></label>
            <select name="district" id="district" class="input district" required>
              <option>জেলা বাছাই করুন</option>
            </select>
            </div>

            <div>
            <label>উপজেলা <span class="requird_star" >* </span></label>
            <select name="upazila" id="upazila" class="input upazila" required>
              <option>উপজেলা বাছাই করুন</option>
            </select>
            </div>

            <div>
            <label>ইউনিয়ন <span class="requird_star" >* </span></label>
            <select name="union" id="union" class="input union" required>
              <option>ইউনিয়ন বাছাই করুন</option>
            </select>
            </div>

            <div>
            <label>ওয়ার্ড <span class="requird_star" >* </span></label>
            <select name="ward" id="ward" class="input ward" required>
              <option>ওয়ার্ড বাছাই করুন</option>
            </select>
            </div>


            <div>
            <label>ওয়ার্ড নং </label>
            <input type="text" name="word_no" class="input" />
            </div>
            
            <div>
            <label>পরিবারের সদস্য সংখ্যা <span class="requird_star">*</span></label>
            <input type="text" name="family_member" class="input"  required/>
            </div>

            <div class="radio_div">
              <div style="width:49%;float:left">
                <label>পুরুষ</label>
                <input type="text" name="male" class="input" />
              </div>
                
              <div style="width:49%;float:right">                  
                <label>মহিলা</label>
                <input type="text" name="female" class="input" />
              </div>
            </div>

            <div>
            <label>হোল্ডিং নং</label>
            <input type="text" name="holding_no" class="input" />
            </div>

            <div>
            <label>জাতীয় পরিচয়পত্র নং</label>
            <input type="text" name="nid_no" class="input" />
            </div>

            <br>
            <div class="radio_div">
              <label>পেশা <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="business">ব্যবসাঃ</label>
                <input type="radio" id="business" required name="profession" value="ব্যবসা">
              </div>
              <div class="pesa">
                <label for="job">চাকুরীঃ</label>
                <input type="radio" id="job" required name="profession" value="চাকুরি">
              </div>
              <div class="pesa">
                <label for="farmer">কৃষিঃ</label>
                <input type="radio" id="farmer" required name="profession" value="কৃষি">
              </div>
              <div class="pesa">
                <label for="labor">দিন-মজুরঃ</label>
                <input type="radio" id="labor" required name="profession" value="দিন-মজুর">
              </div>
              <div class="pesa">
                <label for="expatriate">প্রবাসীঃ</label>
                <input type="radio" id="expatriate" required name="profession" value="প্রবাসী">
              </div>
              <div class="pesa">
                <label for="worker">শ্রমিকঃ</label>
                <input type="radio" id="worker" required name="profession" value="শ্রমিক">
              </div>              
            </div>

            <hr>
            <div class="radio_div">
              <label>গৃহের বিবরন <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="kacha">কাঁচাঃ</label>
                <input type="radio" id="kacha" required name="home" value="কাঁচা">
              </div>
              
              <div class="pesa">
                <label for="paka">পাকাঃ</label>
                <input type="radio" id="paka" required name="home" value="পাকা">
              </div>
              
              <div class="pesa">
                <label for="adhapaka">আধাপাকাঃ</label>
                <input type="radio" id="adhapaka" required name="home" value="আধাপাকা">
              </div>
              
              <div class="pesa">
                <label for="building">বিল্ডিংঃ</label>
                <input type="radio" id="building" required name="home" value="বিল্ডিং">
              </div>
              
              <div class="pesa">
                <label for="tinset">টিনসেটঃ</label>
                <input type="radio" id="tinset" required name="home" value="টিনসেট">
              </div>
            </div>
            
            <br>
            <div>
            <label>স্থাপনার মুল্য <span class="requird_star">*</span></label>
            <input type="number" name="net_worth" class="input"  required/>
            </div>

            <div>
            <label>বার্ষিক কর</label>
            <input type="number" name="annual_tax" class="input" />
            </div>

            <div>
            <label>নগদ কর</label>
            <input type="number" name="ablable_tax" class="input" />
            </div>

            <div>
            <label>বকেয়া কর</label>
            <input type="number" name="due_tax" class="input"/>
            </div>

            <div>
            <label>অর্থ বছর</label>
            <input type="text" disabled class="input"  value="<?php echo $present_year;?>"/>
            </div>

            <div>
            <label>মোবাইল নং</label>
            <input type="text" name="mobile_no" class="input" />
            </div> 

            <div>
            <label>ছবি</label>
            <input type="file" name="file" class="input"  accept="image/*"/>
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

      $(".upazila").on("change",function(){
        var upazila = $(this).val();
        return opt_func("../","union_name","upazila_id",upazila,".union");
        })

      $(".union").on("change",function(){
        var upazila = $(this).val();
        return opt_func("../","ward","union_id",upazila,".ward");
        })
</script>
  
  <?php include("common/footer.php")?>



  
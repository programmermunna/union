<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
<?php


 $present_year;
if(isset($_POST['submit'])){  

  $division = $_POST['division'];
  $district = $_POST['district'];
  $upazila = $_POST['upazila'];
  $union = $_POST['union'];
  $ward = $_POST['ward']; 
  
  $wards = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ward WHERE id='$ward'"));
  $admin_id = $wards['admin_id'];

  $village = $_POST['village'];
  $holding = $_POST['holding'];
  $annual_avg_income = $_POST['annual_avg_income'];
  $tax_holder_name = $_POST['tax_holder_name'];
  $tax_holder_name_en = $_POST['tax_holder_name_en'];
  $education = $_POST['education'];
  $phone = $_POST['phone'];
  $father_hasbend_name = $_POST['father_hasbend_name'];
  $mother_name = $_POST['mother_name'];
  $date_of_birth = $_POST['date_of_birth'];
  $birth_date = $_POST['birth_date'];
  $nid_no = $_POST['nid_no'];
  $social_benifit_1 = $_POST['social_benifit_1'];
  $social_benifit_2 = $_POST['social_benifit_2'];
  $social_benifit_3 = $_POST['social_benifit_3'];
  $gender = $_POST['gender'];
  $religion = $_POST['religion'];
  $profession = $_POST['profession'];
  $nolkup = $_POST['nolkup'];
  
  $toilet = $_POST['toilet'];
  $relation_1 = $_POST['relation_1'];
  $relation_type_1 = $_POST['relation_type_1'];
  $relation_2 = $_POST['relation_2'];
  $relation_type_2 = $_POST['relation_type_2'];
  $home = $_POST['home'];
  $home_type = $_POST['home_type'];
  $home_owner = $_POST['home_owner'];
  $previous_due = $_POST['previous_due'];
  $present_tax = $_POST['present_tax'];
  $annual_rent = $_POST['annual_rent'];
  $collect_tax = $_POST['collect_tax'];
  $due_tax = $_POST['due_tax'];

  $file = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"../upload/$file");
  if(empty($file)){
    $file = "avatar.jpg";
  } 

  if( empty($ward) || empty($village) || empty($holding) || empty($annual_avg_income) || empty($tax_holder_name) || empty($tax_holder_name_en) || empty($education) || empty($phone) || empty($father_hasbend_name) || empty($mother_name) || empty($date_of_birth) || empty($gender) || empty($religion) || empty($profession) || empty($nolkup) || empty($toilet) || empty($home) || empty($home_type) || empty($home_owner)){
    header("Location:tax-holder-add.php?err=ফিল্ডগুলো ভালো করে পুরন করুন!");
  }else{
    $sql = "INSERT INTO tax_holder (admin_id,ward, village, holding, annual_avg_income, tax_holder_name, tax_holder_name_en, education, phone, father_hasbend_name, mother_name, date_of_birth, birth_date, nid_no, social_benifit_1, social_benifit_2, social_benifit_3, gender, religion, profession, nolkup, toilet, relation_1, relation_type_1, relation_2, relation_type_2, home, home_type, annual_rent, home_owner, previous_due, present_tax, collect_tax, due_tax, file, present_year, time) 
    VALUES ('$admin_id','$ward', '$village', '$holding', '$annual_avg_income', '$tax_holder_name', '$tax_holder_name_en', '$education', '$phone', '$father_hasbend_name', '$mother_name', '$date_of_birth', '$birth_date', '$nid_no', '$social_benifit_1', '$social_benifit_2', '$social_benifit_3', '$gender', '$religion', '$profession', '$nolkup', '$toilet', '$relation_1', '$relation_type_1', '$relation_2', '$relation_type_2', '$home', '$home_type', '$annual_rent', '$home_owner', '$previous_due', '$present_tax', '$collect_tax', '$due_tax', '$file', '$present_year', '$time')";
    $insert = mysqli_query($conn,$sql);
    if($insert){
      header("location:tax-holder-add.php?msg=নতুন করদাতা যুক্ত হয়েছে");
    }else{
      header("Location:tax-holder-add.php?err=ফিল্ডগুলো ভালো করে পুরন করুন!");
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
            <label>গ্রাম/পাড়া <span class="requird_star">* </span></label>
            <input type="text" name="village" required class="input" placeholder="গ্রাম/পাড়া লিখুন" />
            </div>

            <div>
            <label>হোল্ডিং নাম্বার <span class="requird_star">* </span></label>
            <input type="text" name="holding" required class="input" placeholder="20304050" />
            </div>

            <div>
            <label>বাৎসরিক গড় আয় <span class="requird_star">* </span></label>
            <input type="text" name="annual_avg_income" required class="input" placeholder="বাৎসরিক আয়" />
            </div>

            <div>
            <label>খানা প্রধানের নাম <span class="requird_star">* </span></label>
            <input type="text" name="tax_holder_name" required class="input" placeholder="খানা প্রধানের নাম লিখুন" />
            </div>

            <div>
            <label>নাম (ইংরেজীতে) <span class="requird_star">* </span></label>
            <input type="text" name="tax_holder_name_en" required class="input" placeholder="Type Name In English" />
            </div>

            <div>
            <label>শিক্ষাগত যোগ্যতা <span class="requird_star">* </span></label>
            <input type="text" name="education" required class="input" placeholder="শিক্ষাগত যোগ্যতা" />
            </div>

            <div>
            <label>মোবাইল নাম্বার <span class="requird_star">* </span></label>
            <input type="text" name="phone" required class="input" placeholder="মোবাইল নাম্বার" />
            </div>

            <div>
            <label>পিতা/স্বামীর নাম <span class="requird_star">* </span></label>
            <input type="text" name="father_hasbend_name" required class="input" placeholder="পিতা/স্বামীর নাম লিখুন" />
            </div>

            <div>
            <label>মাতার নাম <span class="requird_star">* </span></label>
            <input type="text" name="mother_name" required class="input" placeholder="মাতার নাম লিখুন" />
            </div>

            <div>
            <label>জন্ম তারিখ <span class="requird_star">* </span></label>
            <input type="text" name="date_of_birth" required class="input" placeholder="উদাঃ 21-05-2000" />
            </div>

            <div>
            <label>জন্ম নিবন্ধন </label>
            <input type="text" name="birth_date" class="input" placeholder="জন্ম নিবন্ধন লিখুন" />
            </div>

            <div>
            <label>এনআইডি নাম্বার </label>
            <input type="text" name="nid_no" class="input" placeholder="জাতীয় পরিচয় পত্র নম্বর লিখুন" />
            </div>

            <div>
            <label>সামাজিক সুবিধা </label>
            <input type="text" name="social_benifit_1" class="input"placeholder="কি ধরনের সামাজিক সুবিধা পাচ্ছেন" />
            <input type="text" name="social_benifit_2" class="input"placeholder="অন্যান্য কি ধরনের সামাজিক সুবিধা পাচ্ছেন" />
            <input type="text" name="social_benifit_3" class="input"placeholder="বর্তমানে কি ধরনের সামাজিক সুবিধা পাচ্ছেন" />
            </div>

            <br>
            <div class="radio_div">
              <label>খানা প্রধানের লিঙ্গ <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="male">পুরুষ</label>
                <input type="radio" id="male" name="gender" value="পুরুষ">
              </div>
              <div class="pesa">
                <label for="female">মহিলা </label>
                <input type="radio" id="female" name="gender" value="মহিলা">
              </div>              
              <div class="pesa">
                <label for="other1">অন্যান্য </label>
                <input type="radio" id="other1" name="gender" value="অন্যান্য">
              </div>              
            </div>
            <br><hr>

            <div class="radio_div">
              <label>খানা প্রধানের ধর্ম <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="islam">ইসলাম</label>
                <input type="radio" id="islam" name="religion" value="ইসলাম">
              </div>
              <div class="pesa">
                <label for="hindu">সনাতন (হিন্দু)  </label>
                <input type="radio" id="hindu" name="religion" value="হিন্দু">
              </div>              
              <div class="pesa">
                <label for="khirstain">খ্রিষ্টান</label>
                <input type="radio" id="khirstain" name="religion" value="খ্রিষ্টান">
              </div>              
              <div class="pesa">
                <label for="boddho">বৌদ্ধ </label>
                <input type="radio" id="boddho" name="religion" value="বৌদ্ধ">
              </div>              
              <div class="pesa">
                <label for="others2">অন্যান্য </label>
                <input type="radio" id="others2" name="religion" value="অন্যান্য">
              </div>              
            </div>
            <br><hr>

            <div class="radio_div">
              <label>পেশা <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="business">ব্যবসাঃ</label>
                <input type="radio" id="business" name="profession" value="ব্যবসা">
              </div>
              <div class="pesa">
                <label for="job">চাকুরীঃ</label>
                <input type="radio" id="job" name="profession" value="চাকুরি">
              </div>              
              <div class="pesa">
                <label for="krisi">কৃষিঃ</label>
                <input type="radio" id="krisi" name="profession" value="কৃষি">
              </div>              
              <div class="pesa">
                <label for="din_mojur">দিন-মজুরঃ </label>
                <input type="radio" id="din_mojur" name="profession" value="দিন-মজুর">
              </div>              
              <div class="pesa">
                <label for="probasi">প্রবাসীঃ </label>
                <input type="radio" id="probasi" name="profession" value="প্রবাসী">
              </div>              
              <div class="pesa">
                <label for="sromik">শ্রমিকঃ </label>
                <input type="radio" id="sromik" name="profession" value="শ্রমিক">
              </div>              
            </div>
            <br><hr>

            <div class="radio_div">
              <label>নলকুপ আছে কিনা <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="nolkum_yes">হ্যা</label>
                <input type="radio" id="nolkum_yes" name="nolkup" value="হ্যা">
              </div>
              <div class="pesa">
                <label for="nolkum_no">না </label>
                <input type="radio" id="nolkum_no" name="nolkup" value="না">
              </div>          
            </div>
            <br><hr>

            <div class="radio_div">
              <label>পায়খানার ধরন <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="toilet_paka">পাকা</label>
                <input type="radio" id="toilet_paka" name="toilet" value="পাকা">
              </div>
              <div class="pesa">
                <label for="toilet_kacha">কাঁচা</label>
                <input type="radio" id="toilet_kacha" name="toilet" value="কাঁচা">
              </div>          
              <div class="pesa">
                <label for="toilet_nai">নাই</label>
                <input type="radio" id="toilet_nai" name="toilet" value="নাই">
              </div>          
            </div>
            <br>

            <div class="radio_div">
              <div style="width:49%;float:left">
                <label>সদস্যের নাম লিখুন</label>
                <input type="text" name="relation_1" class="input" placeholder="সদস্যের নাম লিখুন" />
              </div>
                
              <div style="width:49%;float:right">                  
                <label>সদস্যের সম্পর্ক লিখুন</label>
                <select name="relation_type_1" class="input" >
                  <option value="স্বামী">স্বামী</option>
                  <option value="স্ত্রী">স্ত্রী</option>
                  <option value="বাবা">বাবা</option>
                  <option value="মা">মা</option>
                  <option value="ভাই">ভাই</option>
                  <option value="বোন">বোন</option>
                  <option value="ছেলে">ছেলে</option>
                  <option value="মেয়ে">মেয়ে</option>
                  <option value="চাচা">চাচা</option>
                  <option value="চাচি">চাচি</option>              
                </select>
              </div>
            </div>

            <div class="radio_div">
              <div style="width:49%;float:left">
                <label>সদস্যের নাম লিখুন</label>
                <input type="text" name="relation_2" class="input" placeholder="সদস্যের নাম লিখুন" />
              </div>
                
              <div style="width:49%;float:right">                  
                <label>সদস্যের সম্পর্ক লিখুন</label>
                <select name="relation_type_2" class="input" >
                  <option value="স্বামী">স্বামী</option>
                  <option value="স্ত্রী">স্ত্রী</option>
                  <option value="বাবা">বাবা</option>
                  <option value="মা">মা</option>
                  <option value="ভাই">ভাই</option>
                  <option value="বোন">বোন</option>
                  <option value="ছেলে">ছেলে</option>
                  <option value="মেয়ে">মেয়ে</option>
                  <option value="চাচা">চাচা</option>
                  <option value="চাচি">চাচি</option>              
                </select>
              </div>
            </div>

            <br>
            <div class="radio_div">
              <label>অবকাঠামোর ধরন  <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="home_kacha">কাঁচা</label>
                <input type="radio" id="home_kacha" name="home" value="ব্যবসা">
              </div>
              <div class="pesa">
                <label for="home_paka">পাকা</label>
                <input type="radio" id="home_paka" name="home" value="পাকা">
              </div>          
              <div class="pesa">
                <label for="home_adhapaka">আধাপাকা</label>
                <input type="radio" id="home_adhapaka" name="home" value="আধাপাকা">
              </div>          
              <div class="pesa">
                <label for="home_building">বিল্ডিং</label>
                <input type="radio" id="home_building" name="home" value="বিল্ডিং">
              </div>          
              <div class="pesa">
                <label for="home_tinset">টিনসেট</label>
                <input type="radio" id="home_tinset" name="home" value="টিনসেট">
              </div>          
            </div><hr>

            <br>
            <div class="radio_div">
              <label>অবকাঠামোর ধরন  <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="abasik">আবাসিক</label>
                <input type="radio" id="abasik" name="home_type" value="আবাসিক">
              </div>
              <div class="pesa">
                <label for="banijjik">বানিজ্যিক </label>
                <input type="radio" id="banijjik" name="home_type" value="বানিজ্যিক">
              </div>        
            </div>
            <br> <hr>

            <div class="radio_div">
              <label>বসবাসের ধরন <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="home_owner_own">নিজে বসবাস</label>
                <input type="radio" id="home_owner_own" name="home_owner" value="নিজে বসবাস">
              </div>
              <div class="pesa">
                <label for="home_owner_rent">ভাড়া দেওয়া </label>
                <input type="radio" id="home_owner_rent" name="home_owner" value="ভাড়া দেওয়া">
              </div>        
              <div class="pesa">
                <label for="home_owner_both">উভয় </label>
                <input type="radio" id="home_owner_both" name="home_owner" value="উভয়">
              </div>        
            </div>
            <br> 

            <div>
            <label>বাৎসরিক ভাড়া </label>
            <input type="text" name="annual_rent" class="input" placeholder="20000" />
            </div>


            <div>
            <label>পুর্বের বকেয়া </label>
            <input type="text" name="previous_due" class="input" placeholder="পুর্বের বকেয়া" />
            </div>

            <div>
            <label>বর্তমান কর  <span class="requird_star">* </span></label>
            <input type="text" name="present_tax" required class="input" placeholder="বর্তমান কর " />
            </div>

            <div>
            <label>আদায়কৃত কর </label>
            <input type="text" name="collect_tax" class="input" placeholder="আদায়কৃত কর" />
            </div>

            <div>
            <label>বকেয়া কর </label>
            <input type="text" name="due_tax" class="input" placeholder="বকেয়া কর" />
            </div>

            <div>
            <label>ছবি </label>
            <input type="file" name="file" class="input" />
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
        return opt_func("../","unions","upazila_id",upazila,".union");
        })

      $(".union").on("change",function(){
        var upazila = $(this).val();
        return opt_func("../","ward","union_id",upazila,".ward");
        })
</script>
  
  <?php include("common/footer.php")?>



  
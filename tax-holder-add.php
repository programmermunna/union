<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php

$present_year;
$admin_id = $id;
if(isset($_POST['submit'])){
  $ward = $_POST['ward'];
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
  move_uploaded_file($file_tmp,"upload/$file");
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
    <!-- Main Content -->
    <main class="main_content">
<!-- Side Navbar Links -->
<?php include("common/sidebar.php");?>
<!-- Side Navbar Links -->

      <!-- Page Content -->
      <section class="content_wrapper">
        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <div class="add_page_title">
            <span>নতুন করদাতা যুক্ত করুন</span>
          </div>
          
          <form id="edit_tax_holder_form" action="" method="POST" enctype="multipart/form-data">

            <div>
            <label>ওয়ার্ড সিলেক্ট করুন<span class="requird_star" >* </span></label>
            <select name="ward" id="ward" class="input" required>
              <option style="display:none;">নির্বাচন করুন</option>
              <?php 
              $wards = mysqli_query($conn,"SELECT * FROM ward WHERE admin_id=$id");
              while($ward = mysqli_fetch_assoc($wards)){ ?>
                <option value="<?php echo $ward['id']?>"><?php echo $ward['bn_name']?></option>
             <?php }?>
            </select>
            </div>

            <div>
            <label>গ্রাম/পাড়া</label>
            <input type="text" name="village" class="input" required placeholder="গ্রাম/পাড়া লিখুন"/>
            </div>

            <div>
            <label>হোল্ডিং নাম্বার<span class="requird_star">* </span></label>
            <input type="text" name="holding" class="input" required placeholder="20304050"/>
            </div>

            <div>
            <label>বাৎসরিক গড় আয়<span class="requird_star">* </span></label>
            <input type="text" name="annual_avg_income" class="input" required placeholder="বাৎসরিক আয়"/>
            </div>

            <div>
            <label>খানা প্রধানের নাম <span class="requird_star">* </span></label>
            <input type="text" name="tax_holder_name" class="input" required placeholder="খানা প্রধানের নাম লিখুন"/>
            </div>

            <div>
            <label>নাম (ইংরেজীতে)<span class="requird_star">* </span></label>
            <input type="text" name="tax_holder_name_en" class="input" required placeholder="Type Name In English"/>
            </div>

            <div>
            <label>শিক্ষাগত যোগ্যতা <span class="requird_star">* </span></label>
            <input type="text" name="education" class="input" required placeholder="শিক্ষাগত যোগ্যতা"/>
            </div> 

            <div>
            <label>মোবাইল নাম্বার<span class="requird_star">* </span></label>
            <input type="text" name="phone" class="input" required placeholder="মোবাইল নাম্বার"/>
            </div>

            <div>
            <label>পিতা/স্বামীর নাম <span class="requird_star">* </span></label>
            <input type="text" name="father_hasbend_name" class="input" required placeholder="পিতা/স্বামীর নাম লিখুন"/>
            </div>            

            <div>
            <label>মাতার নাম <span class="requird_star">* </span></label>
            <input type="text" name="mother_name" class="input" required placeholder="মাতার নাম লিখুন"/>
            </div>            
            
            <div>
            <label>জন্ম তারিখ <span class="requird_star">*</span></label>
            <input type="text" name="date_of_birth" class="input"  required placeholder="উদাঃ 21-05-2000"/>
            </div>
            
            <div>
            <label>জন্ম নিবন্ধন <span class="requird_star">*</span></label>
            <input type="text" name="birth_date" class="input"  required placeholder="জন্ম নিবন্ধন লিখুন"/>
            </div>            
            
            <div>
            <label>এনআইডি নাম্বার <span class="requird_star">*</span></label>
            <input type="text" name="nid_no" class="input"  required placeholder="জাতীয় পরিচয় পত্র নম্বর লিখুন"/>
            </div>

            <div>
            <label>সামাজিক সুবিধা <span class="requird_star">*</span></label>
            <input type="text" name="social_benifit_1" class="input"  required placeholder="কি ধরনের সামাজিক সুবিধা পাচ্ছেন"/>
            <input type="text" name="social_benifit_2" class="input"  required placeholder="অন্যান্য কি ধরনের সামাজিক সুবিধা পাচ্ছেন"/>
            <input type="text" name="social_benifit_3" class="input"  required placeholder="বর্তমানে কি ধরনের সামাজিক সুবিধা পাচ্ছেন"/>
            </div>

            <br>
            <div class="radio_div">
              <label>খানা প্রধানের লিঙ্গ <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="male">পুরুষ</label>
                <input type="radio" id="male" required name="gender" value="পুরুষ">
              </div>
              <div class="pesa">
                <label for="female">মহিলা</label>
                <input type="radio" id="female" required name="gender" value="মহিলা">
              </div>             
              <div class="pesa">
                <label for="other-l">অন্যান্য</label>
                <input type="radio" id="other-l" required name="gender" value="অন্যান্য">
              </div>             
            </div>

            <br> <br><hr><br>

            <div class="radio_div">
              <label>খানা প্রধানের ধর্ম <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="islam">ইসলাম</label>
                <input type="radio" id="islam" required name="religion" value="ইসলাম">
              </div>
              <div class="pesa">
                <label for="hindu">সনাতন (হিন্দু)</label>
                <input type="radio" id="hindu" required name="religion" value="হিন্দু">
              </div>             
              <div class="pesa">
                <label for="khristan">খ্রিষ্টান</label>
                <input type="radio" id="khristan" required name="religion" value="খ্রিষ্টান">
              </div>             
              <div class="pesa">
                <label for="boddya">বৌদ্ধ</label>
                <input type="radio" id="boddya" required name="religion" value="বৌদ্ধ">
              </div>             
              <div class="pesa">
                <label for="other-r">অন্যান্য</label>
                <input type="radio" id="other-r" required name="religion" value="অন্যান্য">
              </div>             
            </div>

            <br> <br><hr><br>

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

            <br> <br><hr><br>

            <div class="radio_div">
              <label>নলকুপ আছে কিনা <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="nolkup-yes">হ্যা</label>
                <input type="radio" id="nolkup-yes" required name="nolkup" value="হ্যা">
              </div>
              <div class="pesa">
                <label for="nolkup-no">না</label>
                <input type="radio" id="nolkup-no" required name="nolkup" value="না">
              </div>              
            </div>

            <br> <br><hr><br>

            <div class="radio_div">
              <label>পায়খানার ধরন <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="paykhana-yes">পাকা</label>
                <input type="radio" id="paykhana-yes" required name="toilet" value="পাকা">
              </div>
              <div class="pesa">
                <label for="paykhana-no">কাচা</label>
                <input type="radio" id="paykhana-no" required name="toilet" value="কাচা">
              </div>              
              <div class="pesa">
                <label for="paykhana-other">নাই</label>
                <input type="radio" id="paykhana-other" required name="toilet" value="নাই">
              </div>              
            </div>

            <br><br><br>
            <div class="radio_div">
              <div style="width:49%;float:left">
                <label>সদস্যের নাম লিখুন</label>
                <input type="text" name="relation_1" class="input" />
              </div>
                
              <div style="width:49%;float:right">                  
                <label>সদস্যের সম্পর্ক লিখুন</label>
                <select name="relation_type_1" id="ward" class="input" required>
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

            <br><br><br>
            <div class="radio_div">
              <div style="width:49%;float:left">
                <label>সদস্যের নাম লিখুন</label>
                <input type="text" name="relation_2" class="input" />
              </div>                
              <div style="width:49%;float:right">                  
                <label>সদস্যের সম্পর্ক লিখুন</label>
                <select name="relation_type_2" id="ward" class="input" required>
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


            <br><br><br><br>
            <div class="radio_div">
              <label>অবকাঠামোর ধরন <span class="requird_star">*</span></label>
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
            <br>
            <br>

            <div class="radio_div">
              <label>অবকাঠামোর ধরন <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="abasik">আবাসিক</label>
                <input type="radio" id="abasik" required name="home_type" value="আবাসিক">
              </div>
              
              <div class="pesa">
                <label for="banijjik">বানিজ্যিক</label>
                <input type="radio" id="banijjik" required name="home_type" value="বানিজ্যিক">
              </div>              
            </div>
            <br>
            <br>


            <div>
            <label>বাৎসরিক ভাড়া<span class="requird_star">* </span></label>
            <input type="text" name="annual_rent" class="input" required placeholder="20000"/>
            </div>

            <div class="radio_div">
              <label>বসবাসের ধরন <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="own">নিজে বসবাস</label>
                <input type="radio" id="own" required name="home_owner" value="নিজে বসবাস">
              </div>
              
              <div class="pesa">
                <label for="rent">ভাড়া দেওয়া</label>
                <input type="radio" id="rent" required name="home_owner" value="ভাড়া দেওয়া">
              </div>
              
              <div class="pesa">
                <label for="both">উভয়</label>
                <input type="radio" id="both" required name="home_owner" value="উভয়">
              </div>
            </div>
            <br>
            <br>

            
            <div>
            <label>পুর্বের বকেয়া <span class="requird_star">*</span></label>
            <input type="text" name="previous_due" class="input"  required value="0"/>
            </div>  
            
            <div>
            <label>বর্তমান কর <span class="requird_star">*</span></label>
            <input type="text" name="present_tax" class="input"  required value="0"/>
            </div>

            <div>
            <label>আদায়কৃত কর <span class="requird_star">*</span></label>
            <input type="text" name="collect_tax" class="input"  required />
            </div>  

            <div>
            <label>বকেয়া কর <span class="requird_star">*</span></label>
            <input type="text" name="due_tax" class="input"  required />
            </div>  


            <div>
            <label>ছবি</label>
            <input type="file" name="file" class="input" accept="image/*" />
            </div> 

            <br>
            <input class="btn submit_btn" name="submit" type="submit" value="সেভ করুন" />
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>


<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->



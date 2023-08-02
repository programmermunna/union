<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
<?php
if(isset($_GET['id'])){
  $src_id = $_GET['id'];
}else{
  header("Location:tax-holder-all.php");
}
$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tax_holder WHERE id=$src_id"));

$word_id = $data['ward']; 
$wards = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ward WHERE id=$word_id"));
$union_id = $wards['union_id'];
$unions = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM unions WHERE id=$union_id"));
$upazila_id = $unions['upazila_id']; 
$upazilas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM upazilas WHERE id=$upazila_id"));
$district_id = $upazilas['district_id'];
$districts = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM districts WHERE id=$district_id"));
$division_id = $districts['division_id'];
$divisions = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM divisions WHERE id=$division_id"));


$gender = $data['gender'];
switch ($gender) {
  case "পুরুষ":
    $check_gender1 = 'checked';
    break;
  case "মহিলা":
    $check_gender2 = 'checked';
    break;
  case "অন্যান্য":
    $check_gender3 = 'checked';
    break;
}

$religion = $data['religion'];
switch ($religion) {
  case "ইসলাম":
    $check_religion1 = 'checked';
    break;
  case "হিন্দু":
    $check_religion2 = 'checked';
    break;
  case "খ্রিষ্টান":
    $check_religion3 = 'checked';
    break;
  case "বৌদ্ধ":
    $check_religion4 = 'checked';
    break;
  case "অন্যান্য":
    $check_religion5 = 'checked';
    break;
}

$profession = $data['profession'];
switch ($profession) {
  case "ব্যবসা":
    $check_profession1 = 'checked';
    break;
  case "চাকুরী":
    $check_profession2 = 'checked';
    break;
  case "কৃষি":
    $check_profession3 = 'checked';
    break;
  case "দিন-মজুর":
    $check_profession4 = 'checked';
    break;
  case "প্রবাসীঃ":
    $check_profession5 = 'checked';
    break;
  case "শ্রমিক":
    $check_profession6 = 'checked';
    break;
}

 $nolkup = $data['nolkup'];
switch ($nolkup) {
  case "হ্যা":
    $check_nolkup1 = 'checked';
    break;
  case "না":
    $check_nolkup2 = 'checked';
    break;
}

$toilet = $data['toilet'];
switch ($toilet) {
  case "পাকা":
    $check_toilet1 = 'checked';
    break;
  case "কাচা":
    $check_toilet2 = 'checked';
    break;
  case "নাই":
    $check_toilet3 = 'checked';
    break;
}

$home = $data['home'];
switch ($home) {
  case "কাঁচা":
    $check_home1 = 'checked';
    break;
  case "পাকা":
    $check_home2 = 'checked';
    break;
  case "আধাপাকা":
    $check_home3 = 'checked';
    break;
  case "বিল্ডিং":
    $check_home4 = 'checked';
    break;
  case "টিনসেট":
    $check_home5 = 'checked';
    break;
}

$home_type = $data['home_type'];
switch ($home_type) {
  case "আবাসিক":
    $check_home_type1 = 'checked';
    break;
  case "বানিজ্যিক":
    $check_home_type2 = 'checked';
    break;
}

$home_owner = $data['home_owner'];
switch ($home_owner) {
  case "নিজে বসবাস":
    $check_home_owner1 = 'checked';
    break;
  case "ভাড়া দেওয়া":
    $check_home_owner2 = 'checked';
    break;
  case "উভয়":
    $check_home_owner3 = 'checked';
    break;
}

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

  $status = $_POST['status'];

    $file = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"../upload/$file");
    if(empty($file)){
      $file = $data['file'];
    }
  
    if( empty($ward) || empty($village) || empty($holding) || empty($annual_avg_income) || empty($tax_holder_name) || empty($tax_holder_name_en) || empty($education) || empty($phone) || empty($father_hasbend_name) || empty($mother_name) || empty($date_of_birth) || empty($gender) || empty($religion) || empty($profession) || empty($nolkup) || empty($toilet) || empty($home) || empty($home_type) || empty($home_owner)){
      header("Location:tax-holder-add.php?err=দয়া করে আবার চেষ্টা করুন");
    }else{
      $sql = "UPDATE tax_holder SET ward='$ward',village='$village',holding='$holding',annual_avg_income='$annual_avg_income',tax_holder_name='$tax_holder_name',tax_holder_name_en='$tax_holder_name_en',education='$education',phone='$phone',father_hasbend_name='$father_hasbend_name',mother_name='$mother_name',date_of_birth='$date_of_birth',birth_date='$birth_date',nid_no='$nid_no',social_benifit_1='$social_benifit_1',social_benifit_2='$social_benifit_2',social_benifit_3='$social_benifit_3',gender='$gender',religion='$religion',profession='$profession',nolkup='$nolkup',toilet='$toilet',relation_1='$relation_1',relation_type_1='$relation_type_1',relation_2='$relation_2',relation_type_2='$relation_type_2',home='$home',home_type='$home_type',annual_rent='$annual_rent',home_owner='$home_owner',previous_due='$previous_due',present_tax='$present_tax',collect_tax='$collect_tax',due_tax='$due_tax',file='$file', status='$status' WHERE id=$src_id";
      $update = mysqli_query($conn,$sql);
      if($update){
        header("location:tax-holder.php?msg=করদাতা সম্পাদন সফল হয়েছে1");
      }  
    }
  
    if(empty($_POST['sms_checkbox'])){
      $sms_checkbox = "OFF";
    }else{
      $sms_checkbox = $_POST['sms_checkbox'];
      if($status == 'Success'){
      $to = $mobile_no;
      $token = $mail['sms_token'];
      $message = "Congratulations ".$name." || ".$id_no." এই আইডি থেকে আপনার করপ্রদান সফল হয়েছে। আপনার কর সম্পর্কে বিস্তারিত জানতে wwww.mkiua.com ওয়েবসাইটে প্রবেশ করুন";
  
      $url = "http://api.greenweb.com.bd/api.php?json";
  
  
      $data= array(
      'to'=>"$to",
      'message'=>"$message",
      'token'=>"$token"
      ); 
      $ch = curl_init(); 
      curl_setopt($ch, CURLOPT_URL,$url);
      curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
      curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
      curl_setopt($ch, CURLOPT_ENCODING, '');
      curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      $smsresult = curl_exec($ch);
  
      //Result
      echo $smsresult;
  
      //Error Display
      echo curl_error($ch);
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
                <h6 class="text-white text-capitalize ps-3">করদাতা সম্পাদন করুণ</h6>
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
              <option value="<?php echo $divisions['id']?>"><?php echo $divisions['bn_name']?></option>
              <!-- <option style="display:none;" value="বাছাই করুন">বাছাই করুন</option> -->
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
              <option value="<?php echo $districts['id']?>"><?php echo $districts['bn_name']?></option>
              <!-- <option>জেলা বাছাই করুন</option> -->
            </select>
            </div>

            <div>
            <label>উপজেলা <span class="requird_star" >* </span></label>
            <select name="upazila" id="upazila" class="input upazila" required>
            <option value="<?php echo $upazilas['id']?>"><?php echo $upazilas['bn_name']?></option>
              <!-- <option>উপজেলা বাছাই করুন</option> -->
            </select>
            </div>

            <div>
            <label>ইউনিয়ন <span class="requird_star" >* </span></label>
            <select name="union" id="union" class="input union" required>
            <option value="<?php echo $unions['id']?>"><?php echo $unions['bn_name']?></option>
              <!-- <option>ইউনিয়ন বাছাই করুন</option> -->
            </select>
            </div>

            <div>
            <label>ওয়ার্ড <span class="requird_star" >* </span></label>
            <select name="ward" id="ward" class="input ward" required>
            <option value="<?php echo $wards['id']?>"><?php echo $wards['bn_name']?></option>
              <option>ওয়ার্ড বাছাই করুন</option>
            </select>
            </div>

            <div>
            <label>গ্রাম/পাড়া <span class="requird_star">* </span></label>
            <input type="text" name="village" required class="input" placeholder="গ্রাম/পাড়া লিখুন" value="<?php echo $data['village']?>" />
            </div>

            <div>
            <label>হোল্ডিং নাম্বার <span class="requird_star">* </span></label>
            <input type="text" name="holding" required class="input" placeholder="20304050" value="<?php echo $data['holding']?>" />
            </div>

            <div>
            <label>বাৎসরিক গড় আয় <span class="requird_star">* </span></label>
            <input type="text" name="annual_avg_income" required class="input" placeholder="বাৎসরিক আয়" value="<?php echo $data['annual_avg_income']?>" />
            </div>

            <div>
            <label>খানা প্রধানের নাম <span class="requird_star">* </span></label>
            <input type="text" name="tax_holder_name" required class="input" placeholder="খানা প্রধানের নাম লিখুন" value="<?php echo $data['tax_holder_name']?>" />
            </div>

            <div>
            <label>নাম (ইংরেজীতে) <span class="requird_star">* </span></label>
            <input type="text" name="tax_holder_name_en" required class="input" placeholder="Type Name In English" value="<?php echo $data['tax_holder_name_en']?>" />
            </div>

            <div>
            <label>শিক্ষাগত যোগ্যতা <span class="requird_star">* </span></label>
            <input type="text" name="education" required class="input" placeholder="শিক্ষাগত যোগ্যতা" value="<?php echo $data['education']?>" />
            </div>

            <div>
            <label>মোবাইল নাম্বার <span class="requird_star">* </span></label>
            <input type="text" name="phone" required class="input" placeholder="মোবাইল নাম্বার" value="<?php echo $data['phone']?>" />
            </div>

            <div>
            <label>পিতা/স্বামীর নাম <span class="requird_star">* </span></label>
            <input type="text" name="father_hasbend_name" required class="input" placeholder="পিতা/স্বামীর নাম লিখুন" value="<?php echo $data['father_hasbend_name']?>" />
            </div>

            <div>
            <label>মাতার নাম <span class="requird_star">* </span></label>
            <input type="text" name="mother_name" required class="input" placeholder="মাতার নাম লিখুন" value="<?php echo $data['mother_name']?>" />
            </div>

            <div>
            <label>জন্ম তারিখ <span class="requird_star">* </span></label>
            <input type="text" name="date_of_birth" required class="input" placeholder="উদাঃ 21-05-2000" value="<?php echo $data['date_of_birth']?>" />
            </div>

            <div>
            <label>জন্ম নিবন্ধন </label>
            <input type="text" name="birth_date" class="input" placeholder="জন্ম নিবন্ধন লিখুন" value="<?php echo $data['birth_date']?>" />
            </div>

            <div>
            <label>এনআইডি নাম্বার </label>
            <input type="text" name="nid_no" class="input" placeholder="জাতীয় পরিচয় পত্র নম্বর লিখুন" value="<?php echo $data['nid_no']?>" />
            </div>

            <div>
            <label>সামাজিক সুবিধা </label>
            <input type="text" name="social_benifit_1" class="input"placeholder="কি ধরনের সামাজিক সুবিধা পাচ্ছেন" value="<?php echo $data['social_benifit_1']?>" />
            <input type="text" name="social_benifit_2" class="input"placeholder="অন্যান্য কি ধরনের সামাজিক সুবিধা পাচ্ছেন" value="<?php echo $data['social_benifit_2']?>" />
            <input type="text" name="social_benifit_3" class="input"placeholder="বর্তমানে কি ধরনের সামাজিক সুবিধা পাচ্ছেন" value="<?php echo $data['social_benifit_3']?>" />
            </div>

            <br>
            <div class="radio_div">
              <label>খানা প্রধানের লিঙ্গ <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="male">পুরুষ</label>
                <input type="radio" id="male" name="gender" value="পুরুষ" <?php if(isset($check_gender1)){ echo $check_gender1;}?>/>
              </div>
              <div class="pesa">
                <label for="female">মহিলা </label>
                <input type="radio" id="female" name="gender" value="মহিলা" <?php if(isset($check_gender2)){ echo $check_gender2;}?>/>
              </div>              
              <div class="pesa">
                <label for="other1">অন্যান্য </label>
                <input type="radio" id="other1" name="gender" value="অন্যান্য" <?php if(isset($check_gender3)){ echo $check_gender3;}?>/>
              </div>              
            </div>
            <br><hr>

            <div class="radio_div">
              <label>খানা প্রধানের ধর্ম <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="islam">ইসলাম</label>
                <input type="radio" id="islam" name="religion" value="ইসলাম"  <?php if(isset($check_religion1)){ echo $check_religion1;}?>/>
              </div>
              <div class="pesa">
                <label for="hindu">সনাতন (হিন্দু)  </label>
                <input type="radio" id="hindu" name="religion" value="হিন্দু"  <?php if(isset($check_religion2)){ echo $check_religion2;}?>/>
              </div>              
              <div class="pesa">
                <label for="khirstain">খ্রিষ্টান</label>
                <input type="radio" id="khirstain" name="religion" value="খ্রিষ্টান"  <?php if(isset($check_religion3)){ echo $check_religion3;}?>/>
              </div>              
              <div class="pesa">
                <label for="boddho">বৌদ্ধ </label>
                <input type="radio" id="boddho" name="religion" value="বৌদ্ধ"  <?php if(isset($check_religion4)){ echo $check_religion4;}?>/>
              </div>              
              <div class="pesa">
                <label for="others2">অন্যান্য </label>
                <input type="radio" id="others2" name="religion" value="অন্যান্য"  <?php if(isset($check_religion5)){ echo $check_religion5;}?>/>
              </div>              
            </div>
            <br><hr>

            <div class="radio_div">
              <label>পেশা <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="business">ব্যবসাঃ</label>
                <input type="radio" id="business" name="profession" value="ব্যবসা"  <?php if(isset($check_profession1)){ echo $check_profession1;}?>/>
              </div>
              <div class="pesa">
                <label for="job">চাকুরীঃ</label>
                <input type="radio" id="job" name="profession" value="চাকুরি"  <?php if(isset($check_profession2)){ echo $check_profession2;}?>/>
              </div>              
              <div class="pesa">
                <label for="krisi">কৃষিঃ</label>
                <input type="radio" id="krisi" name="profession" value="কৃষি"  <?php if(isset($check_profession3)){ echo $check_profession3;}?>/>
              </div>              
              <div class="pesa">
                <label for="din_mojur">দিন-মজুরঃ </label>
                <input type="radio" id="din_mojur" name="profession" value="দিন-মজুর"  <?php if(isset($check_profession4)){ echo $check_profession4;}?>/>
              </div>              
              <div class="pesa">
                <label for="probasi">প্রবাসীঃ </label>
                <input type="radio" id="probasi" name="profession" value="প্রবাসী"  <?php if(isset($check_profession5)){ echo $check_profession5;}?>/>
              </div>              
              <div class="pesa">
                <label for="sromik">শ্রমিকঃ </label>
                <input type="radio" id="sromik" name="profession" value="শ্রমিক"  <?php if(isset($check_profession6)){ echo $check_profession6;}?>/>
              </div>              
            </div>
            <br><hr>

            <div class="radio_div">
              <label>নলকুপ আছে কিনা <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="nolkum_yes">হ্যা</label>
                <input type="radio" id="nolkum_yes" name="nolkup" value="হ্যা" <?php if(isset($check_nolkup1)){ echo $check_nolkup1;}?>/>
              </div>
              <div class="pesa">
                <label for="nolkum_no">না </label>
                <input type="radio" id="nolkum_no" name="nolkup" value="না" <?php if(isset($check_nolkup2)){ echo $check_nolkup2;}?>/>
              </div>          
            </div>
            <br><hr>

            <div class="radio_div">
              <label>পায়খানার ধরন <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="toilet_paka">পাকা</label>
                <input type="radio" id="toilet_paka" name="toilet" value="পাকা" <?php if(isset($check_toilet1)){ echo $check_toilet1;}?>/>
              </div>
              <div class="pesa">
                <label for="toilet_kacha">কাঁচা</label>
                <input type="radio" id="toilet_kacha" name="toilet" value="কাঁচা" <?php if(isset($check_toilet2)){ echo $check_toilet2;}?>/>
              </div>          
              <div class="pesa">
                <label for="toilet_nai">নাই</label>
                <input type="radio" id="toilet_nai" name="toilet" value="নাই" <?php if(isset($check_toilet3)){ echo $check_toilet3;}?>/>
              </div>          
            </div>
            <br>

            <div class="radio_div">
              <div style="width:49%;float:left">
                <label>সদস্যের নাম লিখুন</label>
                <input type="text" name="relation_1" class="input" placeholder="সদস্যের নাম লিখুন" value="<?php echo $data['relation_1']?>" />
              </div>
                
              <div style="width:49%;float:right">                  
                <label>সদস্যের সম্পর্ক লিখুন</label>
                <select name="relation_type_1" class="input" >
                <option selected value="<?php echo $data['relation_type_1']?>"><?php echo $data['relation_type_1']?></option>
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
                <input type="text" name="relation_2" class="input" placeholder="সদস্যের নাম লিখুন" value="<?php echo $data['relation_2']?>" />
              </div>
                
              <div style="width:49%;float:right">                  
                <label>সদস্যের সম্পর্ক লিখুন</label>
                <select name="relation_type_2" class="input" >
                  <option selected value="<?php echo $data['relation_type_2']?>"><?php echo $data['relation_type_2']?></option>
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
                <input type="radio" id="home_kacha" name="home" value="ব্যবসা" <?php if(isset($check_home1)){ echo $check_home1;}?>/>
              </div>
              <div class="pesa">
                <label for="home_paka">পাকা</label>
                <input type="radio" id="home_paka" name="home" value="পাকা" <?php if(isset($check_home2)){ echo $check_home2;}?>/>
              </div>          
              <div class="pesa">
                <label for="home_adhapaka">আধাপাকা</label>
                <input type="radio" id="home_adhapaka" name="home" value="আধাপাকা" <?php if(isset($check_home3)){ echo $check_home3;}?>/>
              </div>          
              <div class="pesa">
                <label for="home_building">বিল্ডিং</label>
                <input type="radio" id="home_building" name="home" value="বিল্ডিং" <?php if(isset($check_home4)){ echo $check_home4;}?>/>
              </div>          
              <div class="pesa">
                <label for="home_tinset">টিনসেট</label>
                <input type="radio" id="home_tinset" name="home" value="টিনসেট" <?php if(isset($check_home5)){ echo $check_home5;}?>/>
              </div>          
            </div><hr>

            <br>
            <div class="radio_div">
              <label>অবকাঠামোর ধরন  <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="abasik">আবাসিক</label>
                <input type="radio" id="abasik" name="home_type" value="আবাসিক" <?php if(isset($check_home_type1)){ echo $check_home_type1;}?>/>
              </div>
              <div class="pesa">
                <label for="banijjik">বানিজ্যিক </label>
                <input type="radio" id="banijjik" name="home_type" value="বানিজ্যিক" <?php if(isset($check_home_type2)){ echo $check_home_type2;}?>/>
              </div>        
            </div>
            <br> <hr>

            <div class="radio_div">
              <label>বসবাসের ধরন <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="home_owner_own">নিজে বসবাস</label>
                <input type="radio" id="home_owner_own" name="home_owner" value="নিজে বসবাস" <?php if(isset($check_home_owner1)){ echo $check_home_owner1;}?>/>
              </div>
              <div class="pesa">
                <label for="home_owner_rent">ভাড়া দেওয়া </label>
                <input type="radio" id="home_owner_rent" name="home_owner" value="ভাড়া দেওয়া" <?php if(isset($check_home_owner2)){ echo $check_home_owner2;}?>/>
              </div>        
              <div class="pesa">
                <label for="home_owner_both">উভয় </label>
                <input type="radio" id="home_owner_both" name="home_owner" value="উভয়" <?php if(isset($check_home_owner3)){ echo $check_home_owner3;}?>/>
              </div>        
            </div>
            <br> 

            <div>
            <label>বাৎসরিক ভাড়া </label>
            <input type="text" name="annual_rent" class="input" placeholder="20000" value="<?php echo $data['annual_rent']?>" />
            </div>


            <div>
            <label>পুর্বের বকেয়া </label>
            <input type="text" name="previous_due" class="input" placeholder="পুর্বের বকেয়া" value="<?php echo $data['previous_due']?>" />
            </div>

            <div>
            <label>বর্তমান কর  <span class="requird_star">* </span></label>
            <input type="text" name="present_tax" required class="input" placeholder="বর্তমান কর " value="<?php echo $data['present_tax']?>" />
            </div>

            <div>
            <label>আদায়কৃত কর </label>
            <input type="text" name="collect_tax" class="input" placeholder="আদায়কৃত কর" value="<?php echo $data['collect_tax']?>" />
            </div>

            <div>
            <label>বকেয়া কর </label>
            <input type="text" name="due_tax" class="input" placeholder="বকেয়া কর" value="<?php echo $data['due_tax']?>" />
            </div>

            <div>
            <label>ছবি </label>
            <input type="file" name="file" class="input" />
            <img style="width:200px" src="../upload/<?php echo $data['file']?>" alt="<?php echo $data['file']?>">
            </div>

            <div>
            <label>স্টাটাস</label>
            <select name="status" class="input">
              <?php if($data['status']== 'Pending'){ ?>
                <option selected value="Pending">Pending</option>
                <option value="Success">Success</option>
               <?php }else{ ?>
                <option value="Pending">Pending</option>
                <option selected value="Success">Success</option>
                <?php } ?>
            </select>
            </div> 

            <br>

            <div style="text-align:center;" class="sms_check">
              <input type="checkbox" name="sms_checkbox" />
              <span>করদাতার মোবাইলে SMS পাঠাতে এটি নির্বাচন করুন</span>
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



  
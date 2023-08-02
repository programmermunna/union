<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $src_id = $_GET['id'];
}else{
  header("Location:tax-holder-all.php");
}
$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tax_holder WHERE id=$src_id"));
$word_id = $data['ward'];
$ward = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ward WHERE id=$word_id"));

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

$ward_permission = $ward['edit_permision']; 
if($ward_permission == 'OFF'){
  $ward_permission = "disabled";
}else{
  $ward_permission = "";
}
$sms_checkbox = "OFF";


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
  $status = $_POST['status'];

  if($ward_permission == ''){
  $file = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"upload/$file");
  if(empty($file)){
    $file = $data['file'];
  }

  if( empty($ward) || empty($village) || empty($holding) || empty($annual_avg_income) || empty($tax_holder_name) || empty($tax_holder_name_en) || empty($education) || empty($phone) || empty($father_hasbend_name) || empty($mother_name) || empty($date_of_birth) || empty($gender) || empty($religion) || empty($profession) || empty($nolkup) || empty($toilet) || empty($home) || empty($home_type) || empty($home_owner)){
    header("Location:tax-holder-add.php?err=দয়া করে আবার চেষ্টা করুন");
  }else{
    $sql = "UPDATE tax_holder SET ward='$ward',village='$village',holding='$holding',annual_avg_income='$annual_avg_income',tax_holder_name='$tax_holder_name',tax_holder_name_en='$tax_holder_name_en',education='$education',phone='$phone',father_hasbend_name='$father_hasbend_name',mother_name='$mother_name',date_of_birth='$date_of_birth',birth_date='$birth_date',nid_no='$nid_no',social_benifit_1='$social_benifit_1',social_benifit_2='$social_benifit_2',social_benifit_3='$social_benifit_3',gender='$gender',religion='$religion',profession='$profession',nolkup='$nolkup',toilet='$toilet',relation_1='$relation_1',relation_type_1='$relation_type_1',relation_2='$relation_2',relation_type_2='$relation_type_2',home='$home',home_type='$home_type',annual_rent='$annual_rent',home_owner='$home_owner',previous_due='$previous_due',present_tax='$present_tax',collect_tax='$collect_tax',due_tax='$due_tax',file='$file', status='$status' WHERE id=$src_id";
    $update = mysqli_query($conn,$sql);
    if($update){
      header("location:tax-holder-all.php?msg=করদাতা সম্পাদন সফল হয়েছে");
    }  
  }

}else{
    $sql = "UPDATE tax_holder SET collect_tax='$collect_tax',due_tax='$due_tax', status='$status' WHERE id=$src_id";
    $update = mysqli_query($conn,$sql);
    if($update){
      header("location:tax-holder-all.php?msg=করদাতা সম্পাদন সফল হয়েছে");
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
            <span>করদাতা সম্পাদন করুন</span>
            <span><?php echo $data['present_year']?> / <?php $time = $data['time']; echo date("d-M h:a",$time);?></span>
          </div>
          
          <form id="edit_tax_holder_form" action="" method="POST" enctype="multipart/form-data">

            <div>
            <label>ওয়ার্ড সিলেক্ট করুন<span class="requird_star" >* </span></label>
            <select <?php echo $ward_permission;?> name="ward" id="ward" class="input" required>
                <option selected value="<?php echo $ward['id']?>"><?php echo $ward['bn_name']?></option>
                <?php $rows = mysqli_query($conn,"SELECT * FROM ward WHERE admin_id=$id"); while($row = mysqli_fetch_assoc($rows)){ ?>
                <option value="<?php echo $row['id']?>"><?php echo $row['bn_name']?></option><?php }?>
            </select>
            </div>

            <div>
            <label>গ্রাম/পাড়া</label>
            <input <?php echo $ward_permission;?> type="text" name="village" class="input" required placeholder="গ্রাম/পাড়া লিখুন"value="<?php echo $data['village']?>" />
            </div>

            <div>
            <label>হোল্ডিং নাম্বার<span class="requird_star">* </span></label>
            <input <?php echo $ward_permission;?> type="text" name="holding" class="input" required placeholder="20304050"value="<?php echo $data['holding']?>" />
            </div>

            <div>
            <label>বাৎসরিক গড় আয়<span class="requird_star">* </span></label>
            <input <?php echo $ward_permission;?> type="text" name="annual_avg_income" class="input" required placeholder="বাৎসরিক আয়"value="<?php echo $data['annual_avg_income']?>" />
            </div>

            <div>
            <label>খানা প্রধানের নাম <span class="requird_star">* </span></label>
            <input <?php echo $ward_permission;?> type="text" name="tax_holder_name" class="input" required placeholder="খানা প্রধানের নাম লিখুন"value="<?php echo $data['tax_holder_name']?>" />
            </div>

            <div>
            <label>নাম (ইংরেজীতে)<span class="requird_star">* </span></label>
            <input <?php echo $ward_permission;?> type="text" name="tax_holder_name_en" class="input" required placeholder="Type Name In English"value="<?php echo $data['tax_holder_name_en']?>" />
            </div>

            <div>
            <label>শিক্ষাগত যোগ্যতা <span class="requird_star">* </span></label>
            <input <?php echo $ward_permission;?> type="text" name="education" class="input" required placeholder="শিক্ষাগত যোগ্যতা"value="<?php echo $data['education']?>" />
            </div> 

            <div>
            <label>মোবাইল নাম্বার<span class="requird_star">* </span></label>
            <input <?php echo $ward_permission;?> type="text" name="phone" class="input" required placeholder="মোবাইল নাম্বার"value="<?php echo $data['phone']?>" />
            </div>

            <div>
            <label>পিতা/স্বামীর নাম <span class="requird_star">* </span></label>
            <input <?php echo $ward_permission;?> type="text" name="father_hasbend_name" class="input" required placeholder="পিতা/স্বামীর নাম লিখুন"value="<?php echo $data['father_hasbend_name']?>" />
            </div>            

            <div>
            <label>মাতার নাম <span class="requird_star">* </span></label>
            <input <?php echo $ward_permission;?> type="text" name="mother_name" class="input" required placeholder="মাতার নাম লিখুন"value="<?php echo $data['mother_name']?>" />
            </div>            
            
            <div>
            <label>জন্ম তারিখ <span class="requird_star">*</span></label>
            <input <?php echo $ward_permission;?> type="text" name="date_of_birth" class="input"  required placeholder="উদাঃ 21-05-2000"value="<?php echo $data['date_of_birth']?>" />
            </div>
            
            <div>
            <label>জন্ম নিবন্ধন <span class="requird_star">*</span></label>
            <input <?php echo $ward_permission;?> type="text" name="birth_date" class="input"  required placeholder="জন্ম নিবন্ধন লিখুন"value="<?php echo $data['birth_date']?>" />
            </div>            
            
            <div>
            <label>এনআইডি নাম্বার <span class="requird_star">*</span></label>
            <input <?php echo $ward_permission;?> type="text" name="nid_no" class="input"  required placeholder="জাতীয় পরিচয় পত্র নম্বর লিখুন"value="<?php echo $data['nid_no']?>" />
            </div>

            <div>
            <label>সামাজিক সুবিধা <span class="requird_star">*</span></label>
            <input <?php echo $ward_permission;?> type="text" name="social_benifit_1" class="input"  required placeholder="কি ধরনের সামাজিক সুবিধা পাচ্ছেন"value="<?php echo $data['social_benifit_1']?>" />
            <input <?php echo $ward_permission;?> type="text" name="social_benifit_2" class="input"  required placeholder="অন্যান্য কি ধরনের সামাজিক সুবিধা পাচ্ছেন"value="<?php echo $data['social_benifit_2']?>" />
            <input <?php echo $ward_permission;?> type="text" name="social_benifit_3" class="input"  required placeholder="বর্তমানে কি ধরনের সামাজিক সুবিধা পাচ্ছেন"value="<?php echo $data['social_benifit_3']?>" />
            </div>

            <br>
            <div class="radio_div">
              <label>খানা প্রধানের লিঙ্গ <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="male">পুরুষ</label>
                <input <?php echo $ward_permission;?> type="radio" id="male" required name="gender" value="পুরুষ" <?php if(isset($check_gender1)){ echo $check_gender1;}?>>
              </div>
              <div class="pesa">
                <label for="female">মহিলা</label>
                <input <?php echo $ward_permission;?> type="radio" id="female" required name="gender" value="মহিলা" <?php if(isset($check_gender2)){ echo $check_gender2;}?>>
              </div>             
              <div class="pesa">
                <label for="other-l">অন্যান্য</label>
                <input <?php echo $ward_permission;?> type="radio" id="other-l" required name="gender" value="অন্যান্য" <?php if(isset($check_gender3)){ echo $check_gender3;}?>>
              </div>             
            </div>

            <br> <br><hr><br>

            <div class="radio_div">
              <label>খানা প্রধানের ধর্ম <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="islam">ইসলাম</label>
                <input <?php echo $ward_permission;?> type="radio" id="islam" required name="religion" value="ইসলাম" <?php if(isset($check_religion1)){ echo $check_religion1;}?>>
              </div>
              <div class="pesa">
                <label for="hindu">সনাতন (হিন্দু)</label>
                <input <?php echo $ward_permission;?> type="radio" id="hindu" required name="religion" value="হিন্দু" <?php if(isset($check_religion2)){ echo $check_religion2;}?>>
              </div>             
              <div class="pesa">
                <label for="khristan">খ্রিষ্টান</label>
                <input <?php echo $ward_permission;?> type="radio" id="khristan" required name="religion" value="খ্রিষ্টান" <?php if(isset($check_religion3)){ echo $check_religion3;}?>>
              </div>             
              <div class="pesa">
                <label for="boddya">বৌদ্ধ</label>
                <input <?php echo $ward_permission;?> type="radio" id="boddya" required name="religion" value="বৌদ্ধ" <?php if(isset($check_religion4)){ echo $check_religion4;}?>>
              </div>             
              <div class="pesa">
                <label for="other-r">অন্যান্য</label>
                <input <?php echo $ward_permission;?> type="radio" id="other-r" required name="religion" value="অন্যান্য" <?php if(isset($check_religion5)){ echo $check_religion5;}?>>
              </div>             
            </div>

            <br> <br><hr><br>

            <div class="radio_div">
              <label>পেশা <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="business">ব্যবসাঃ</label>
                <input <?php echo $ward_permission;?> type="radio" id="business" required name="profession" value="ব্যবসা" <?php if(isset($check_profession1)){ echo $check_profession1;}?>>
              </div>
              <div class="pesa">
                <label for="job">চাকুরীঃ</label>
                <input <?php echo $ward_permission;?> type="radio" id="job" required name="profession" value="চাকুরি" <?php if(isset($check_profession2)){ echo $check_profession2;}?>>
              </div>
              <div class="pesa">
                <label for="farmer">কৃষিঃ</label>
                <input <?php echo $ward_permission;?> type="radio" id="farmer" required name="profession" value="কৃষি" <?php if(isset($check_profession3)){ echo $check_profession3;}?>>
              </div>
              <div class="pesa">
                <label for="labor">দিন-মজুরঃ</label>
                <input <?php echo $ward_permission;?> type="radio" id="labor" required name="profession" value="দিন-মজুর" <?php if(isset($check_profession4)){ echo $check_profession4;}?>>
              </div>
              <div class="pesa">
                <label for="expatriate">প্রবাসীঃ</label>
                <input <?php echo $ward_permission;?> type="radio" id="expatriate" required name="profession" value="প্রবাসী" <?php if(isset($check_profession5)){ echo $check_profession5;}?>>
              </div>
              <div class="pesa">
                <label for="worker">শ্রমিকঃ</label>
                <input <?php echo $ward_permission;?> type="radio" id="worker" required name="profession" value="শ্রমিক" <?php if(isset($check_profession6)){ echo $check_profession6;}?>>
              </div>              
            </div>

            <br> <br><hr><br>

            <div class="radio_div">
              <label>নলকুপ আছে কিনা <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="nolkup-yes">হ্যা</label>
                <input <?php echo $ward_permission;?> type="radio" id="nolkup-yes" required name="nolkup" value="হ্যা" <?php if(isset($check_nolkup1)){ echo $check_nolkup1;}?>>
              </div>
              <div class="pesa">
                <label for="nolkup-no">না</label>
                <input <?php echo $ward_permission;?> type="radio" id="nolkup-no" required name="nolkup" value="না" <?php if(isset($check_nolkup2)){ echo $check_nolkup2;}?>>
              </div>              
            </div>

            <br> <br><hr><br>

            <div class="radio_div">
              <label>পায়খানার ধরন <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="paykhana-yes">পাকা</label>
                <input <?php echo $ward_permission;?> type="radio" id="paykhana-yes" required name="toilet" value="পাকা" <?php if(isset($check_toilet1)){ echo $check_toilet1;}?>>
              </div>
              <div class="pesa">
                <label for="paykhana-no">কাচা</label>
                <input <?php echo $ward_permission;?> type="radio" id="paykhana-no" required name="toilet" value="কাচা" <?php if(isset($check_toilet2)){ echo $check_toilet2;}?>>
              </div>              
              <div class="pesa">
                <label for="paykhana-other">নাই</label>
                <input <?php echo $ward_permission;?> type="radio" id="paykhana-other" required name="toilet" value="নাই" <?php if(isset($check_toilet3)){ echo $check_toilet3;}?>>
              </div>              
            </div>

            <br><br><br>
            <div class="radio_div">
              <div style="width:49%;float:left">
                <label>সদস্যের নাম লিখুন</label>
                <input <?php echo $ward_permission;?> type="text" name="relation_1" class="input" value="<?php echo $data['relation_1']?>" />
              </div>
                
              <div style="width:49%;float:right">                  
                <label>সদস্যের সম্পর্ক লিখুন</label>
                <select <?php echo $ward_permission;?> name="relation_type_1" id="ward" class="input" required>
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

            <br><br><br>
            <div class="radio_div">
              <div style="width:49%;float:left">
                <label>সদস্যের নাম লিখুন</label>
                <input <?php echo $ward_permission;?> type="text" name="relation_2" class="input" value="<?php echo $data['relation_2']?>" />
              </div>                
              <div style="width:49%;float:right">                  
                <label>সদস্যের সম্পর্ক লিখুন</label>
                <select <?php echo $ward_permission;?> name="relation_type_2" id="ward" class="input" required>
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


            <br><br><br><br>
            <div class="radio_div">
              <label>অবকাঠামোর ধরন <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="kacha">কাঁচাঃ</label>
                <input <?php echo $ward_permission;?> type="radio" id="kacha" required name="home" value="কাঁচা" <?php if(isset($check_home1)){ echo $check_home1;}?>>
              </div>
              
              <div class="pesa">
                <label for="paka">পাকাঃ</label>
                <input <?php echo $ward_permission;?> type="radio" id="paka" required name="home" value="পাকা" <?php if(isset($check_home2)){ echo $check_home2;}?>>
              </div>
              
              <div class="pesa">
                <label for="adhapaka">আধাপাকাঃ</label>
                <input <?php echo $ward_permission;?> type="radio" id="adhapaka" required name="home" value="আধাপাকা" <?php if(isset($check_home3)){ echo $check_home3;}?>>
              </div>
              
              <div class="pesa">
                <label for="building">বিল্ডিংঃ</label>
                <input <?php echo $ward_permission;?> type="radio" id="building" required name="home" value="বিল্ডিং" <?php if(isset($check_home4)){ echo $check_home4;}?>>
              </div>
              
              <div class="pesa">
                <label for="tinset">টিনসেটঃ</label>
                <input <?php echo $ward_permission;?> type="radio" id="tinset" required name="home" value="টিনসেট" <?php if(isset($check_home5)){ echo $check_home5;}?>>
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
                <input <?php echo $ward_permission;?> type="radio" id="abasik" required name="home_type" value="আবাসিক" <?php if(isset($check_home_type1)){ echo $check_home_type1;}?>>
              </div>
              
              <div class="pesa">
                <label for="banijjik">বানিজ্যিক</label>
                <input <?php echo $ward_permission;?> type="radio" id="banijjik" required name="home_type" value="বানিজ্যিক" <?php if(isset($check_home_type2)){ echo $check_home_type2;}?>>
              </div>              
            </div>
            <br>
            <br>


            <div>
            <label>বাৎসরিক ভাড়া<span class="requird_star">* </span></label>
            <input <?php echo $ward_permission;?> type="text" name="annual_rent" class="input" required placeholder="0"value="<?php echo $data['annual_rent']?>" />
            </div>

            <div class="radio_div">
              <label>বসবাসের ধরন <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="own">নিজে বসবাস</label>
                <input <?php echo $ward_permission;?> type="radio" id="own" required name="home_owner" value="নিজে বসবাস" <?php if(isset($check_home_owner1)){ echo $check_home_owner1;}?>>
              </div>
              
              <div class="pesa">
                <label for="rent">ভাড়া দেওয়া</label>
                <input <?php echo $ward_permission;?> type="radio" id="rent" required name="home_owner" value="ভাড়া দেওয়া" <?php if(isset($check_home_owner2)){ echo $check_home_owner2;}?>>
              </div>
              
              <div class="pesa">
                <label for="both">উভয়</label>
                <input <?php echo $ward_permission;?> type="radio" id="both" required name="home_owner" value="উভয়" <?php if(isset($check_home_owner3)){ echo $check_home_owner3;}?>>
              </div>
            </div>
            <br>
            <br>

            
            <div>
            <label>পুর্বের বকেয়া <span class="requird_star">*</span></label>
            <input <?php echo $ward_permission;?> type="text" name="previous_due" class="input"  required value="<?php echo $data['previous_due']?>" />
            </div>  
            
            <div>
            <label>বর্তমান কর <span class="requird_star">*</span></label>
            <input <?php echo $ward_permission;?> type="text" name="present_tax" class="input"  required value="<?php echo $data['present_tax']?>" />
            </div>

            <div>
            <label>আদায়কৃত কর <span class="requird_star">*</span></label>
            <input type="text" name="collect_tax" class="input"  required value="<?php echo $data['collect_tax']?>" />
            </div>  

            <div>
            <label>বকেয়া কর <span class="requird_star">*</span></label>
            <input type="text" name="due_tax" class="input"  required value="<?php echo $data['collect_tax']?>" />
            </div>  


            <div>
            <label>ছবি</label>
            <input <?php echo $ward_permission;?> type="file" name="file" class="input" accept="image/*" />
            <img class="tax_holder_img" src="upload/<?php echo $data['file']?>" alt="<?php echo $data['file']?>">
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


            <div class="sms_check">
              <input type="checkbox" name="sms_checkbox" class="input" value="<?php echo $data['village']?>" />
              <span>করদাতার মোবাইলে SMS পাঠাতে এটি নির্বাচন করুন</span>
            </div> 

            <br>
            <input class="btn submit_btn" name="submit" type="submit" value="সেভ করুন" value="<?php echo $data['village']?>" />
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->



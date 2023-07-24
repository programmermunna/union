<!-- Header -->
<?php include("header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM person WHERE id=$id"));
// $id = $data['admin_id'];
$village_id = $data['village'];
$village = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM village WHERE id=$village_id"));
$vls_status = $village['edit_permision']; 
if($vls_status == 'OFF'){
  $vls_status = "disabled";
}else{
  $vls_status = "";
}
$sms_checkbox = "OFF";

if(isset($_POST['submit'])){
  $id_no = $_POST['id_no'];
  $name = $_POST['name'];
  $guardian_name = $_POST['guardian_name'];
  $village = $_POST['village'];
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
  $status = $_POST['status'];

  if($vls_status == ''){
  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"../upload/$file_name");
  if(empty($file_name)){
    $file_name = $data['file_name'];
  }

  if( empty($id_no) || empty($name) || empty($guardian_name) || empty($village) || empty($family_member) || empty($word_no) || empty($net_worth)){
    header("Location:up-tax-holder.php?err=দয়া করে আবার চেষ্টা করুন");
  }else{
    $sql = "UPDATE person SET id_no='$id_no', name='$name', guardian_name='$guardian_name', village='$village', word_no='$word_no', family_member='$family_member', male='$male', female='$female', holding_no='$holding_no', nid_no='$nid_no', profession='$profession', home='$home', net_worth='$net_worth', annual_tax='$annual_tax', ablable_tax='$ablable_tax', due_tax='$due_tax', mobile_no='$mobile_no', status='$status',file_name='$file_name' WHERE id=$id";
    $update = mysqli_query($conn,$sql);
    if($update){
      header("location:up-tax-holder.php?msg=dকরদাতা সম্পাদন সফল হয়েছে");
    }  
  }

}else{  
    $sql = "UPDATE person SET ablable_tax='$ablable_tax', due_tax='$due_tax', status='$status' WHERE id=$id";
    $update = mysqli_query($conn,$sql);
    if($update){
      header("location:up-tax-holder.php?msg=করদাতা সম্পাদন সফল হয়েছে");
    }
}


  if(empty($_POST['sms_checkbox'])){
    $sms_checkbox = "OFF";
  }else{
    $sms_checkbox = $_POST['sms_checkbox'];
    if($status == 'Success'){
    $to = $mobile_no;
    $token = $mail['sms_token'];
    $message = "Congratulations ".$name." || ".$id_no." এই আইডি থেকে আপনার করপ্রদান সফল হয়েছে। আপনার কর সম্পর্কে বিস্তারিত জানতে wwww.mkitu.com ওয়েবসাইটে প্রবেশ করুন";

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

      <!-- Page Content -->
      <section class="content_wrapper">
        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <div class="add_page_title">
            <span>করদাতা সম্পাদন করুন</span>
          </div>
          
          <form id="edit_tax_holder_form" action="" method="POST" enctype="multipart/form-data">

            <div>
              <label>আইডি নং <span class="requird_star">*</span></label>
              <input <?php echo $vls_status;?>  type="number" name="id_no" class="input" required value="<?php echo $data['id_no']?>"/>
            </div>

            <div>
            <label>করদাতার নাম <span class="requird_star">* </span></label>
            <input <?php echo $vls_status;?>  type="text" name="name" class="input" required value="<?php echo $data['name']?>"/>
            </div>

            <div>
            <label>পিতা/স্বামীর নাম <span class="requird_star">* </span></label>
            <input <?php echo $vls_status;?>  type="text" name="guardian_name" class="input" required value="<?php echo $data['guardian_name']?>"/>
            </div>

            <div>
            <label>গ্রাম <span class="requird_star" >* </span></label>
            <select <?php echo $vls_status;?> name="village" id="village" class="input" required>
            <?php 
              $vlg_id = $data['village'];
              $selected_village = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM village WHERE id=$vlg_id"));
              ?>
              <option value="<?php echo $selected_village['id']?>"><?php echo $selected_village['bn_name']?></option>

              <?php 
              $villages = mysqli_query($conn,"SELECT * FROM village WHERE admin_id=$id");
              while($village = mysqli_fetch_assoc($villages)){ ?>
                <option value="<?php echo $village['id']?>"><?php echo $village['bn_name']?></option>
             <?php }?>
            </select>
            </div>

            <div>
            <label>ওয়ার্ড নং <span class="requird_star">*</span></label>
            <input <?php echo $vls_status;?>  type="text" name="word_no" class="input"  required value="<?php echo $data['word_no']?>"/>
            </div>
            
            <div>
            <label>পরিবারের সদস্য সংখ্যা <span class="requird_star">*</span></label>
            <input <?php echo $vls_status;?>  type="text" name="family_member" class="input"  required value="<?php echo $data['family_member']?>"/>
            </div>

            <br>
            <div class="radio_div">
              <div style="width:49%;float:left">
                <label>পুরুষ</label>
                <input <?php echo $vls_status;?>  type="text" name="male" class="input"  value="<?php echo $data['male']?>"/>
              </div>
                
              <div style="width:49%;float:right">                  
                <label>মহিলা</label>
                <input <?php echo $vls_status;?>  type="text" name="female" class="input"  value="<?php echo $data['female']?>"/>
              </div>
            </div>

            <br>
            <br>
            <br>
            <div>
            <label>হোল্ডিং নং</label>
            <input <?php echo $vls_status;?>  type="text" name="holding_no" class="input" value="<?php echo $data['holding_no']?>"/>
            </div>

            <div>
            <label>জাতীয় পরিচয়পত্র নং</label>
            <input <?php echo $vls_status;?>  type="text" name="nid_no" class="input" value="<?php echo $data['nid_no']?>"/>
            </div>

            <br>
            <div class="radio_div">
              <label>পেশা <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="business">ব্যবসাঃ</label>
                <input <?php echo $vls_status;?>  type="radio" id="business" required name="profession" value="ব্যবসা"
                <?php
                if($data['profession'] == 'ব্যবসা'){
                  echo "checked";
                }
                ?>
                >
              </div>
              <div class="pesa">
                <label for="job">চাকুরীঃ</label>
                <input <?php echo $vls_status;?>  type="radio" id="job" required name="profession" value="চাকুরি"
                <?php
                if($data['profession'] == 'চাকুরি'){
                  echo "checked";
                }
                ?>
                >
              </div>
              <div class="pesa">
                <label for="farmer">কৃষিঃ</label>
                <input <?php echo $vls_status;?>  type="radio" id="farmer" required name="profession" value="কৃষি"
                <?php
                if($data['profession'] == 'কৃষি'){
                  echo "checked";
                }
                ?>
                >
              </div>
              <div class="pesa">
                <label for="labor">দিন-মজুরঃ</label>
                <input <?php echo $vls_status;?>  type="radio" id="labor" required name="profession" value="দিন-মজুর"
                <?php
                if($data['profession'] == 'দিন-মজুর'){
                  echo "checked";
                }
                ?>
                >
              </div>
              <div class="pesa">
                <label for="expatriate">প্রবাসীঃ</label>
                <input <?php echo $vls_status;?>  type="radio" id="expatriate" required name="profession" value="প্রবাসী"
                <?php
                if($data['profession'] == 'প্রবাসী'){
                  echo "checked";
                }
                ?>
                >
              </div>
              <div class="pesa">
                <label for="worker">শ্রমিকঃ</label>
                <input <?php echo $vls_status;?>  type="radio" id="worker" required name="profession" value="শ্রমিক"
                <?php
                if($data['profession'] == 'শ্রমিক'){
                  echo "checked";
                }
                ?>
                >
              </div>              
            </div>

            <br>
            <br>
            <hr>
            <br>
            <div class="radio_div">
              <label>গৃহের বিবরন <span class="requird_star">*</span></label>
              <br>              
              <div class="pesa">
                <label for="kacha">কাঁচাঃ</label>
                <input <?php echo $vls_status;?>  type="radio" id="kacha" required name="home" value="কাঁচা"
                <?php
                if($data['home'] == 'কাঁচা'){
                  echo "checked";
                }
                ?>
                >
              </div>
              
              <div class="pesa">
                <label for="paka">পাকাঃ</label>
                <input <?php echo $vls_status;?>  type="radio" id="paka" required name="home" value="পাকা"
                <?php
                if($data['home'] == 'পাকা'){
                  echo "checked";
                }
                ?>
                >
              </div>
              
              <div class="pesa">
                <label for="adhapaka">আধাপাকাঃ</label>
                <input <?php echo $vls_status;?>  type="radio" id="adhapaka" required name="home" value="আধাপাকা"
                <?php
                if($data['home'] == 'আধাপাকা'){
                  echo "checked";
                }
                ?>
                >
              </div>
              
              <div class="pesa">
                <label for="building">বিল্ডিংঃ</label>
                <input <?php echo $vls_status;?>  type="radio" id="building" required name="home" value="বিল্ডিং"
                <?php
                if($data['home'] == 'বিল্ডিং'){
                  echo "checked";
                }
                ?>
                >
              </div>
              
              <div class="pesa">
                <label for="tinset">টিনসেটঃ</label>
                <input <?php echo $vls_status;?>  type="radio" id="tinset" required name="home" value="টিনসেট"
                <?php
                if($data['home'] == 'টিনসেট'){
                  echo "checked";
                }
                ?>
                >
              </div>

            </div>
            <br>
            <br>

            
            <div>
            <label>স্থাপনার মুল্য <span class="requird_star">*</span></label>
            <input <?php echo $vls_status;?>  type="number" name="net_worth" class="input"  required value="<?php echo $data['net_worth']?>"/>
            </div>

            <div>
            <label>বার্ষিক কর</label>
            <input <?php echo $vls_status;?>  type="number" name="annual_tax" class="input"  value="<?php echo $data['annual_tax']?>"/>
            </div>

            <div>
            <label>নগদ কর</label>
            <input  type="number" name="ablable_tax" class="input"  value="<?php echo $data['ablable_tax']?>"/>
            </div>

            <div>
            <label>বকেয়া কর</label>
            <input  type="number" name="due_tax" class="input" value="<?php echo $data['due_tax']?>"/>
            </div>

            <div>
            <label>অর্থ বছর</label>
            <input  type="text" disabled name="present_year" class="input"  value="<?php echo $data['present_year']?>"/>
            </div>

            <div>
            <label>মোবাইল নং</label>
            <input <?php echo $vls_status;?>  type="text" name="mobile_no" class="input"  value="<?php echo $data['mobile_no']?>"/>
            </div>            

            <div>
            <label>ছবি</label>
            <img style="width:120px" src="../upload/<?php echo $data['file_name']?>" alt="image">            
            <input <?php echo $vls_status;?>  type="file" name="file" class="input"  value="<?php echo $data['file_name']?>"/>
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
              <input <?php echo $vls_status;?>  type="checkbox" name="sms_checkbox" class="input" value="odsfdsf"/>
              <span>করদাতার মোবাইলে SMS পাঠাতে এটি নির্বাচন করুন</span>
            </div> 

            <input <?php echo $vls_status;?>  class="btn submit_btn" name="submit" type="submit" value="সম্পাদন  করুন" />
          </form>
        </div>
      </section>

<!-- Side Navbar Links -->
<?php include("footer.php");?>
<!-- Side Navbar Links -->


<!-- Header -->
<?php include("header.php");?>
<!-- Header -->
<?php

if(isset($_POST['submit'])){
  $id_no = $_POST['id_no'];
  $name = $_POST['name'];
  $guardian_name = $_POST['guardian_name'];
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

  if( empty($id_no) || empty($name) || empty($guardian_name) || empty($ward) || empty($family_member) || empty($net_worth)){
    header("Location:tax-holder-add.php?err=সবগুলো ফিল্ড পুরন করুন!");
  }else{
    $sql = "INSERT INTO person (admin_id,id_no,name,guardian_name,division_id,district_id,upazila_id,union_id,ward,word_no,family_member,male,female,holding_no,nid_no,profession,home,net_worth,annual_tax,ablable_tax,due_tax,present_year,mobile_no,file_name,time) 
    VALUES ('$id','$id_no','$name','$guardian_name','$division_id','$district_id','$upazila_id','$union_id','$ward','$word_no','$family_member','$male','$female','$holding_no','$nid_no','$profession','$home','$net_worth','$annual_tax','$ablable_tax','$due_tax','$present_year','$mobile_no','$file_name','$time')";
    $insert = mysqli_query($conn,$sql);
    if($insert){
      header("location:up-tax-holder-add.php?msg=নতুন করদাতা যুক্ত হয়েছে");
    }else{
      echo "error";
    }
    
  }

}
?>   
      <!-- Page Content -->
      <section class="content_wrapper">
        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <div class="add_page_title">
            <span>নতুন করদাতা যুক্ত করুন</span>
          </div>
          
          <form id="edit_tax_holder_form" action="" method="POST" enctype="multipart/form-data">

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
            <label>ওয়ার্ড <span class="requird_star" >* </span></label>
            <select name="ward" id="ward" class="input" required>
              <option style="display:none;" value="নির্বাচন করুন">নির্বাচন করুন</option>
              <?php 
              $wards = mysqli_query($conn,"SELECT * FROM ward WHERE admin_id=$id");
              while($ward = mysqli_fetch_assoc($wards)){ ?>
                <option value="<?php echo $ward['id']?>"><?php echo $ward['bn_name']?></option>
             <?php }?>
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

            <br>
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

            <br>
            <br>
            <br>
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

            <br>
            <br>
            <hr>
            <br>
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
            <input type="text" disabled class="input"  value="<?php $present_year;?>"/>
            </div>

            <div>
            <label>মোবাইল নং</label>
            <input type="text" name="mobile_no" class="input" />
            </div> 

            <div>
            <label>ছবি</label>
            <input type="file" name="file" class="input" accept="image/*" />
            </div> 

            <br>
            <input class="btn submit_btn" name="submit" type="submit" value="যুক্ত করুন" />
          </form>
        </div>
      </section>


<!-- Side Navbar Links -->
<?php include("footer.php");?>
<!-- Side Navbar Links -->



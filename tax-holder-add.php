<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php

if(isset($_POST['submit'])){
  $id_no = $_POST['id_no'];
  $name = $_POST['name'];
  $guardian_name = $_POST['guardian_name'];
  $village = $_POST['village'];
  $section = $_POST['section'];
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
  $present_year = $_POST['present_year'];
  $mobile_no = $_POST['mobile_no'];


  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"upload/$file_name");
  if(empty($file_name)){
    $file_name = "avatar.jpg";
  } 

  if( empty($id_no) || empty($name) || empty($guardian_name) || empty($village) || empty($section) || empty($family_member) || empty($net_worth)){
    header("Location:tax-holder-add.php?err=Please Fill-Up Carefully!");
  }else{
    $sql = "INSERT INTO person (admin_id,id_no,name,guardian_name,village,section,word_no,family_member,male,female,holding_no,nid_no,profession,home,net_worth,annual_tax,ablable_tax,due_tax,present_year,mobile_no,file_name,time) 
    VALUES ('$id','$id_no','$name','$guardian_name','$village','$section','$word_no','$family_member','$male','$female','$holding_no','$nid_no','$profession','$home','$net_worth','$annual_tax','$ablable_tax','$due_tax','$present_year','$mobile_no','$file_name','$time')";
    $insert = mysqli_query($conn,$sql);
    if($insert){
      header("location:tax-holder-add.php?msg=নতুন করদাতা যুক্ত হয়েছে");
    }else{
      echo "error";
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
            <label>গ্রাম <span class="requird_star" >* </span></label>
            <select name="village" id="village" class="input" required>
              <option style="display:none;" value="নির্বাচন করুন">নির্বাচন করুন</option>
              <?php 
              $villages = mysqli_query($conn,"SELECT * FROM village WHERE admin_id=$id");
              while($village = mysqli_fetch_assoc($villages)){ ?>
                <option value="<?php echo $village['id']?>"><?php echo $village['name']?></option>
             <?php }?>
            </select>
            </div>

            <div>
            <label>পাড়া/মহল্লা <span class="requird_star">* </span></label>
            <select name="section" id="section" class="input" required>
            </select>
            </div>

            <div>
            <label>ওয়ার্ড নং </label>
            <input type="text" name="word_no" class="input" />
            </div>
            
            <div>
            <label>পরিবারের সদস্য সংখ্যা <span class="requird_star">*</span></label>
            <input type="number" name="family_member" class="input"  required/>
            </div>

            <br>
            <div class="radio_div">
              <div style="width:49%;float:left">
                <label>পুরুষ</label>
                <input type="number" name="male" class="input" />
              </div>
                
              <div style="width:49%;float:right">                  
                <label>মহিলা</label>
                <input type="number" name="female" class="input" />
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
            <input type="number" name="nid_no" class="input" />
            </div>

            <br>
            <div class="radio_div">
              <label>পেশা <span class="requird_star">*</span></label>
              <br>
              <div class="pesa">
                <label for="business">ব্যাবসাঃ</label>
                <input type="radio" id="business" required name="profession" value="ব্যাবসা">
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
            <input type="number" name="present_year" class="input"  value="<?php echo date("Y")?>"/>
            </div>

            <div>
            <label>মোবাইল নং</label>
            <input type="text" name="mobile_no" class="input" />
            </div> 

            <div>
            <label>ছবি</label>
            <input type="file" name="file" class="input" />
            </div> 

            <br>
            <input class="btn submit_btn" name="submit" type="submit" value="যুক্ত করুন" />
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>


<script>
    $(document).ready(function(){ 
      $("#village").on("change",function(){
        var vlg_id = $(this).val();
        $.ajax({
            url:"include/ajax.php",
            type:"GET",
            data:
            {
              reference:"section of village in tax_holder add page",
              id:<?php echo $id?>,
              vlg_id:vlg_id,
            },         
            success:function(data){
              // console.log(data);
              $("#section").html(data);
              }
            });
        })

    })
</script>

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>


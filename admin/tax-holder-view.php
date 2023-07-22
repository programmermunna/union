<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM person WHERE id='$id'"));
?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                <h6 class="text-white text-capitalize ps-3">করদাতার তথ্য</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-4">

                <div class="order-view">
                  <div class="edit">
                  <form id="edit_tax_holder_form" action="" method="POST" enctype="multipart/form-data">
                      <div>
                        <label>আইডি নং <span class="requird_star">*</span></label>
                        <input disabled type="number" name="id_no" class="input disabled" required value="<?php echo $data['id_no']?>"/>
                      </div>

                      <div>
                      <label>করদাতার নাম <span class="requird_star">* </span></label>
                      <input disabled type="text" name="name" class="input disabled" required value="<?php echo $data['name']?>"/>
                      </div>

                      <div>
                      <label>পিতা/স্বামীর নাম <span class="requird_star">* </span></label>
                      <input disabled type="text" name="guardian_name" class="input disabled" required value="<?php echo $data['guardian_name']?>"/>
                      </div>

                      <div>
                            <label>বিভাগ <span class="requird_star" >* </span></label>
                            <select disabled name="division" id="division" class="input division" required>
                              <?php 
                              $division_id =  $data['division_id'];
                              $division_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM divisions WHERE id=$division_id"));
                              ?>
                              <option selected value="<?php echo $division_name['bn_name'];?>"><?php echo $division_name['bn_name'];?></option>                              
                            </select>
                            </div>

                            <div>
                            <label>জেলা <span class="requird_star" >* </span></label>
                            <select disabled name="district" id="district" class="input " required>
                            <?php 
                              $district_id =  $data['district_id'];
                              $district_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM districts WHERE id=$district_id"));
                              ?>
                              <option selected value="<?php echo $district_name['bn_name'];?>"><?php echo $district_name['bn_name'];?></option>
                              
                            </select>
                            </div>

                            <div>
                            <label>উপজেলা <span class="requird_star" >* </span></label>
                            <select disabled name="upazila" id="upazila" class="input " required>
                            <?php 
                              $upazila_id =  $data['upazila_id'];
                              $upazila_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM upazilas WHERE id=$upazila_id"));
                              ?>
                              <option selected value="<?php echo $upazila_name['bn_name'];?>"><?php echo $upazila_name['bn_name'];?></option>

                            </select>
                            </div>

                            <div>
                            <label>ইউনিয়ন <span class="requird_star" >* </span></label>
                            <select disabled name="union" id="union" class="input " required>
                              <?php 
                              $union_id =  $data['union_id'];
                              $union_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM union_name WHERE id=$union_id"));
                              ?>
                              <option selected value="<?php echo $union_name['bn_name'];?>"><?php echo $union_name['bn_name'];?></option>
                              
                            </select>
                            </div>

                            <div>
                            <label>গ্রাম <span class="requird_star" >* </span></label>
                            <select disabled name="village" id="village" class="input " required>
                            <?php 
                              $village_id =  $data['village'];
                              $village_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM village WHERE id=$village_id"));
                              ?>
                              <option selected value="<?php echo $village_name['bn_name'];?>"><?php echo $village_name['bn_name'];?></option>
                              
                            </select>
                            </div>

                      <div>
                      <label>ওয়ার্ড নং <span class="requird_star">*</span></label>
                      <input disabled type="text" name="word_no" class="input disabled"  required value="<?php echo $data['word_no']?>"/>
                      </div>

                      <div>
                      <label>পরিবারের সদস্য সংখ্যা <span class="requird_star">*</span></label>
                      <input disabled type="number" name="family_member" class="input disabled"  required value="<?php echo $data['family_member']?>"/>
                      </div>

                      <div class="radio_div">
                        <div style="width:49%;float:left">
                          <label>পুরুষ</label>
                          <input disabled type="number" name="male" class="input disabled"  value="<?php echo $data['male']?>"/>
                        </div>
                          
                        <div style="width:49%;float:right">                  
                          <label>মহিলা</label>
                          <input disabled type="number" name="female" class="input disabled"  value="<?php echo $data['female']?>"/>
                        </div>
                      </div>

                      <div>
                      <label>হোল্ডিং নং</label>
                      <input disabled type="text" name="holding_no" class="input disabled" value="<?php echo $data['holding_no']?>"/>
                      </div>

                      <div>
                      <label>জাতীয় পরিচয়পত্র নং</label>
                      <input disabled type="number" name="nid_no" class="input disabled" value="<?php echo $data['nid_no']?>"/>
                      </div>

                      <br>
                      <div class="radio_div">
                        <label>পেশা <span class="requird_star">*</span></label>
                        <div class="pesa">
                          <label>ব্যবসাঃ</label>
                          <input disabled type="radio" required name="profession" value="ব্যবসা"
                          <?php
                          if($data['profession'] == 'ব্যবসা'){
                            echo "checked";
                          }
                          ?>
                          >
                        </div>
                        <div class="pesa">
                          <label>চাকুরীঃ</label>
                          <input disabled type="radio" required name="profession" value="চাকুরি"
                          <?php
                          if($data['profession'] == 'চাকুরি'){
                            echo "checked";
                          }
                          ?>
                          >
                        </div>
                        <div class="pesa">
                          <label>কৃষিঃ</label>
                          <input disabled type="radio" required name="profession" value="কৃষি"
                          <?php
                          if($data['profession'] == 'কৃষি'){
                            echo "checked";
                          }
                          ?>
                          >
                        </div>
                        <div class="pesa">
                          <label>দিন-মজুরঃ</label>
                          <input disabled type="radio" required name="profession" value="দিন-মজুর"
                          <?php
                          if($data['profession'] == 'দিন-মজুর'){
                            echo "checked";
                          }
                          ?>
                          >
                        </div>
                        <div class="pesa">
                          <label>প্রবাসীঃ</label>
                          <input disabled type="radio" required name="profession" value="প্রবাসী"
                          <?php
                          if($data['profession'] == 'প্রবাসী'){
                            echo "checked";
                          }
                          ?>
                          >
                        </div>
                        <div class="pesa">
                          <label>শ্রমিকঃ</label>
                          <input disabled type="radio" required name="profession" value="শ্রমিক"
                          <?php
                          if($data['profession'] == 'শ্রমিক'){
                            echo "checked";
                          }
                          ?>
                          >
                        </div>              
                      </div>
                      
                      <hr>

                      <div class="radio_div">
                        <label>গৃহের বিবরন <span class="requird_star">*</span></label>
                        <div class="pesa">
                          <label>কাঁচাঃ</label>
                          <input disabled type="radio" required name="home" value="কাঁচা"
                          <?php
                          if($data['home'] == 'কাঁচা'){
                            echo "checked";
                          }
                          ?>
                          >
                        </div>
                        
                        <div class="pesa">
                          <label>পাকাঃ</label>
                          <input disabled type="radio" required name="home" value="পাকা"
                          <?php
                          if($data['home'] == 'পাকা'){
                            echo "checked";
                          }
                          ?>
                          >
                        </div>
                        
                        <div class="pesa">
                          <label>আধাপাকাঃ</label>
                          <input disabled type="radio" required name="home" value="আধাপাকা"
                          <?php
                          if($data['home'] == 'আধাপাকা'){
                            echo "checked";
                          }
                          ?>
                          >
                        </div>
                        
                        <div class="pesa">
                          <label>বিল্ডিংঃ</label>
                          <input disabled type="radio" required name="home" value="বিল্ডিং"
                          <?php
                          if($data['home'] == 'বিল্ডিং'){
                            echo "checked";
                          }
                          ?>
                          >
                        </div>
                        
                        <div class="pesa">
                          <label>টিনসেটঃ</label>
                          <input disabled type="radio" required name="home" value="টিনসেট"
                          <?php
                          if($data['home'] == 'টিনসেট'){
                            echo "checked";
                          }
                          ?>
                          >
                        </div>
                      </div>
                      <br>

                      <div>
                      <label>স্থাপনার মুল্য <span class="requird_star">*</span></label>
                      <input disabled type="number" name="net_worth" class="input disabled"  required value="<?php echo $data['net_worth']?>"/>
                      </div>

                      <div>
                      <label>বার্ষিক কর</label>
                      <input disabled type="number" name="annual_tax" class="input disabled"  value="<?php echo $data['annual_tax']?>"/>
                      </div>

                      <div>
                      <label>নগদ কর</label>
                      <input disabled type="number" name="ablable_tax" class="input disabled"  value="<?php echo $data['ablable_tax']?>"/>
                      </div>

                      <div>
                      <label>বকেয়া কর</label>
                      <input disabled type="number" name="due_tax" class="input disabled" value="<?php echo $data['due_tax']?>"/>
                      </div>

                      <div>
                      <label>অর্থ বছর</label>
                      <input disabled type="number" name="present_year" class="input disabled"  value="<?php echo $data['present_year']?>"/>
                      </div>

                      <div>
                      <label>মোবাইল নং</label>
                      <input disabled type="text" name="mobile_no" class="input disabled"  value="<?php echo $data['mobile_no']?>"/>
                      </div> 

                      <div>
                      <label>স্টাটাস</label>
                          <input disabled type="text" name="status" class="input disabled"  value="<?php echo $data['status']?>"/>                
                      </select>
                      </div> 

                      <div>
                      <label>ছবি</label>
                      <img style="width:220px;margin:auto" src="../upload/<?php echo $data['file_name']?>" alt="image">
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
    $(document).ready(function(){ 
      $("#union").on("change",function(){
        var union_id = $(this).val();
        $.ajax({
            url:"../include/ajax.php",
            type:"GET",
            data:
            {
              reference:"village of union in admin/tax-holder-add page",
              union_id:union_id,
            },         
            success:function(data){
              console.log(data);
              $("#village").html(data);
              }
            });
        })

    })
</script>
  
  <?php include("common/footer.php")?>



  
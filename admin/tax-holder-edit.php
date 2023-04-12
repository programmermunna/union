<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
<?php

if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM person WHERE id='$id'"));

if(isset($_POST['submit'])){
  $id_no = $_POST['id_no'];
  $name = $_POST['name'];
  $guardian_name = $_POST['guardian_name'];

  $admin_id = $_POST['union']; 
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
  $present_year = date("Y");
  $mobile_no = $_POST['mobile_no'];
  $status = $_POST['status'];


 echo $file_name = $_FILES['file']['name']; 
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"../upload/$file_name");
  if(empty($file_name)){
    $file_name = $data['file_name'];
  } 

  if( empty($admin_id) || empty($id_no) || empty($name) || empty($guardian_name) || empty($village) || empty($section) || empty($family_member) || empty($word_no) || empty($net_worth)){
    header("Location:tax-holder-add.php?err=Please Fill-Up Carefully!");
  }else{
    $sql = "UPDATE person SET  admin_id='$admin_id', id_no='$id_no', name='$name', guardian_name='$guardian_name', village='$village', section='$section', word_no='$word_no', family_member='$family_member', male='$male', female='$female', holding_no='$holding_no', nid_no='$nid_no', profession='$profession', home='$home', net_worth='$net_worth', annual_tax='$annual_tax', ablable_tax='$ablable_tax', due_tax='$due_tax', mobile_no='$mobile_no', status='$status',file_name='$file_name' WHERE id=$id";
    $update = mysqli_query($conn,$sql);
    if($update){
      header("location:tax-holder.php?msg=করদাতা সম্পাদন হয়েছে");
    }else{
      echo "error";
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
                            <div>
                            <label>আইডি নং <span class="requird_star">*</span></label>
                            <input type="number" name="id_no" class="input" required value="<?php echo $data['id_no']?>"/>
                            </div>

                            <div>
                            <label>করদাতার নাম <span class="requird_star">* </span></label>
                            <input type="text" name="name" class="input" required value="<?php echo $data['name']?>"/>
                            </div>

                            <div>
                            <label>পিতা/স্বামীর নাম <span class="requird_star">* </span></label>
                            <input type="text" name="guardian_name" class="input" required value="<?php echo $data['guardian_name']?>"/>
                            </div>

                            <div>
                            <label>ইউনিয়ন <span class="requird_star" >* </span></label>
                            <select name="union" id="union" class="input" required>
                              <?php
                              $admin_id = $data['admin_id'];
                              $selected_union = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM union_name WHERE admin_id=$admin_id")); ?>
                                <option selected value="<?php echo $selected_union['admin_id']?>"><?php echo $selected_union['union_name']?></option>                              

                             <?php $unions = mysqli_query($conn,"SELECT * FROM union_name");
                              while($union = mysqli_fetch_assoc($unions)){ ?>
                                <option value="<?php echo $union['admin_id']?>"><?php echo $union['union_name']?></option>
                            <?php }?>
                            </select>
                            </div>

                            <div>
                            <label>গ্রাম <span class="requird_star" >* </span></label>
                            <select name="village" id="village" class="input" required>
                            <?php 
                              $vlg_id = $data['village'];
                              $selected_village = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM village WHERE id=$vlg_id"));
                              ?>
                              <option value="<?php echo $selected_village['id']?>"><?php echo $selected_village['name']?></option>

                              <?php 
                              $villages = mysqli_query($conn,"SELECT * FROM village");
                              while($village = mysqli_fetch_assoc($villages)){ ?>
                                <option value="<?php echo $village['id']?>"><?php echo $village['name']?></option>
                            <?php }?>
                              <option style="display:none;" value="নির্বাচন করুন">নির্বাচন করুন</option>
                              
                            </select>
                            </div>

                            <div>
                            <label>পাড়া/মহল্লা <span class="requird_star">* </span></label>
                            <select name="section" id="section" class="input" required value="<?php echo $data['section']?>">
                            <?php 
                              $section_id = $data['section'];
                              $selected_section = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM section WHERE id=$section_id"));
                              ?>
                              <option value="<?php echo $selected_section['id']?>"><?php echo $selected_section['name']?></option>              
                            </select>
                            </div>

                            <div>
                            <label>ওয়ার্ড নং <span class="requird_star">*</span></label>
                            <input type="text" name="word_no" class="input"  required value="<?php echo $data['word_no']?>"/>
                            </div>
                            
                            <div>
                            <label>পরিবারের সদস্য সংখ্যা <span class="requird_star">*</span></label>
                            <input type="number" name="family_member" class="input"  required value="<?php echo $data['family_member']?>"/>
                            </div>

                            <br>
                            <div class="radio_div">
                              <div style="width:49%;float:left">
                                <label>পুরুষ</label>
                                <input type="number" name="male" class="input"  value="<?php echo $data['male']?>"/>
                              </div>
                                
                              <div style="width:49%;float:right">                  
                                <label>মহিলা</label>
                                <input type="number" name="female" class="input"  value="<?php echo $data['female']?>"/>
                              </div>
                            </div>

                            <div>
                            <label>হোল্ডিং নং</label>
                            <input type="text" name="holding_no" class="input" />
                            </div>

                            <div>
                            <label>জাতীয় পরিচয়পত্র নং</label>
                            <input type="number" name="nid_no" class="input" />
                            </div>

                            <br>
                            <div>
                            <label>জাতীয় পরিচয়পত্র নং</label>
                            <input type="number" name="nid_no" class="input" value="<?php echo $data['nid_no']?>"/>
                            </div>

                            <br>
                            <div class="radio_div">
                              <label>পেশা <span class="requird_star">*</span></label>
                              <br>
                              <div class="pesa">
                                <label for="business">ব্যাবসাঃ</label>
                                <input type="radio" id="business" required name="profession" value="ব্যাবসা"
                                <?php
                                if($data['profession'] == 'ব্যাবসা'){
                                  echo "checked";
                                }
                                ?>
                                >
                              </div>
                              <div class="pesa">
                                <label for="job">চাকুরীঃ</label>
                                <input type="radio" id="job" required name="profession" value="চাকুরি"
                                <?php
                                if($data['profession'] == 'চাকুরি'){
                                  echo "checked";
                                }
                                ?>
                                >
                              </div>
                              <div class="pesa">
                                <label for="farmer">কৃষিঃ</label>
                                <input type="radio" id="farmer" required name="profession" value="কৃষি"
                                <?php
                                if($data['profession'] == 'কৃষি'){
                                  echo "checked";
                                }
                                ?>
                                >
                              </div>
                              <div class="pesa">
                                <label for="labor">দিন-মজুরঃ</label>
                                <input type="radio" id="labor" required name="profession" value="দিন-মজুর"
                                <?php
                                if($data['profession'] == 'দিন-মজুর'){
                                  echo "checked";
                                }
                                ?>
                                >
                              </div>
                              <div class="pesa">
                                <label for="expatriate">প্রবাসীঃ</label>
                                <input type="radio" id="expatriate" required name="profession" value="প্রবাসী"
                                <?php
                                if($data['profession'] == 'প্রবাসী'){
                                  echo "checked";
                                }
                                ?>
                                >
                              </div>
                              <div class="pesa">
                                <label for="worker">শ্রমিকঃ</label>
                                <input type="radio" id="worker" required name="profession" value="শ্রমিক"
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
                              <br>              
                              <div class="pesa">
                                <label for="kacha">কাঁচাঃ</label>
                                <input type="radio" id="kacha" required name="home" value="কাঁচা"
                                <?php
                                if($data['home'] == 'কাঁচা'){
                                  echo "checked";
                                }
                                ?>
                                >
                              </div>
                              
                              <div class="pesa">
                                <label for="paka">পাকাঃ</label>
                                <input type="radio" id="paka" required name="home" value="পাকা"
                                <?php
                                if($data['home'] == 'পাকা'){
                                  echo "checked";
                                }
                                ?>
                                >
                              </div>
                              
                              <div class="pesa">
                                <label for="adhapaka">আধাপাকাঃ</label>
                                <input type="radio" id="adhapaka" required name="home" value="আধাপাকা"
                                <?php
                                if($data['home'] == 'আধাপাকা'){
                                  echo "checked";
                                }
                                ?>
                                >
                              </div>
                              
                              <div class="pesa">
                                <label for="building">বিল্ডিংঃ</label>
                                <input type="radio" id="building" required name="home" value="বিল্ডিং"
                                <?php
                                if($data['home'] == 'বিল্ডিং'){
                                  echo "checked";
                                }
                                ?>
                                >
                              </div>
                              
                              <div class="pesa">
                                <label for="tinset">টিনসেটঃ</label>
                                <input type="radio" id="tinset" required name="home" value="টিনসেট"
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
                            <input type="number" name="net_worth" class="input"  required value="<?php echo $data['net_worth']?>"/>
                            </div>

                            <div>
                            <label>বার্ষিক কর</label>
                            <input type="number" name="annual_tax" class="input"  value="<?php echo $data['annual_tax']?>"/>
                            </div>

                            <div>
                            <label>নগদ কর</label>
                            <input type="number" name="ablable_tax" class="input"  value="<?php echo $data['ablable_tax']?>"/>
                            </div>

                            <div>
                            <label>বকেয়া কর</label>
                            <input type="number" name="due_tax" class="input" value="<?php echo $data['due_tax']?>"/>
                            </div>

                            <div>
                            <label>অর্থ বছর</label>
                            <input type="number" disabled name="present_year" class="input"  value="<?php echo $data['present_year']?>"/>
                            </div>

                            <div>
                            <label>মোবাইল নং</label>
                            <input type="text" name="mobile_no" class="input"  value="<?php echo $data['mobile_no']?>"/>
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

                            <div>
                            <label>ছবি</label>
                            <img style="width:120px" src="../upload/<?php echo $data['file_name']?>" alt="image">            
                            <input type="file" name="file" class="input"/>
                            </div> 

                            <div>                            
                              <input style="width:100%;margin:10px 0" name="submit" class="submit_btn" type="submit" value="Save">
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                </div>

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

      $("#village").on("change",function(){
        var vlg_id = $(this).val();
        $.ajax({
            url:"../include/ajax.php",
            type:"GET",
            data:
            {
              reference:"section of village in admin/tax-holder-add page",
              vlg_id:vlg_id,
            },         
            success:function(data){
              console.log(data);
              $("#section").html(data);
              }
            });
        })

    })
</script>
  
  <?php include("common/footer.php")?>
  <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>



  
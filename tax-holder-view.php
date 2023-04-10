<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM person WHERE id='$id'"));
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
          </div>
          
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
            <label>গ্রাম <span class="requird_star" >* </span></label>
            <select disabled name="village" id="village" class="input disabled" required>
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
            </select>
            </div>

            <div>
            <label>পাড়া/মহল্লা <span class="requird_star">* </span></label>
            <select disabled name="section" id="section" class="input disabled" required value="<?php echo $data['section']?>">
            <?php 
              $section_id = $data['section'];
              $selected_section = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM section WHERE id=$section_id"));
              ?>
              <option value="<?php echo $selected_section['id']?>"><?php echo $selected_section['name']?></option>              
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

            <br>
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

            <br>
            <br>
            <br>
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
              <br>
              <div class="pesa">
                <label>ব্যাবসাঃ</label>
                <input disabled type="radio" required name="profession" value="ব্যাবসা"
                <?php
                if($data['profession'] == 'ব্যাবসা'){
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

            <br>
            <br>
            <hr>
            <br>
            <div class="radio_div">
              <label>গৃহের বিবরন <span class="requird_star">*</span></label>
              <br>              
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
            <label>ছবি</label>
            <img style="width:220px;margin:auto" src="upload/<?php echo $data['file_name']?>" alt="image">
            </div> 
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
              reference:"section of village",
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


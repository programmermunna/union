<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php
if(isset($_GET['id'])){
  $id = $_GET['id'];
}
$row = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM customer WHERE id='$id'"));


if(isset($_POST['submit'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $city = $_POST['city'];
  $time = time();

  $file_name = $_FILES['file']['name'];
  $file_tmp = $_FILES['file']['tmp_name'];
  move_uploaded_file($file_tmp,"upload/$file_name");

  if(empty($file_name)){
    $sql = "UPDATE customer SET name='$name', email='$email', phone='$phone', address='$address',city='$city',time='$time' WHERE id='$id'";
  }else{
  $sql = "UPDATE customer SET name='$name', email='$email', phone='$phone', address='$address',city='$city', file='$file_name', time='$time' WHERE id='$id'";
  }
  
  $query = mysqli_query($conn,$sql);
  if($query){
  $msg = "Successfully Updated Customer!";
  header("location:customer-edit.php?msg=$msg&&id=$id");
  }else{
  $msg = "Something is worng!";
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
            <span>Customer Information</span>
          </div>
          
          <form id="edit_customer_form" action="" method="POST" enctype="multipart/form-data">

            <div>
              <label>ক্রমিক নংঃ <span class="requird_star">*</span></label>
              <input type="text" name="name" class="input" />
            </div>

            <div>
            <label>করদাতার নাম <span class="requird_star">* </span></label>
            <input type="text" name="email" class="input"/>
            </div>

            <div>
            <label>পিতা/স্বামীর নাম <span class="requird_star">* </span></label>
            <input type="text" name="phone" class="input"/>
            </div>

            <div>
            <label>গ্রাম/পাড়া/মহল্লা <span class="requird_star">* </span></label>
            <input type="text" name="address" class="input" />
            </div>

            <div>
            <label>ওয়ার্ড নং <span class="requird_star">*</span></label>
            <input type="text" name="city" class="input" />
            </div>
            
            <div>
            <label>পরিবারের সদস্য সংখ্যা <span class="requird_star">*</span></label>
            <input type="text" name="city" class="input" />
            </div>

            <br>
            <div class="radio_div">
              <div style="width:49%;float:left">
                <label>পুরুষ</label>
                <input type="text" name="city" class="input" />
              </div>
                
              <div style="width:49%;float:right">                  
                <label>মহিলা</label>
                <input type="text" name="city" class="input" />
              </div>
            </div>

            <br>
            <br>
            <br>
            <div>
            <label>হোল্ডিং নং</label>
            <input type="text" name="city" class="input" />
            </div>

            <div>
            <label>জাতীয় পরিচয়পত্র নং</label>
            <input type="text" name="city" class="input" />
            </div>

            <br>
            <div class="radio_div">
              <label>পেশা</label>
              <br>
              <div class="pesa">
                <label>ব্যাবসাঃ</label>
                <input type="radio" id="html" name="fav_language" value="HTML">
              </div>
              <div class="pesa">
                <label>চাকুরীঃ</label>
                <input type="radio" id="html" name="fav_language" value="HTML">
              </div>
              <div class="pesa">
                <label>কৃষিঃ</label>
                <input type="radio" id="html" name="fav_language" value="HTML">
              </div>
              <div class="pesa">
                <label>দিন-মজুরঃ</label>
                <input type="radio" id="html" name="fav_language" value="HTML">
              </div>
              <div class="pesa">
                <label>প্রবাসীঃ</label>
                <input type="radio" id="html" name="fav_language" value="HTML">
              </div>
              <div class="pesa">
                <label>শ্রমিকঃ</label>
                <input type="radio" id="html" name="fav_language" value="HTML">
              </div>              
            </div>

            <br>
            <br>
            <hr>
            <br>
            <div class="radio_div">
              <label>গৃহের বিবরন</label>
              <br>              
              <div class="pesa">
                <label>কাঁচাঃ</label>
                <input type="radio" id="html" name="fav_language" value="HTML">
              </div>
              
              <div class="pesa">
                <label>পাকাঃ</label>
                <input type="radio" id="html" name="fav_language" value="HTML">
              </div>
              
              <div class="pesa">
                <label>আধাপাকাঃ</label>
                <input type="radio" id="html" name="fav_language" value="HTML">
              </div>
              
              <div class="pesa">
                <label>বিল্ডিংঃ</label>
                <input type="radio" id="html" name="fav_language" value="HTML">
              </div>
              
              <div class="pesa">
                <label>টিনসেটঃ</label>
                <input type="radio" id="html" name="fav_language" value="HTML">
              </div>

            </div>
            <br>
            <br>


            
            <div>
            <label>স্থাপনার মুল্য <span class="requird_star">*</span></label>
            <input type="text" name="city" class="input" />
            </div>

            <div>
            <label>বার্ষিক কর</label>
            <input type="text" name="city" class="input" />
            </div>

            <div>
            <label>নগদ কর</label>
            <input type="text" name="city" class="input" />
            </div>

            <div>
            <label>বকেয়া কর</label>
            <input type="text" name="city" class="input" />
            </div>

            <div>
            <label>অর্থ বছর</label>
            <input type="text" name="city" class="input" />
            </div>

            <div>
            <label>মোবাইল নং</label>
            <input type="text" name="city" class="input" />
            </div>


            <input class="btn submit_btn" name="submit" type="submit" valu="Update" />
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>


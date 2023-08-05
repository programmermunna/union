
        <main>
            <section class="hero" style="padding:30px 0">
                <div class="container">
                    <div class="hero-inners">
						<div class="card2">							
          <form id="edit_tax_holder_form tax_result" action="" method="POST">
            
          <div>
            <label>ওয়ার্ড </label>
            <select disabled name="ward" id="ward" class="input" required>
                <option selected value="<?php echo $ward['id']?>"><?php echo $ward['bn_name']?></option>
            </select>
            </div>

            <div>
            <label>গ্রাম/পাড়া</label>
            <input disabled type="text" name="village" class="input" value="<?php echo $data['village']?>" />
            </div>

            <div>
            <label>হোল্ডিং নাম্বার</label>
            <input disabled type="text" name="holding" class="input" value="<?php echo $data['holding']?>" />
            </div>

            <div>
            <label>বাৎসরিক গড় আয়</label>
            <input disabled type="text" name="annual_avg_income" class="input" value="<?php echo $data['annual_avg_income']?>" />
            </div>

            <div>
            <label>খানা প্রধানের নাম </label>
            <input disabled type="text" name="tax_holder_name" class="input" value="<?php echo $data['tax_holder_name']?>" />
            </div>

            <div>
            <label>নাম (ইংরেজীতে)</label>
            <input disabled type="text" name="tax_holder_name_en" class="input" value="<?php echo $data['tax_holder_name_en']?>" />
            </div>

            <div>
            <label>শিক্ষাগত যোগ্যতা </label>
            <input disabled type="text" name="education" class="input" value="<?php echo $data['education']?>" />
            </div> 

            <div>
            <label>মোবাইল নাম্বার</label>
            <input disabled type="text" name="phone" class="input" value="<?php echo $data['phone']?>" />
            </div>

            <div>
            <label>পিতা/স্বামীর নাম </label>
            <input disabled type="text" name="father_hasbend_name" class="input" value="<?php echo $data['father_hasbend_name']?>" />
            </div>            

            <div>
            <label>মাতার নাম </label>
            <input disabled type="text" name="mother_name" class="input" value="<?php echo $data['mother_name']?>" />
            </div>            
            
            <div>
            <label>জন্ম তারিখ</label>
            <input disabled type="text" name="date_of_birth" class="input" value="<?php echo $data['date_of_birth']?>" />
            </div>
            
            <div>
            <label>জন্ম নিবন্ধন</label>
            <input disabled type="text" name="birth_date" class="input" value="<?php echo $data['birth_date']?>" />
            </div>            
            
            <div>
            <label>এনআইডি নাম্বার</label>
            <input disabled type="text" name="nid_no" class="input" value="<?php echo $data['nid_no']?>" />
            </div>

            <div>
            <label>সামাজিক সুবিধা</label>
            <input disabled type="text" name="social_benifit_1" class="input" value="<?php echo $data['social_benifit_1']?>" />
            <input disabled type="text" name="social_benifit_2" class="input" value="<?php echo $data['social_benifit_2']?>" />
            <input disabled type="text" name="social_benifit_3" class="input" value="<?php echo $data['social_benifit_3']?>" />
            </div>

              
            <div>
            <label>খানা প্রধানের লিঙ্গ</label>
            <input disabled type="text" name="nid_no" class="input" value="<?php echo $data['gender']?>" />
            </div>
              
            <div>
            <label>খানা প্রধানের ধর্ম</label>
            <input disabled type="text" name="nid_no" class="input" value="<?php echo $data['religion']?>" />
            </div>
              
            <div>
            <label>পেশা</label>
            <input disabled type="text" name="nid_no" class="input" value="<?php echo $data['profession']?>" />
            </div>
              
            <div>
            <label>নলকুপ আছে কিনা</label>
            <input disabled type="text" name="nid_no" class="input" value="<?php echo $data['nolkup']?>" />
            </div>
              
            <div>
            <label>পায়খানার ধরন</label>
            <input disabled type="text" name="nid_no" class="input" value="<?php echo $data['toilet']?>" />
            </div>           

            
            <div class="radio_div">
              <div style="width:49%;float:left">
                <label>সদস্যের নাম </label>
                <input disabled type="text" name="relation_1" class="input" value="<?php echo $data['relation_1']?>" />
              </div>
                
              <div style="width:49%;float:right">                  
                <label>সদস্যের সম্পর্ক </label>
                <select disabled name="relation_type_1" id="ward" class="input" required>
                <option selected value="<?php echo $data['relation_type_1']?>"><?php echo $data['relation_type_1']?></option>          
                </select>
              </div>
            </div>

            <div class="radio_div">
              <div style="width:49%;float:left">
                <label>সদস্যের নাম </label>
                <input disabled type="text" name="relation_2" class="input" value="<?php echo $data['relation_2']?>" />
              </div>                
              <div style="width:49%;float:right">                  
                <label>সদস্যের সম্পর্ক </label>
                <select disabled name="relation_type_2" id="ward" class="input" required>
                <option selected value="<?php echo $data['relation_type_2']?>"><?php echo $data['relation_type_2']?></option>           
                </select>
              </div>
            </div>


            <div>
            <label>অবকাঠামোর ধরন</label>
            <input disabled type="text" name="nid_no" class="input" value="<?php echo $data['home']?>" />
            </div>

            <div>
            <label>অবকাঠামোর ধরন</label>
            <input disabled type="text" name="nid_no" class="input" value="<?php echo $data['home_type']?>" />
            </div>

            <div>
            <label>বসবাসের ধরন</label>
            <input disabled type="text" name="nid_no" class="input" value="<?php echo $data['home_owner']?>" />
            </div>

            <div>
            <label>বাৎসরিক ভাড়া</label>
            <input disabled type="text" name="annual_rent" class="input" value="<?php echo $data['annual_rent']?>" />
            </div>     
            
            <div>
            <label>পুর্বের বকেয়া</label>
            <input disabled type="text" name="previous_due" class="input" value="<?php echo $data['previous_due']?>" />
            </div>  
            
            <div>
            <label>বর্তমান কর</label>
            <input disabled type="text" name="present_tax" class="input" value="<?php echo $data['present_tax']?>" />
            </div>

            <div>
            <label>আদায়কৃত কর</label>
            <input disabled type="text" name="collect_tax" class="input" value="<?php echo $data['collect_tax']?>" />
            </div>  

            <div>
            <label>বকেয়া কর</label>
            <input disabled type="text" name="due_tax" class="input" value="<?php echo $data['collect_tax']?>" />
            </div>  


            <div>
            <label>ছবি</label>
            <img style="width:60%;margin:auto;" src="upload/<?php echo $data['file']?>" alt="<?php echo $data['file']?>">
            </div>
            <br>
          </form>
							</div>
						</div>
                    </div>
                </div>
            </section>
        </main>

<?php include("common/home-footer.php")?>


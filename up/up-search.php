<!-- Header -->
<?php include("header.php");?>
<!-- Header -->  
    <!-- Main Content -->
    <main class="main_content">

      <!-- Page Content -->
      <section class="content_wrapper">
        <!-- Page Main Content -->
        <div class="add_page_main_content">
          <div class="add_page_title">
            <span>তথ্য হালনাগাদ করুন</span>
          </div>
          
          <form id="edit_tax_holder_form" action="up-search-result.php" method="POST">
        
            <div>
            <label>হোল্ডিং নাম্বার</label>
            <input type="text" name="village" class="input" required placeholder="হোল্ডিং নাম্বার"/>
           
            </div>

            <div>
            <label>অর্থবছর</label>
             <select style="width: 100$;" class="input" id="year" name="year">
                <?php 
                $years = mysqli_query($conn,"SELECT DISTINCT present_year FROM tax_holder WHERE admin_id=$id ORDER BY id DESC");
                while($data = mysqli_fetch_assoc($years)){ ?>
                <option value="<?php echo $data['present_year']?>"><?php echo $data['present_year']?></option>
                <?php  }?>
            </select>
            </div>

            <br>
            <input style="color:#000"  class="btn submit_btn" name="submit" type="submit" value="সার্চ করুন" />
          </form>
        </div>
      </section>
      <!-- Page Content -->
    </main>


<!-- Side Navbar Links -->
<?php include("footer.php");?>
<!-- Side Navbar Links -->



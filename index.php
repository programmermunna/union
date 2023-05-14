<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 
     
    $present_year = date("Y",time());
    $total_tax_holder = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM person WHERE admin_id=$id"));
    $pending_tax_holder = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM person WHERE admin_id=$id AND present_year=$present_year AND status='Pending'"));
    $success_tax_holder = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM person WHERE admin_id=$id AND present_year=$present_year AND status='Success'"));
    $village = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM village WHERE admin_id=$id"));
    $section = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM section WHERE admin_id=$id"));
    
    $annual_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(annual_tax) FROM person WHERE admin_id=$id"));
    $ablable_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ablable_tax) FROM person WHERE  admin_id=$id  AND status='Success'"));
    $due_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_tax) FROM person WHERE admin_id=$id AND status='Success'"));

    $annual_tax = $annual_tax['SUM(annual_tax)'];
    $ablable_tax = $ablable_tax['SUM(ablable_tax)'];
    $due_tax = $due_tax['SUM(due_tax)'];
    

    //this year data
    $this_year_annual_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(annual_tax) FROM person WHERE admin_id=$id AND present_year=$present_year"));
    $this_year_ablable_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ablable_tax) FROM person WHERE  admin_id=$id  AND status='Success' AND present_year=$present_year"));
    $this_year_due_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_tax) FROM person WHERE admin_id=$id AND status='Success' AND present_year=$present_year"));

    $this_year_annual_tax = $this_year_annual_tax['SUM(annual_tax)'];
    $this_year_ablable_tax = $this_year_ablable_tax['SUM(ablable_tax)'];
    $this_year_due_tax = $this_year_due_tax['SUM(due_tax)'];

?>
    <!-- Main Content -->
    <main class="w-full flex bg-gray-100">
      <!-- Side Navbar Links -->
      <?php include('common/sidebar.php')?>
      <!-- Side Navbar Links -->

      <!-- Content -->
      <section class="content_wrapper">


      <br>
          <div style="width:100%;background:#ddd;"><h3 style="text-align:center;padding:5px;color:#1f54dd;font-weight:bold;">সমস্ত হিসাব</h3></div>
        <br>

        <div class="home_content">
           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo $annual_tax?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">সমস্ত কর</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>  
           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo $ablable_tax?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">জমাকৃত কর</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>  
           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo $due_tax?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">বকেয়া কর</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>  

        </div>


        <br>
          <div style="width:100%;background:#ddd;"><h3 style="text-align:center;padding:5px;color:#1f54dd;font-weight:bold;">সমস্ত তথ্য</h3></div>
        <br>

        <div class="home_content">
           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $total_tax_holder?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">করদাতা</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>  
           

          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $village?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">গ্রাম</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>      
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $section?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">পাড়া</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>      

          
        </div>

        <br>
        <div style="width:100%;background:#ddd;"><h3 style="text-align:center;padding:5px;color:#1f54dd;font-weight:bold;">অর্থ বছরের কর (<?php echo $present_year;?>)</h3></div>
        <br>

        <div class="home_content">
           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo $this_year_annual_tax ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">সমস্ত কর</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>
           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo $this_year_ablable_tax ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">জমাকৃত কর</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>
           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo $this_year_due_tax ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">বকেয়া কর</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

           <!-- ------box------ -->
           <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $success_tax_holder?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">পরিশোধিত</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>  
           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers"><?php echo $pending_tax_holder?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">অপরিশোধিত</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div> 
<br>
        </div>
      </section>
      <!-- Content -->
    </main>

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->


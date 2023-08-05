<?php include("header.php"); ?>
<?php
    // $present_year = date("Y",time());
    $total_tax_holder = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tax_holder WHERE admin_id=$id"));
    $success_tax_holder = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tax_holder WHERE admin_id=$id AND status='Success'"));
    $pending_tax_holder = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM tax_holder WHERE admin_id=$id AND status='Pending'"));
    $ward = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM ward WHERE admin_id=$id"));
    
    $present_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(present_tax) FROM tax_holder WHERE admin_id=$id"));
    $collect_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(collect_tax) FROM tax_holder WHERE  admin_id=$id  AND status='Success'"));
    $due_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_tax) FROM tax_holder WHERE admin_id=$id AND status='Success'"));

    $present_tax = $present_tax['SUM(present_tax)'];
    $collect_tax = $collect_tax['SUM(collect_tax)'];
    $due_tax = $due_tax['SUM(due_tax)'];
    

    //this year data
    $this_year_present_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(present_tax) FROM tax_holder WHERE admin_id=$id AND present_year='$present_year'"));
    $this_year_collect_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(collect_tax) FROM tax_holder WHERE  admin_id=$id  AND status='Success' AND present_year='$present_year'"));
    $this_year_due_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_tax) FROM tax_holder WHERE admin_id=$id AND status='Success' AND present_year='$present_year'"));

    $this_year_present_tax = $this_year_present_tax['SUM(present_tax)'];
    $this_year_collect_tax = $this_year_collect_tax['SUM(collect_tax)'];
    $this_year_due_tax = $this_year_due_tax['SUM(due_tax)'];
?>

<section class="content_wrapper">
<br>
    <div style="width:100%;background:#ddd;"><h3 style="text-align:center;padding:5px;color:#1f54dd;font-weight:bold;">সমস্ত হিসাব</h3></div>
  <br>

  <div class="home_content">
     <!-- ------box------ -->
    <div class="home_card" style="background:linear-gradient(160deg, #0093E9 37%, #80D0C7 100%)">
      <div>
        <div class="card_top">
          <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
          <div class="card_top_info">
            <p class="card_top_numbers">৳<?php echo $present_tax?></p>                  
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
    <div class="home_card" style="background:linear-gradient(160deg, #0093E9 37%, #80D0C7 100%)">
      <div>
        <div class="card_top">
          <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
          <div class="card_top_info">
            <p class="card_top_numbers">৳<?php echo $collect_tax?></p>                  
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
    <div class="home_card" style="background:linear-gradient(160deg, #0093E9 37%, #80D0C7 100%)">
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
    <div class="home_card" style="background:linear-gradient(160deg, #cc2b5e 37%, #753a88 100%)">
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
     

    <div class="home_card" style="background:linear-gradient(160deg, #cc2b5e 37%, #753a88 100%)">
      <div>
        <div class="card_top">
          <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
          <div class="card_top_info">
            <p class="card_top_numbers"><?php echo $ward?></p>                  
          </div>
        </div>
        <div class="card_bottom">
          <div class="card_percentage">
            <p style="margin: 0 auto;">ওয়ার্ড</p>
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
    <div class="home_card" style="background:linear-gradient(160deg, #34e89e 37%, #0f3443 100%)">
      <div>
        <div class="card_top">
          <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
          <div class="card_top_info">
            <p class="card_top_numbers">৳<?php echo $this_year_present_tax ?></p>                  
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
    <div class="home_card" style="background:linear-gradient(160deg, #34e89e 37%, #0f3443 100%)">
      <div>
        <div class="card_top">
          <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
          <div class="card_top_info">
            <p class="card_top_numbers">৳<?php echo $this_year_collect_tax ?></p>                  
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
    <div class="home_card" style="background:linear-gradient(160deg, #34e89e 37%, #0f3443 100%)">
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
     <div class="home_card" style="background:linear-gradient(160deg, #34e89e 37%, #0f3443 100%)">
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
    <div class="home_card" style="background:linear-gradient(160deg, #34e89e 37%, #0f3443 100%)">
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

<?php include("footer.php");?>
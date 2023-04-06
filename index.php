<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 
     
    $date = date("F Y",time());
    $customer = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM person WHERE admin_id=$id"));

?>
    <!-- Main Content -->
    <main class="w-full flex bg-gray-100">
      <!-- Side Navbar Links -->
      <?php include('common/sidebar.php')?>
      <!-- Side Navbar Links -->

      <!-- Content -->
      <section class="content_wrapper">

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
                  <p class="card_top_numbers">৳<?php echo 22?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">সমস্ত খরচ</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>      

          
        </div>

        <br>
        <div style="width:100%;background:#ddd;"><h3 style="text-align:center;padding:5px;color:#1f54dd;font-weight:bold;">এই মাস</h3></div>
        <br>

        <div class="home_content">
           <!-- ------box------ -->
          <div class="home_card">
            <div>
              <div class="card_top">
                <div class="card_top_icon from-blue-500 to-blue-600">&#x2637</div>
                <div class="card_top_info">
                  <p class="card_top_numbers">৳<?php echo 222 ?></p>                  
                </div>
              </div>
              <div class="card_bottom">
                <div class="card_percentage">
                  <p style="margin: 0 auto;">এই মাসের খরচ</p>
                </div>
                <div class="card_line">
                  <div style="width: 100%" class="from-blue-500 via-blue-600 to-blue-700"></div>
                </div>
              </div>
            </div>
          </div>

        </div>
      </section>
      <!-- Content -->
    </main>

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

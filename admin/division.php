<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  

  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 top_bar_flex">
                <h6 class="text-white text-capitalize ps-3">বিভাগ তালিকা সমূহ</h6>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-4">

                <div class="order-view">
                  <div class="edit">                     

                    <div class="payment_area">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>ক্রমিক নং</th>
                          <th>ইউনিয়নের নাম</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $divisions = mysqli_query($conn,"SELECT * FROM divisions");
                        $i = 0;
                        while($row = mysqli_fetch_assoc($divisions)){ $i++;
                        ?>
                        <tr>
                          <td><?php echo $i;?></td>
                          <td><?php echo $row['bn_name'];?></td>                          
                        </tr>
                        <?php }?>
                      </tbody>
                    </table>
                    </div>
                  </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>  
  
  <?php include("common/footer.php")?>



  
<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
<?php
     $total_tax_holder = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM person"));
     $pending_tax_holder = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM person WHERE present_year='$present_year' AND status='Pending'"));
     $success_tax_holder = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM person WHERE present_year='$present_year' AND status='Success'"));
     $ward = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM ward"));
     $union = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM union_name"));
     
     $annual_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(annual_tax) FROM person"));
     $ablable_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ablable_tax) FROM person WHERE  status='Success'"));
     $due_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_tax) FROM person WHERE status='Success'"));
 
     $annual_tax = $annual_tax['SUM(annual_tax)'];
     $ablable_tax = $ablable_tax['SUM(ablable_tax)'];
     $due_tax = $due_tax['SUM(due_tax)'];
     

     //this year data
     $this_year_annual_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(annual_tax) FROM person WHERE present_year='$present_year'"));
     $this_year_ablable_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ablable_tax) FROM person WHERE status='Success' AND present_year='$present_year'"));
     $this_year_due_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_tax) FROM person WHERE status='Success' AND present_year='$present_year'"));
 
     $this_year_annual_tax = $this_year_annual_tax['SUM(annual_tax)'];
     $this_year_ablable_tax = $this_year_ablable_tax['SUM(ablable_tax)'];
     $this_year_due_tax = $this_year_due_tax['SUM(due_tax)'];

?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">  
    <div class="container-fluid py-4">

      
      <div style="display: flex;justify-content:space-between;">
        <div><h4>সমস্ত হিসাব</h4></div>
        <div>
          <!-- <form action="" method="GET">
          <select class="select_bar division">
            <option >বিভাগ বাছাই করুন</option>
              <?php 
              $divisions = mysqli_query($conn,"SELECT * FROM divisions");
              while($division = mysqli_fetch_assoc($divisions)){ ?>
              <option value="<?php echo $division['id'];?>"><?php echo $division['bn_name'];?></option>
              <?php }?>
            </select>
          <select class="select_bar district">
            <option >জেলা বাছাই করুন</option>
            </select>
          <select name="upazila" class="select_bar upazila">
            <option >উপজেলা বাছাই করুন</option>
          </select>
          <input type="submit" value="খুজুন">
          </form> -->
        </div>
      </div>
      <br>
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">সমস্ত কর</p>
                <h4 class="mb-0">৳<?php echo $annual_tax?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">৳5000 </span>Last Purchase</p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">জমাকৃত কর</p>
                <h4 class="mb-0">৳<?php echo $ablable_tax;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
            </div>
          </div>
        </div>
        
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">বকেয়া কর</p>
                <h4 class="mb-0">৳<?php echo $due_tax?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
            </div>
          </div>
        </div>



      </div>
<br>
<hr>

      <h4>সমস্ত তথ্য</h4>
      <br>
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">সমস্ত করদাতা</p>
                <h4 class="mb-0"><?php echo $total_tax_holder?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">ওয়ার্ড</p>
                <h4 class="mb-0"><?php echo $ward;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">ইউনিয়ন</p>
                <h4 class="mb-0"><?php echo $union;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
            </div>
          </div>
        </div>
      </div>
<br>
<hr>

      <h4>অর্থ বছরের কর (<?php echo $present_year;?>)</h4>
      <br>
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">সমস্ত কর</p>
                <h4 class="mb-0">৳<?php echo $this_year_annual_tax?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">জমাকৃত কর</p>
                <h4 class="mb-0">৳<?php echo $this_year_ablable_tax;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">বকেয়া কর</p>
                <h4 class="mb-0">৳<?php echo $this_year_due_tax?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-sm-6 mb-xl-0 my-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">জমাকৃত করদাতা</p>
                <h4 class="mb-0"><?php echo $success_tax_holder?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
            </div>
          </div>
        </div>

        <div class="col-xl-4 col-sm-6 mb-xl-0 my-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">বকেয়া করদাতা</p>
                <h4 class="mb-0"><?php echo $pending_tax_holder?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
            </div>
          </div>
        </div>
      </div>
      
      
      <div class="row">
        <div class="py-4">
          <div class="card">    
            <script type="text/javascript">
              google.charts.load('current', {'packages':['bar']});
              google.charts.setOnLoadCallback(drawChart);

              function drawChart() {
                var data = google.visualization.arrayToDataTable([
                  ['অর্থবছর','অর্থবছরের কর', 'জমাকৃত কর', 'বাকি কর'],
                  <?php
                    $query="SELECT * FROM person GROUP BY present_year";
                    $res=mysqli_query($conn,$query);
                    while($data=mysqli_fetch_array($res)){
                      $present_year = $data['present_year'];
                      $annual_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(annual_tax) FROM person WHERE present_year = '$present_year'"));
                      $ablable_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ablable_tax) FROM person WHERE present_year='$present_year'"));
                      $due_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_tax) FROM person WHERE present_year='$present_year'"));
                  
                      $annual_tax = $annual_tax['SUM(annual_tax)'];
                      $ablable_tax = $ablable_tax['SUM(ablable_tax)'];
                      $due_tax = $due_tax['SUM(due_tax)'];
                  ?>
                  ['<?php echo $present_year;?>',<?php echo $annual_tax;?>,<?php echo $ablable_tax;?>,<?php echo $due_tax;?>],   
                  <?php   
                    }
                  ?> 
                ]);

                var options = {
                  chart: {
                    title: 'Tax Graph',
                    subtitle: 'Annual, Collection, and Due: 2022-<?php echo date("Y");?>',
                  },
                  bars: 'vertical' // Required for Material Bar Charts.
                };

                var chart = new google.charts.Bar(document.getElementById('barchart_material'));

                chart.draw(data, google.charts.Bar.convertOptions(options));
              }
            </script>         
            <div id="barchart_material" style="width: 900px; height: 500px;padding:10px"></div>
          </div>
        </div>
      </div>
<br>
<hr>
      <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>সর্বশেষ ১০ জন করদাতার তালিকা</h6>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                  <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">করদাতা</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">আইডি নং</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">হোল্ডিং নং</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">বার্ষিক কর</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">নগদ কর</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">স্টাটাস</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $tax_holders = mysqli_query($conn,"SELECT * FROM person ORDER BY id DESC LIMIT 10");
                    while($data = mysqli_fetch_assoc($tax_holders)){ ?>
                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <a href="tax-holder-view?id=<?php echo $data['id'];?>">
                              <img src="../upload/<?php echo $data['file_name'];?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                            </a>
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <a href="tax-holder-view?id=<?php echo $data['id'];?>">
                              <h6 class="mb-0 text-sm"><?php echo $data['name'];?></h6>
                            </a>
                          </div>
                        </div>
                      </td>
                      <td>
                        <a href="tax-holder-view?id=<?php echo $data['id'];?>">
                          <p class="text-xs font-weight-bold mb-0"><?php echo $data['id_no'];?></p>
                        </a>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $data['holding_no'];?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $data['annual_tax'];?></p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $data['ablable_tax'];?></p>
                      </td>
                      <td class="align-middle text-center">
                        <?php 
                        if($data['status'] == 'Pending'){ ?>
                      <span class="text-xs font-weight-bold badge badge-sm bg-gradient-danger"><?php echo $data['status'];?></span>
                      <?php  }else{?>
                        <span class="text-xs font-weight-bold badge badge-sm bg-gradient-success"><?php echo $data['status'];?></span>
                        <?php }?>
                      </td>
                    </tr>
                    <?php  }?>


                  </tbody>
                </table>




              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="card h-100">
            <div class="card-header pb-0">
              <h6>সম্প্রতি যুক্ত হয়েছে</h6>
            </div>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">

                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                      U<i class="material-icons text-success text-gradient">notifications</i>
                    </span>
                    
                    <?php 
                    $unions = mysqli_query($conn,"SELECT * FROM union_name ORDER BY id DESC LIMIT 4");
                    while($union = mysqli_fetch_assoc($unions)){ ?>
                    <div class="timeline-content">
                      <h6 class="text-dark text-sm font-weight-bold mb-0"><?php echo $union['bn_name']?><i style="color:orange"> যুক্ত করা হয়েছে</i></h6>
                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo time_elapsed_string($union['time'],true);?></p>
                    </div>
                    <?php }?>

                    <span class="timeline-step">
                      V<i class="material-icons text-success text-gradient">notifications</i>
                    </span>

                    <?php 
                    $wards = mysqli_query($conn,"SELECT * FROM ward ORDER BY id DESC LIMIT 4");
                    while($ward = mysqli_fetch_assoc($wards)){ ?>
                    <div class="timeline-content">
                      <h6 class="text-dark text-sm font-weight-bold mb-0"><?php echo $ward['bn_name']?> <i style="color:green">যুক্ত করা হয়েছে</i></h6>
                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo time_elapsed_string($ward['time'],true);?></p>
                    </div>
                    <?php }?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>  
  
  <?php include("common/footer.php")?>
 
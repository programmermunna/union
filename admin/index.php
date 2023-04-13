<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
<?php 


$total_users = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM admin_info"));
$users = mysqli_query($conn,"SELECT * FROM admin_info ORDER BY id DESC LIMIT 3");

?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
    <div class="container-fluid py-4">

      <h4>সমস্ত হিসাব</h4>
      <br>
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Sell Amount</p>
                <h4 class="mb-0">৳<?php echo 34?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">৳5000 </span>Last Purchase</p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Users</p>
                <h4 class="mb-0"><?php echo 22;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Abir hossen </span> Last User</p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Pending Orders</p>
                <h4 class="mb-0"><?php echo 33?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">sohag hosen</span> Last Pending Order</p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Success Orders</p>
                <h4 class="mb-0"><?php echo 33;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Sohag mia </span>Last Success Orders</p> -->
            </div>
          </div>
        </div>
      </div>
<br>

      <h4>সমস্ত হিসাব</h4>
      <br>
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">weekend</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Sell Amount</p>
                <h4 class="mb-0">৳<?php echo 34?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">৳5000 </span>Last Purchase</p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Users</p>
                <h4 class="mb-0"><?php echo 22;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Abir hossen </span> Last User</p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Pending Orders</p>
                <h4 class="mb-0"><?php echo 33?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-danger text-sm font-weight-bolder">sohag hosen</span> Last Pending Order</p> -->
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Success Orders</p>
                <h4 class="mb-0"><?php echo 33;?></h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <!-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">Sohag mia </span>Last Success Orders</p> -->
            </div>
          </div>
        </div>
      </div>
<br>
<br>

      <div class="row mb-4">
        <div class="col-lg-8 col-md-6 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6>This Month Orders</h6>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                  <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">নাম</th>
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
                            <img src="../upload/<?php echo $data['file_name'];?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm"><?php echo $data['name'];?></h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0"><?php echo $data['id_no'];?></p>
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
              <h6>Activities</h6>
            </div>
            <div class="card-body p-3">
              <div class="timeline timeline-one-side">

                <div class="timeline-block mb-3">
                    <span class="timeline-step">
                      U<i class="material-icons text-success text-gradient">notifications</i>
                    </span>
                    
                    <?php 
                    $unions = mysqli_query($conn,"SELECT * FROM union_name ORDER BY id DESC LIMIT 3");
                    while($union = mysqli_fetch_assoc($unions)){ ?>
                    <div class="timeline-content">
                      <h6 class="text-dark text-sm font-weight-bold mb-0"><?php echo $union['union_name']?><i style="color:orange"> যুক্ত করা হয়েছে</i></h6>
                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo time_elapsed_string($union['time'],true);?></p>
                    </div>
                    <?php }?>

                    <span class="timeline-step">
                      V<i class="material-icons text-success text-gradient">notifications</i>
                    </span>

                    <?php 
                    $villages = mysqli_query($conn,"SELECT * FROM village ORDER BY id DESC LIMIT 3");
                    while($village = mysqli_fetch_assoc($villages)){ ?>
                    <div class="timeline-content">
                      <h6 class="text-dark text-sm font-weight-bold mb-0"><?php echo $village['name']?> <i style="color:green">যুক্ত করা হয়েছে</i></h6>
                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo time_elapsed_string($village['time'],true);?></p>
                    </div>
                    <?php }?>


                    <span class="timeline-step">
                      S<i class="material-icons text-success text-gradient">notifications</i>
                    </span>
                    
                    <?php 
                    $sections = mysqli_query($conn,"SELECT * FROM section ORDER BY id DESC LIMIT 3");
                    while($section = mysqli_fetch_assoc($sections)){ ?>
                    <div class="timeline-content">
                      <h6 class="text-dark text-sm font-weight-bold mb-0"><?php echo $section['name']?> <i style="color:blue">যুক্ত করা হয়েছে</i></h6>
                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo time_elapsed_string($section['time'],true);?></p>
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
 
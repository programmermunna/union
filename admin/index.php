<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
<?php 


$total_users = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM admin_info"));

$users = mysqli_query($conn,"SELECT * FROM admin_info ORDER BY id DESC LIMIT 3");

?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
    <div class="container-fluid py-4">
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
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Years</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Amount</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                    </tr>
                  </thead>
                  <tbody>


                 

                    <tr>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../upload/<?php echo $data['file'];?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                          <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">MUnna</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">MUnna</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0">MUnna</p>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold">MUnna</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo date("d-m-y",time());?></span>
                      </td>
                      <td class="align-middle text-center">
                        <?php 
                        if(1 == 1){ ?>
                      <span class="text-xs font-weight-bold badge badge-sm bg-gradient-danger">MUnna</span>
                      <?php  }else{?>
                        <span class="text-xs font-weight-bold badge badge-sm bg-gradient-success">MUnna</span>
                        <?php }?>
                      </td>
                    </tr>

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
                      <i class="material-icons text-success text-gradient">notifications</i>
                    </span>

                   
                    <div class="timeline-content">
                      <h6 class="text-dark text-sm font-weight-bold mb-0">sdf<i style="color:orange">Renew Request</i></h6>
                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo time_elapsed_string(time(),true);?></p>
                    </div>

                    <span class="timeline-step">
                      <i class="material-icons text-success text-gradient">notifications</i>
                    </span>

                    <div class="timeline-content">
                      <h6 class="text-dark text-sm font-weight-bold mb-0"><?php echo "MUnna"?> <i style="color:green">created a new order</i></h6>
                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo time_elapsed_string(time(),true);?></p>
                    </div>
                    <span class="timeline-step">
                      <i class="material-icons text-success text-gradient">notifications</i>
                    </span>
                    <div class="timeline-content">
                      <h6 class="text-dark text-sm font-weight-bold mb-0"><?php echo "MUnna"?> <i style="color:blue">created a new account</i></h6>
                      <p class="text-secondary font-weight-bold text-xs mt-1 mb-0"><?php echo time_elapsed_string(time(),true);?></p>
                    </div>

                </div>
                
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </main>  
  
  <?php include("common/footer.php")?>
 
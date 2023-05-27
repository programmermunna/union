<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
<?php
if(isset($_POST['submit'])){
  $village = $_POST['village'];
  $section = $_POST['section'];

  $sql = "INSERT INTO section (admin_id,name) VALUE ('$village','$section')";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "গ্রাম যুক্ত করা সফল হয়েছে।";
    header("location:section.php?msg=$msg");
  }
}
?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 top_bar_flex" >
                <div>
                  <h6 class="text-white text-capitalize" style="margin: 0;"><a style="color:#fff" href="section.php">উপজেলা সমূহ</a></h6>
                </div>
              <div>
                <select class="select_bar" onchange="window.location.href='upazila.php?district_id='+this.options [this.selectedIndex].value">
                  <option >জেলা বাছাই করুন</option>
                    <?php 
                    $districts = mysqli_query($conn,"SELECT * FROM districts");
                    while($district = mysqli_fetch_assoc($districts)){ ?>
                    <option value="<?php echo $district['id'];?>"><?php echo $district['bn_name'];?></option>
                    <?php }?>
                  </select>
                </div>
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
                          <th>উপজেলা</th>
                          <th>জেলা</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if(isset($_GET['district_id'])){
                          $district_id = $_GET['district_id'];
                          $upazilas = mysqli_query($conn,"SELECT * FROM upazilas WHERE district_id=$district_id");
                        }else{
                          $upazilas = mysqli_query($conn,"SELECT * FROM upazilas");
                        }
                        $i = 0;
                        while($upazila = mysqli_fetch_assoc($upazilas)){ $i++;
                           $district_id = $upazila['district_id'];
                           $district = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM districts WHERE id=$district_id"));
                        ?>
                        <tr>
                          <td><?php echo $i;?></td>
                          <td><?php echo $upazila['bn_name'];?></td>
                          <td><?php echo $district['bn_name'];?></td>
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



  
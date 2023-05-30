<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 top_bar_flex" >
                <div>
                  <h6 class="text-white text-capitalize" style="margin: 0;"><a style="color:#fff" href="district.php">জেলা সমূহ</a></h6>
                </div>
                <div>
                <span class="add_new"><a class="btn_on_red tax_btn" href="district.php?session_destroy=true">রিফ্রেস</a></span>
                </div>
                <div>
                  <div class="top_select">
                    <form action="" method="GET">
                    <select name="division" class="select_bar division">
                    <option ><?php if($sess_division >0){
                      $division_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM divisions WHERE id=$sess_division"));
                      echo $division_name['bn_name'];}else{
                        echo "বিভাগ বাছাই করুন";}?></option>
                      <?php 
                      $divisions = mysqli_query($conn,"SELECT * FROM divisions");
                      while($division = mysqli_fetch_assoc($divisions)){ ?>
                      <option value="<?php echo $division['id'];?>"><?php echo $division['bn_name'];?></option>
                      <?php }?>
                    </select>
                    <input type="submit" value="খুজুন">
                    </form>
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
                          <th>জেলা</th>
                          <th>বিভাগ</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if($sess_division > 0){
                          $districts = mysqli_query($conn,"SELECT * FROM districts WHERE division_id=$sess_division");
                        }else{
                          $districts = mysqli_query($conn,"SELECT * FROM districts");
                        }
                        $i = 0;
                        while($district = mysqli_fetch_assoc($districts)){ $i++;
                           $division_id = $district['division_id'];
                           $division = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM divisions WHERE id=$division_id"));
                        ?>
                        <tr>
                          <td><?php echo $i;?></td>
                          <td><?php echo $district['bn_name'];?></td>
                          <td><?php echo $division['bn_name'];?></td>
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



  
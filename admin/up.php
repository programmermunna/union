<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 top_bar_flex">
                <h6 class="text-white text-capitalize ps-3">ইউপি সমূহ</h6>
                
                <div>
                  <span class="add_new"><a class="btn_on_red tax_btn" href="up.php?session_destroy=true">রিফ্রেস</a></span>
                  <span class="add_new"><a class="btn_on_red tax_btn" href="up-add.php">যুক্ত করুণ</a></span>
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
                          <th>ছবি</th>
                          <th>নাম</th>
                          <th>ইউনিয়ন</th>
                          <th>ফোন</th>
                          <th>ঠিকানা</th>
                          <th>প্রতিক্রিয়া</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $up = mysqli_query($conn,"SELECT * FROM admin_up");
                        while($row = mysqli_fetch_assoc($up)){
                          $union_id= $row['union_id'];
                          $union = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM unions WHERE id=$union_id"));
                          $union_name = $union['bn_name'];

                        ?>
                        <tr>
                          <td><img style="width:40px" src="../upload/<?php echo $row['file'];?>"></td>
                          <td><?php echo $row['name'];?></td>
                          <td><?php echo $union_name;?></td>
                          <td><?php echo $row['phone'];?></td>
                          <td><?php echo $row['address'];?></td>
                          <td>
                            <a class="btn btn-primary p-2" href="up-edit.php?id=<?php echo $row['id']?>">Edit</a>
                            <a class="btn btn-primary p-2" href="delete.php?src=up&&table=admin_up&&id=<?php echo $row['id']?>">Delete</a>
                          </td>
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



  
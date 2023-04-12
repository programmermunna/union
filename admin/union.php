<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <?php include("common/navbar.php")?>

  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 top_bar_flex">
                <h6 class="text-white text-capitalize ps-3">ইউনিয়নের তালিকা সমূহ</h6>
                <span class="add_new"><a style="margin-left:20px" class="btn_on_red" href="union-add.php"> গ্রাম যুক্ত করুণ</a></span>
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
                          <th>আইডি নং</th>
                          <th>ইউনিয়নের নাম</th>
                          <th>তারিখ</th>
                          <th>প্রতিক্রিয়া</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $union = mysqli_query($conn,"SELECT * FROM union_name");
                        $i = 0;
                        while($row = mysqli_fetch_assoc($union)){ $i++;
                        ?>
                        <tr>
                          <td><?php echo $i;?></td>
                          <td><?php echo $row['union_name'];?></td>
                          <td><?php $time = $row['time']; echo $date = date("d-m-Y",$time); ?></td>
                          <td>
                            <a class="btn btn-primary p-2" href="union-edit.php?id=<?php echo $row['id']?>">Edit</a>
                            <a class="btn btn-primary p-2" href="union-delete.php?src=union&&table=union_name&&id=<?php echo $row['id']?>">Delete</a>
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
  <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>



  
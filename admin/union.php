<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  

  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 top_bar_flex">
                <h6 class="text-white text-capitalize ps-3">ইউনিয়নের তালিকা সমূহ</h6>
                
                <div>
                  <span class="add_new"><a class="btn_on_red tax_btn" href="union.php?session_destroy=true">রিফ্রেস</a></span>
                  <span class="add_new"><a class="btn_on_red tax_btn" href="union-add.php">যুক্ত করুণ</a></span>
                </div>

                <div>
                <form action="" method="GET">
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
                          <th>ইউনিয়ন</th>
                          <th>উপজেলা</th>
                          <th>প্রতিক্রিয়া</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if($sess_upazila >0){
                            $union = mysqli_query($conn,"SELECT * FROM union_name WHERE upazila_id=$sess_upazila");
                          }else{
                            $union = mysqli_query($conn,"SELECT * FROM union_name");
                          }
                        $i = 0;
                        while($row = mysqli_fetch_assoc($union)){                                                     
                          $i++;
                          $upazila_id = $row['upazila_id'];
                          $upazila = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM upazilas WHERE id='$upazila_id'"));
                        ?>
                        <tr>
                          <td><?php echo $i;?></td>
                          <td><?php echo $row['bn_name'];?></td>
                          <td><?php echo $upazila['bn_name'];?></td>
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
  <script>

      $(".division").on("change",function(){
        var division = $(this).val();
        return opt_func("../","districts","division_id",division,".district");
        })


      $(".district").on("change",function(){
        var district = $(this).val();
        return opt_func("../","upazilas","district_id",district,".upazila");
        })


  </script>
  <?php include("common/footer.php")?>



  
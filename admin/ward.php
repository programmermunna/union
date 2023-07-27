<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
<?php
if(isset($_POST['submit'])){
  $union = $_POST['union'];
  $ward = $_POST['ward'];

  $sql = "INSERT INTO ward (admin_id,name) VALUE ('$union','$ward')";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "ওয়ার্ড যুক্ত করা সফল হয়েছে।";
    header("location:ward.php?msg=$msg");
  }else{
    $err = "কোনো ত্রুটি হয়েছে। দয়া করে আবার চেষ্টা করুন";
    header("location:ward.php?err=$err");
  }
}

if(isset($_GET['src'])){
  $src = $_GET['src'];
  $id = $_GET['id'];

  $check = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ward WHERE id=$id"));

  if($check['edit_permision'] == 'OFF'){
    $update = mysqli_query($conn,"UPDATE ward SET edit_permision='ON' WHERE id=$id");
  }else{
    $update = mysqli_query($conn,"UPDATE ward SET edit_permision='OFF' WHERE id=$id");
  }

  if($update){
    $msg = "আপডেট সফল হয়েছে।";
    header("location:ward.php?msg=$msg");
  }else{
    $err = "কোনো ত্রুটি হয়েছে। দয়া করে আবার চেষ্টা করুন";
    header("location:ward.php?err=$err");
  }
}
?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 top_bar_flex">
                <div>
                  <h6 class="text-white text-capitalize" style="margin:0;"><a style="color:#fff;" href="ward.php">ওয়ার্ড সমূহ</a></h6>
                </div>
                <div>
                  <span class="add_new"><a class="btn_on_red" href="ward.php"> রিফ্রেস </a></span>
                  <span class="add_new"><a class="btn_on_red" href="ward-add.php"> ওয়ার্ড যুক্ত করুণ</a></span>
                </div>
              <div>
                <select class="select_bar" name="union" onchange="window.location.href='ward.php?union='+this.options [this.selectedIndex].value">
                  <option >ইউনিয়ন বাছাই করুণ</option>
                  <?php 
                  $unions = mysqli_query($conn,"SELECT * FROM unions");
                  while($union = mysqli_fetch_assoc($unions)){ ?>
                    <option value="<?php echo $union['admin_id'];?>"><?php echo $union['bn_name'];?></option>
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
                          <th>ওয়ার্ডের নাম</th>
                          <th>ইউনিয়নের নাম</th>
                          <th>প্রতিক্রিয়া</th>
                          <th>Edit Permision</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if(isset($_GET['union'])){
                          $union = $_GET['union'];
                          $wards = mysqli_query($conn,"SELECT * FROM ward WHERE admin_id=$union");
                        }else{
                          $wards = mysqli_query($conn,"SELECT * FROM ward");
                        }
                        $i = 0;
                        while($ward = mysqli_fetch_assoc($wards)){
                           $i++;
                           $admin_id = $ward['admin_id'];
                           $union = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM unions WHERE admin_id=$admin_id"));
                        ?>
                        <tr>
                          <td><?php echo $i;?></td>
                          <td><?php echo $ward['bn_name'];?></td>
                          <td><?php echo $union['bn_name'];?></td>
                          <td>
                            <a class="btn btn-primary p-2" href="ward-edit.php?id=<?php echo $ward['id']?>">Edit</a>
                            <a class="btn btn-primary p-2" href="ward-delete.php?id=<?php echo $ward['id']?>">Delete</a>                            
                          </td>

                          <td>
                            <?php if( $ward['edit_permision'] == 'ON'){ ?>
                              <a style="width: 120px;" class="btn btn-success p-2" href="ward.php?src=permision&&id=<?php echo $ward['id']?>"><?php echo $ward['edit_permision']?></a>
                             <?php }else{ ?>
                              <a style="width: 120px;" class="btn btn-primary p-2" href="ward.php?src=permision&&id=<?php echo $ward['id']?>"><?php echo $ward['edit_permision']?></a>
                            <?php  }?>
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



  
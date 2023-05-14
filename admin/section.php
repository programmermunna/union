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
                  <h6 class="text-white text-capitalize" style="margin: 0;"><a style="color:#fff" href="section.php">পাড়া সমূহ</a></h6>
                </div>
              <div>
                <span class="add_new"><a class="btn_on_red" href="section.php"> রিফ্রেস </a></span>
                <span class="add_new"><a class="btn_on_red" href="section-add.php"> পাড়া যুক্ত করুণ</a></span>
              </div>
              <div>
                <select class="select_bar" name="village" onchange="window.location.href='section.php?village='+this.options [this.selectedIndex].value">
                  <option >গ্রাম বাছাই করুণ</option>
                  <?php 
                  $villages = mysqli_query($conn,"SELECT * FROM village");
                  while($village = mysqli_fetch_assoc($villages)){ ?>
                    <option value="<?php echo $village['id'];?>"><?php echo $village['name'];?></option>
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
                          <th>পাড়ার নাম</th>
                          <th>গ্রামের নাম</th>
                          <th>প্রতিক্রিয়া</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if(isset($_GET['village'])){
                          $village = $_GET['village'];
                          $sections = mysqli_query($conn,"SELECT * FROM section WHERE vlg_id=$village");
                        }else{
                          $sections = mysqli_query($conn,"SELECT * FROM section ");
                        }
                        $i = 0;
                        while($section = mysqli_fetch_assoc($sections)){
                           $i++;
                           $vlg_id = $section['vlg_id'];
                           $village_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM village WHERE id=$vlg_id"));
                        ?>
                        <tr>
                          <td><?php echo $i;?></td>
                          <td><?php echo $section['name'];?></td>
                          <td><?php echo $village_name['name'];?></td>
                          <td>
                            <a class="btn btn-primary p-2" href="section-edit.php?id=<?php echo $section['id']?>">Edit</a>
                            <a class="btn btn-primary p-2" href="section-delete.php?id=<?php echo $section['id']?>">Delete</a>
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



  
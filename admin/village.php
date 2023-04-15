<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
<?php
if(isset($_POST['submit'])){
  $union = $_POST['union'];
  $village = $_POST['village'];

  $sql = "INSERT INTO village (admin_id,name) VALUE ('$union','$village')";
  $query = mysqli_query($conn,$sql);
  if($query){
    $msg = "গ্রাম যুক্ত করা সফল হয়েছে।";
    header("location:village.php?msg=$msg");
  }else{
    $err = "কোনো ত্রুটি হয়েছে। দয়া করে আবার চেষ্টা করুন";
    header("location:village.php?err=$err");
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
                <span class="add_new"><a class="btn_on_red" href="village.php"> রিফ্রেস </a></span>
                <span class="add_new"><a class="btn_on_red" href="village-add.php"> গ্রাম যুক্ত করুণ</a></span>
              </div>
              <div>
                <h6 class="text-white text-capitalize" style="margin:0;"><a style="color:#fff;" href="village.php">গ্রাম সমূহ</a></h6>
              </div>
              <div>
                <select class="select_bar" name="union" onchange="window.location.href='village.php?union='+this.options [this.selectedIndex].value">
                  <option >ইউনিয়ন বাছাই করুণ</option>
                  <?php 
                  $unions = mysqli_query($conn,"SELECT * FROM union_name");
                  while($union = mysqli_fetch_assoc($unions)){ ?>
                    <option value="<?php echo $union['admin_id'];?>"><?php echo $union['union_name'];?></option>
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
                          <th>গ্রামের নাম</th>
                          <th>ইউনিয়নের নাম</th>
                          <th>প্রতিক্রিয়া</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                        if(isset($_GET['union'])){
                          $union = $_GET['union'];
                          $villages = mysqli_query($conn,"SELECT * FROM village WHERE admin_id=$union");
                        }else{
                          $villages = mysqli_query($conn,"SELECT * FROM village");
                        }
                        $i = 0;
                        while($village = mysqli_fetch_assoc($villages)){
                           $i++;
                           $admin_id = $village['admin_id'];
                           $union = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM union_name WHERE admin_id=$admin_id"));
                        ?>
                        <tr>
                          <td><?php echo $i;?></td>
                          <td><?php echo $village['name'];?></td>
                          <td><?php echo $union['union_name'];?></td>
                          <td>
                            <a class="btn btn-primary p-2" href="village-edit.php?id=<?php echo $village['id']?>">Edit</a>
                            <a class="btn btn-primary p-2" href="village-delete.php?id=<?php echo $village['id']?>">Delete</a>
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



  
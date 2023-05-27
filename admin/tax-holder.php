<?php include("common/header.php");

if(isset($_GET['session_destroy'])){
    if($_GET['session_destroy'] == 'true'){
        unset($_SESSION['union']);
        unset($_SESSION['village']);
        unset($_SESSION['section']);
        header("location:tax-holder.php");
    }
}


if(isset($_GET['year'])){
  $year = $_SESSION['year'] = $_GET['year'];
}

if(isset($_SESSION['year'])){
    $year = $_SESSION['year'];
}else{
    $year_left = 86400*365;
    $present_year = $time-$year_left;
    $year = date("Y",$present_year) ." - ". date("Y",time());
}


if(isset($_GET['union'])){
    $_SESSION['union'] = $_GET['union'];
}
if(isset($_SESSION['union'])){
    $sess_union = $_SESSION['union'];
}else{
    $sess_union = 0;
}

if(isset($_GET['village'])){
    $_SESSION['village'] = $_GET['village'];
}
if(isset($_SESSION['village'])){
    $sess_vlg = $_SESSION['village'];
}else{
    $sess_vlg = 0;
}

if(isset($_GET['section'])){
    $_SESSION['section'] = $_GET['section'];
}
if(isset($_SESSION['section'])){
    $sess_sec = $_SESSION['section'];
}else{
    $sess_sec = 0;
}
?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 search_bar search_bar_left">
                <h6 class="text-white text-capitalize ps-3">করদাতার তালিকা সমূহ</h6>
                <div>
                  <span class="add_new"><a class="btn_on_red tax_btn" href="tax-holder.php?session_destroy=true">রিফ্রেস</a></span>
                  <span class="add_new"><a class="btn_on_red tax_btn" href="tax-holder-add.php">যুক্ত করুণ</a></span>
                  <span class="add_new"><a class="btn_on_red tax_btn" href="tax-holder-export.php"> Excel </a></span>
                </div>
                <div class="top_search">
                  <select class="input" id="year" name="year" onchange="window.location.href='tax-holder.php?year='+this.options [this.selectedIndex].value">
                    <option selected style="display:none;" value="<?php echo $year?>"><?php echo $year?></option>
                    <?php 
                    $years = mysqli_query($conn,"SELECT DISTINCT present_year FROM person ORDER BY id DESC");
                    while($data = mysqli_fetch_assoc($years)){ ?>
                    <option value="<?php echo $data['present_year']?>"><?php echo $data['present_year']?></option>
                    <?php  }?>
                  </select>
                </div>
              </div>

              <div class="bg-gradient-primary border-radius-lg pt-3 search_bar search_bar_right">
              <div class="top_search top_search_t">
                <form action="" method="GET">
                    <input name="src" type="text" placeholder="এখানে লিখুন" value="<?php if(isset($_GET['src'])){ echo $_GET['src'];}?>">
                    <button type="submit">খুজুন</button>
                  </form>
                </div>

                <div>                  
                  <form action="" method="GET">
                  <div class="top_select">
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
                  <select name="union" class="select_bar union">
                    <option >ইউনিয়ন বাছাই করুন</option>
                  </select>
                  <input type="submit" value="খুজুন">
                  </form>
                    </div>
                 </form>
                </div>


                <div class="top_search top_search_b">
                  <form action="" method="GET">
                    <input name="src" type="text" placeholder="এখানে লিখুন" value="<?php if(isset($_GET['src'])){ echo $_GET['src'];}?>">
                    <button type="submit">খুজুন</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ক্রমিক নং</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ছবি</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">আইডি নং</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">নাম</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">পিতা/স্বামীর নাম</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">সদস্য সংখ্যা</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">হোল্ডিং</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">জাতীয় পরিচয়পত্র</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">পেশা</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">গৃহের বিবরন</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">স্থাপনার মূল্য</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">বার্ষিক কর</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">নগদ কর</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">বকেয়া কর</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">অর্থ বছর</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">মোবাইল নং</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">স্টাটাস</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">অবস্থা</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">প্রতিক্রিয়া</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php 
                  if(isset($_GET['src'])){
                    $src = $_GET['src'];
                      $empSQL = "SELECT * FROM person WHERE present_year=$year AND (name LIKE '$src' OR id_no = '$src' OR mobile_no = '$src' OR nid_no = '$src' OR holding_no = '$src' OR guardian_name LIKE '$src')";
                  }elseif($sess_union > 0 && $sess_vlg > 0 && $sess_sec > 0){
                    $empSQL = "SELECT * FROM person WHERE present_year='$year' AND  admin_id = $sess_union AND village = $sess_vlg AND section = $sess_sec ";
                  }elseif($sess_union > 0 && $sess_vlg > 0){
                    $empSQL = "SELECT * FROM person WHERE present_year='$year' AND  admin_id = $sess_union AND village = $sess_vlg ";
                  }elseif($sess_union > 0 ){
                      $empSQL = "SELECT * FROM person WHERE present_year='$year' AND admin_id = $sess_union ";
                  }else{
                    $empSQL = "SELECT * FROM person WHERE present_year='$year'";
                  }
                  
                  $query = mysqli_query($conn,$empSQL);
                  $i=0;
                  while($data= mysqli_fetch_assoc($query)){ 
                    $i++;
                    ?>
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $i;?></span>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../upload/<?php echo $data['file_name'];?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                        </div>
                      </td>                      
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['id_no'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['name'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['guardian_name'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['word_no'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['family_member'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['holding_no'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['nid_no'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['profession'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['home'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['net_worth'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['annual_tax'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['ablable_tax'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['due_tax'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['mobile_no'];?></span>
                      </td>

                      <td class="align-middle text-center">
                        <?php if($data['status']=='Pending'){ ?>
                          <span class="text-xs font-weight-bold badge badge-sm text-danger"><?php echo $data['status'];?></span>
                     <?php }else{?>
                        <span class="text-xs font-weight-bold badge badge-sm text-success"><?php echo $data['status'];?></span>
                        <?php }?>
                      </td>

                      </td>
                      <td class="align-middle text-center">
                        <?php if($data['obostha']=='বহাল'){ ?>
                          <span class="text-xs font-weight-bold badge badge-sm bg-gradient-success"><?php echo $data['obostha'];?></span>
                     <?php }else{?>
                        <span class="text-xs font-weight-bold badge badge-sm bg-gradient-danger"><?php echo $data['obostha'];?></span>
                        <?php }?>
                      </td>

                      <td style="text-align:center">
                        <a href="tax-holder-edit.php?id=<?php echo $data['id'];?>" class="badge badge-sm bg-gradient-success">Edit</a>
                        <a href="remove.php?id=<?php echo $data['id'];?>" class="badge badge-sm bg-gradient-success">Remove</a>
                        <a href="tax-holder-view.php?id=<?php echo $data['id'];?>" class="badge badge-sm bg-gradient-success">View</a>
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

      $(".upazila").on("change",function(){
        var upazila = $(this).val();
        return opt_func("../","union_name","upazila_id",upazila,".union");
        })


</script>
  
  <?php include("common/footer.php")?>

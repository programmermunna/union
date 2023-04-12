<?php include("common/header.php");

if(isset($_GET['session_destroy'])){
    if($_GET['session_destroy'] == 'true'){
        unset($_SESSION['union']);
        unset($_SESSION['village']);
        unset($_SESSION['section']);
    }
}


if(isset($_GET['year'])){
  $year = $_SESSION['year'] = $_GET['year'];
}

if(isset($_SESSION['year'])){
    $year = $_SESSION['year'];
}else{
    $year = date("Y",time());
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
  <?php include("common/navbar.php")?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 search_bar ">
                <h6 class="text-white text-capitalize ps-3">করদাতার তালিকা সমূহ</h6>
                <div>
                  <span class="add_new"><a class="btn_on_red tax_btn" href="tax-holder.php?session_destroy=true">রিফ্রেস</a></span>
                  <span class="add_new"><a class="btn_on_red tax_btn" href="tax-holder-add.php">যুক্ত করুণ</a></span>
                  <span class="add_new"><a class="btn_on_red tax_btn" href="tax-holder-add.php"> Excel </a></span>
                </div>
                <div class="top_search">
                  <select style="width: 200px;" class="input" id="year" name="year" onchange="window.location.href='tax-holder.php?year='+this.options [this.selectedIndex].value">
                    <option selected style="display:none;" value="<?php echo $year?>"><?php echo $year?></option>
                    <?php 
                    $years = mysqli_query($conn,"SELECT DISTINCT present_year FROM person");
                    while($data = mysqli_fetch_assoc($years)){ ?>
                    <option value="<?php echo $data['present_year']?>"><?php echo $data['present_year']?></option>
                    <?php  }?>
                  </select>
                </div>
              </div>

              <div class="bg-gradient-primary border-radius-lg pt-3 search_bar ">
                <h6 class="text-white text-capitalize ps-3"></h6>
                <form action="" method="GET">
                  <div class="top_select">
                    <select name="union" id="union">
                      <?php if($sess_union>0){ 
                        $union = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM union_name WHERE admin_id=$sess_union"));
                      ?>
                        <option style="display: none;" selected value="<?php echo $union['admin_id'];?>"><?php echo $union['union_name'];?></option>
                    <?php  }else{?>
                      <option style="display: none;" selected value="ইউনিয়ন বাছাই করুন">ইউনিয়ন বাছাই করুন</option>
                    <?php  }?>

                      <?php
                      $unions = mysqli_query($conn,"SELECT * FROM union_name");
                      while($union = mysqli_fetch_assoc($unions)){ ?>
                      <option value="<?php echo $union['admin_id']?>"><?php echo $union['union_name']?></option>
                    <?php }?>
                    </select>

                    <select name="village" id="village">
                    <?php if($sess_vlg>0){ 
                        $village = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM village WHERE id=$sess_vlg"));
                      ?>
                        <option style="display: none;" selected value="<?php echo $village['id'];?>"><?php echo $village['name'];?></option>
                    <?php  }else{?>
                      <option style="display: none;" selected value="গ্রাম বাছাই করুন">গ্রাম বাছাই করুন</option>
                    <?php  }?>
                      
                    </select>

                    <select name="section" id="section">
                    <?php if($sess_sec>0){ 
                        $section = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM section WHERE id=$sess_sec"));
                      ?>
                        <option style="display: none;" selected value="<?php echo $section['id'];?>"><?php echo $section['name'];?></option>
                    <?php  }else{?>
                      <option style='display:none;' selected disabled>পাড়া/মহল্লা বাছাই করুণ</option>
                    <?php  }?>

                    </select>
                    <input type="submit" value="খুজুন">
                  </div>
                </form>
                <div class="top_search">
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
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">প্রতিক্রিয়া</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php 
                  if(isset($_GET['src'])){
                    $src = $_GET['src'];
                      $empSQL = "SELECT * FROM person WHERE present_year=$year AND (name LIKE '$src' OR id_no = '$src' OR mobile_no = '$src' OR nid_no = '$src' OR holding_no = '$src' OR guardian_name LIKE '$src')";
                  }elseif($sess_union > 0 && $sess_vlg > 0 && $sess_sec > 0){
                    $empSQL = "SELECT * FROM person WHERE present_year=$year AND  admin_id = $sess_union AND village = $sess_vlg AND section = $sess_sec ";
                  }elseif($sess_union > 0 && $sess_vlg > 0){
                    $empSQL = "SELECT * FROM person WHERE present_year=$year AND  admin_id = $sess_union AND village = $sess_vlg ";
                  }elseif($sess_union > 0 ){
                      $empSQL = "SELECT * FROM person WHERE present_year=$year AND admin_id = $sess_union ";
                  }else{
                    $empSQL = "SELECT * FROM person WHERE present_year=$year";
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
                          <span class="text-xs font-weight-bold badge badge-sm bg-gradient-danger"><?php echo $data['status'];?></span>
                     <?php }else{?>
                        <span class="text-xs font-weight-bold badge badge-sm bg-gradient-success"><?php echo $data['status'];?></span>
                        <?php }?>
                      </td>
                      <td style="text-align:center">
                        <a href="tax-holder-edit.php?id=<?php echo $data['id'];?>" class="badge badge-sm bg-gradient-success">Edit</a>
                        <a href="delete.php?src=tax-holder&&table=person&&id=<?php echo $data['id'];?>" class="badge badge-sm bg-gradient-success">Delete</a>
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
    $(document).ready(function(){  
      $("#union").on("change",function(){
        var admin_id = $(this).val();
        $.ajax({
            url:"../include/ajax.php",
            type:"GET",
            data:
            {
              reference:"village of union in admin/tax-holder page",
              admin_id:admin_id,
            },         
            success:function(data){
              console.log(data);
              $("#village").html(data);
              }
            });
        })

      $("#village").on("change",function(){
        var vlg_id = $(this).val();
        $.ajax({
            url:"../include/ajax.php",
            type:"GET",
            data:
            {
              reference:"section of village in admin/tax-holder page",
              vlg_id:vlg_id,
            },         
            success:function(data){
              console.log(data);
              $("#section").html(data);
              }
            });
        })

    })
</script>
  
  <?php include("common/footer.php")?>
  <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>
<?php include("common/header.php");
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
                  <select name="district" class="select_bar district">
                    <option ><?php if($sess_district >0){
                      $district_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM districts WHERE id=$sess_district"));
                      echo $district_name['bn_name'];}else{
                        echo "জেলা বাছাই করুন";}?></option>
                    </select>
                  <select name="upazila" name="upazila" class="select_bar upazila">
                    <option ><?php if($sess_upazila >0){
                      $upazila_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM upazilas WHERE id=$sess_upazila"));
                      echo $upazila_name['bn_name'];}else{
                        echo "উপজেলা বাছাই করুন";}?></option>
                  </select>
                  <select name="union" name="union" class="select_bar union">
                    <option ><?php if($sess_union >0){
                      $unions = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM unions WHERE id=$sess_union"));
                      echo $unions['bn_name'];}else{
                        echo "ইউনিয়ন বাছাই করুন";}?></option>
                  </select>
                  <select name="ward" name="ward" class="select_bar ward">
                    <option ><?php if($sess_ward >0){
                      $ward_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ward WHERE id=$sess_ward"));
                      echo $ward_name['bn_name'];}else{
                        echo "ওয়ার্ড বাছাই করুন";}?></option>
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
                    $empSQL = "SELECT * FROM person WHERE present_year='$year' AND (name LIKE '$src' OR guardian_name LIKE '$src' OR id_no = '$src' OR mobile_no = '$src' OR nid_no = '$src' OR holding_no = '$src')";
                  }elseif($sess_division > 0 && $sess_district > 0  && $sess_upazila > 0 && $sess_union > 0 && $sess_ward > 0){
                    $empSQL = "SELECT * FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila AND  union_id = $sess_union AND ward = $sess_ward";
                  }elseif($sess_division > 0 && $sess_district > 0  && $sess_upazila > 0 && $sess_union > 0){
                    $empSQL = "SELECT * FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila AND  union_id = $sess_union";
                  }elseif($sess_division > 0 && $sess_district > 0  && $sess_upazila > 0){
                    $empSQL = "SELECT * FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila";
                  }elseif($sess_division > 0 && $sess_district > 0){
                    $empSQL = "SELECT * FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district";
                  }elseif($sess_division > 0){
                    $empSQL = "SELECT * FROM person WHERE present_year='$year' AND  division_id = $sess_division";
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
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['id'];?></span>
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
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['present_year'];?></span>
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
                          <a href="remove.php?action=বাতিল&&id=<?php echo $data['id'];?>"><span class="text-xs font-weight-bold badge badge-sm bg-gradient-success"><?php echo $data['obostha'];?></span></a>
                        <?php }else{?>
                          <a href="remove.php?action=বহাল&&id=<?php echo $data['id'];?>"><span class="text-xs font-weight-bold badge badge-sm bg-gradient-danger"><?php echo $data['obostha'];?></span></a>
                        <?php }?>                      
                      </td>

                      <td style="text-align:center">
                        <a href="tax-holder-edit.php?id=<?php echo $data['id'];?>" class="badge badge-sm bg-gradient-success">Edit</a>
                        <a href="tax-holder-view.php?id=<?php echo $data['id'];?>" class="badge badge-sm bg-gradient-success">View</a>
                      </td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>             
              </div>
              
              <div class="card p-5"> 
                
              

              <?php 
                
              //   $annual_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(annual_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila AND  union_id = $sess_union AND  ward = $sess_ward"));
              //   $ablable_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ablable_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila AND  union_id = $sess_union AND  ward = $sess_ward"));
              //   $due_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila AND  union_id = $sess_union AND  ward = $sess_ward"));
            
              // echo "_". $annual_tax = $annual_tax['SUM(annual_tax)'];
              // echo "_". $ablable_tax = $ablable_tax['SUM(ablable_tax)'];
              // echo "_". $due_tax = $due_tax['SUM(due_tax)'];
              ?>

                  <script type="text/javascript">
                  google.charts.load('current', {'packages':['bar']});
                  google.charts.setOnLoadCallback(drawChart);

                  function drawChart() {
                    var data = google.visualization.arrayToDataTable([
                      ['অর্থবছর','অর্থবছরের কর', 'জমাকৃত কর', 'বাকি কর'],
                      <?php
                          if($sess_division > 0 && $sess_district > 0  && $sess_upazila > 0 && $sess_union > 0 && $sess_ward > 0){
                            $query = "SELECT * FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila AND  union_id = $sess_union AND  ward = $sess_ward  GROUP BY present_year";
                          }elseif($sess_division > 0 && $sess_district > 0  && $sess_upazila > 0 && $sess_union > 0){
                            $query = "SELECT * FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila AND  union_id = $sess_union  GROUP BY present_year";
                          }elseif($sess_division > 0 && $sess_district > 0  && $sess_upazila > 0){
                            $query = "SELECT * FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila  GROUP BY present_year";
                          }elseif($sess_division > 0 && $sess_district > 0){
                            $query = "SELECT * FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district  GROUP BY present_year";
                          }elseif($sess_division > 0){
                            $query = "SELECT * FROM person WHERE present_year='$year' AND  division_id = $sess_division  GROUP BY present_year";
                          }else{
                            $query="SELECT * FROM person WHERE present_year='$year' GROUP BY present_year";
                          }
                        $res=mysqli_query($conn,$query);
                        while($data=mysqli_fetch_array($res)){
                          if($sess_division > 0 && $sess_district > 0  && $sess_upazila > 0 && $sess_union > 0 && $sess_ward > 0){
                            
                          $annual_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(annual_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila AND  union_id = $sess_union AND  ward = $sess_ward"));
                          $ablable_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ablable_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila AND  union_id = $sess_union AND  ward = $sess_ward"));
                          $due_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila AND  union_id = $sess_union AND  ward = $sess_ward"));

                          }elseif($sess_division > 0 && $sess_district > 0  && $sess_upazila > 0 && $sess_union > 0){
                            
                            $annual_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(annual_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila AND  union_id = $sess_union"));
                            $ablable_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ablable_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila AND  union_id = $sess_union"));
                            $due_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila AND  union_id = $sess_union"));
  
                          }elseif($sess_division > 0 && $sess_district > 0  && $sess_upazila > 0){
                            
                            $annual_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(annual_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila"));
                            $ablable_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ablable_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila"));
                            $due_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila"));
  
                          }elseif($sess_division > 0 && $sess_district > 0){
                            
                            $annual_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(annual_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district"));
                            $ablable_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ablable_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district"));
                            $due_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district"));
  
                          }elseif($sess_division > 0){
                            
                            $annual_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(annual_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division"));
                            $ablable_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ablable_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division"));
                            $due_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_tax) FROM person WHERE present_year='$year' AND  division_id = $sess_division"));
  
                          }else{                            
                            $annual_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(annual_tax) FROM person WHERE present_year = '$present_year'"));
                            $ablable_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(ablable_tax) FROM person WHERE present_year='$present_year'"));
                            $due_tax = mysqli_fetch_assoc(mysqli_query($conn,"SELECT SUM(due_tax) FROM person WHERE present_year='$present_year'"));
                          }

                          $annual_tax = $annual_tax['SUM(annual_tax)'];
                          $ablable_tax = $ablable_tax['SUM(ablable_tax)'];
                          $due_tax = $due_tax['SUM(due_tax)'];
                      ?>
                      ['<?php echo $present_year;?>',<?php echo $annual_tax;?>,<?php echo $ablable_tax;?>,<?php echo $due_tax;?>],   
                      <?php   
                        }
                      ?> 
                    ]);

                    var options = {
                      chart: {
                        title: 'Tax Graph',
                        subtitle: 'Annual, Collection, and Due: 2022-<?php echo date("Y");?>',
                      },
                      bars: 'vertical' // Required for Material Bar Charts.
                    };

                    var chart = new google.charts.Bar(document.getElementById('barchart_material'));

                    chart.draw(data, google.charts.Bar.convertOptions(options));
                  }
                  </script>         
                  <div id="barchart_material" style="width: 900px; height: 500px;padding:10px"></div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <?php include("common/footer.php")?>

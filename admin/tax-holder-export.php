<?php include("common/header.php");

// header('Content-Type:application/xls');
// header('Content-Disposition:attachment;filename=report.xls');



  //union Year  
  if(isset($_SESSION['year'])){
      $year = $_SESSION['year'];
  }else{
      $year_left = 86400*365;
      $year_cal = $time-$year_left;
      $year = date("Y",$year_cal) ." - ". date("Y",time());
  }
  
  //union division
  if(isset($_SESSION['division'])){
      $sess_division = $_SESSION['division'];
  }else{
      $sess_division = 0;
  }
  
  //union district
  if(isset($_SESSION['district'])){
      $sess_district = $_SESSION['district'];
  }else{
      $sess_district = 0;
  }
  
  //vilage upazila
  if(isset($_SESSION['upazila'])){
      $sess_upazila = $_SESSION['upazila'];
  }else{
      $sess_upazila = 0;
  }
  
  //union session
  if(isset($_SESSION['union'])){
      $sess_union = $_SESSION['union'];
  }else{
      $sess_union = 0;
  }
  
  //vilage session
  if(isset($_SESSION['village'])){
      $sess_village = $_SESSION['village'];
  }else{
      $sess_village = 0;
  }
  if(isset($_GET['src'])){
    $src = $_GET['src'];
    $empSQL = "SELECT * FROM person WHERE present_year='$year' AND (name LIKE '$src' OR guardian_name LIKE '$src' OR id_no = '$src' OR mobile_no = '$src' OR nid_no = '$src' OR holding_no = '$src')";
  }elseif($sess_division > 0 && $sess_district > 0  && $sess_upazila > 0 && $sess_union > 0 && $sess_village > 0){
    $empSQL = "SELECT * FROM person WHERE present_year='$year' AND  division_id = $sess_division AND  district_id = $sess_district AND  upazila_id = $sess_upazila AND  union_id = $sess_union AND  village = $sess_village";
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

$res = mysqli_query($conn, $empSQL);
?>
    <table>
            <tr style="font-weight:bolder;">
                <td>ক্রমিক নং</td>
                <td>আইডি নং</td>
                <td>করদাতার নাম</td>
                <td>পিতা/স্বামীর নাম</td>
                <td>গ্রাম</td>
                <td>ওয়ার্ড নং</td>
                <td>পরিবারের সদস্য সংখ্যা</td>
                <td>পুরুষ</td>
                <td>মহিলা</td>
                <td>হোল্ডিং নং</td>
                <td>জাতীয় পরিচয়পত্র নং</td>
                <td>পেশা</td>
                <td>গৃহের বিবরন</td>
                <td>স্থাপনার মুল্য</td>
                <td>বার্ষিক কর</td>
                <td>নগদ কর</td>
                <td>বকেয়া কর</td>
                <td>অর্থ বছর</td>
                <td>মোবাইল নং</td>
                <td>স্টাটাস</td>
                <td>অবস্থা</td>
            </tr>
            <?php while($row=mysqli_fetch_assoc($res)){?>
	        <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $row['id_no'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['guardian_name'];?></td>
                <td><?php echo $row['village'];?></td>
                <td><?php echo $row['word_no'];?></td>
                <td><?php echo $row['family_member'];?></td>
                <td><?php echo $row['male'];?></td>
                <td><?php echo $row['female'];?></td>
                <td><?php echo $row['holding_no'];?></td>
                <td><?php echo $row['nid_no'];?></td>
                <td><?php echo $row['profession'];?></td>
                <td><?php echo $row['home'];?></td>
                <td><?php echo $row['net_worth'];?></td>
                <td><?php echo $row['annual_tax'];?></td>
                <td><?php echo $row['ablable_tax'];?></td>
                <td><?php echo $row['due_tax'];?></td>
                <td><?php echo $row['present_year'];?></td>
                <td><?php echo $row['mobile_no'];?></td>
                <td><?php echo $row['status'];?></td>
                <td><?php echo $row['obostha'];?></td>
            </tr>
<?php }?>
    </table>


    <style>
        table,tr,td{
            border:1px solid gray;
            text-align: center;
            padding:10px !important;
        }
    </style>
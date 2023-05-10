<?php include("common/header.php");

header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=report.xls');



  
  if(isset($_SESSION['year'])){
      $year = $_SESSION['year'];
  }else{
      $year = date("Y",time());
  }  

  if(isset($_SESSION['union'])){
      $sess_union = $_SESSION['union'];
  }else{
      $sess_union = 0;
  }

  if(isset($_SESSION['village'])){
      $sess_vlg = $_SESSION['village'];
  }else{
      $sess_vlg = 0;
  }

  if(isset($_SESSION['section'])){
      $sess_sec = $_SESSION['section'];
  }else{
      $sess_sec = 0;
  }



  if($sess_union > 0 && $sess_vlg > 0 && $sess_sec > 0){
    $empSQL = "SELECT * FROM person WHERE present_year=$year AND  admin_id = $sess_union AND village = $sess_vlg AND section = $sess_sec ";
  }elseif($sess_union > 0 && $sess_vlg > 0){
    $empSQL = "SELECT * FROM person WHERE present_year=$year AND  admin_id = $sess_union AND village = $sess_vlg ";
  }elseif($sess_union > 0 ){
      $empSQL = "SELECT * FROM person WHERE present_year=$year AND admin_id = $sess_union ";
  }else{
    $empSQL = "SELECT * FROM person WHERE present_year=$year";
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
                <td>পাড়া/মহল্লা</td>
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
            <?php
            $i;
            while($row=mysqli_fetch_assoc($res)){$i++; ?>
	        <tr>
                <td><?php echo $i;?></td>
                <td><?php echo $row['id_no'];?></td>
                <td><?php echo $row['name'];?></td>
                <td><?php echo $row['guardian_name'];?></td>
                <td><?php echo $row['village'];?></td>
                <td><?php echo $row['section'];?></td>
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
<?php include("common/header.php");

header('Content-Type:application/xls');
header('Content-Disposition:attachment;filename=report.xls');


if(isset($_SESSION['year'])){
    $year = $_SESSION['year'];
}else{
    $year = $present_year; 
}

if(isset($_SESSION['ward'])){
    $sess_ward = $_SESSION['ward'];
}else{
    $sess_ward = 0;
}

if($sess_ward > 0){
    $empSQL = "SELECT * FROM tax_holder WHERE admin_id=$id AND present_year='$year' AND ward = $sess_ward";
}else{
    $empSQL = "SELECT * FROM tax_holder WHERE admin_id=$id AND present_year='$year' ";
}

$res = mysqli_query($conn, $empSQL);
?>
    <table>
            <tr style="font-weight:bolder;">
                <td>ক্রমিক নং</td>
                <td>ওয়ার্ড </td>
                <td>খানা প্রধানের নাম</td>
                <td>পিতা/স্বামীর নাম</td>
                <td>মাতার নাম</td>
                <td>গ্রাম/পাড়া</td>
                <td>জন্ম তারিখ</td>
                <td>জন্ম নিবন্ধন </td>
                <td>এনআইডি নাম্বার</td>
                <td>হোল্ডিং নাম্বার</td>
                <td>শিক্ষাগত যোগ্যতা </td>
                <td>মোবাইল নাম্বার</td>
                <td>সামাজিক সুবিধা ১</td>
                <td>সামাজিক সুবিধা ২</td>
                <td>সামাজিক সুবিধা ৩</td>
                <td>খানা প্রধানের লিঙ্গ </td>
                <td>খানা প্রধানের ধর্ম</td>
                <td>পেশা</td>
                <td>নলকুপ আছে কিনা</td>
                <td>পায়খানার ধরন</td>
                <td>সদস্যের নাম লিখুন</td>
                <td>সদস্যের সম্পর্ক লিখুন</td>
                <td>সদস্যের নাম লিখুন</td>
                <td>সদস্যের সম্পর্ক লিখুন</td>
                <td>অবকাঠামোর ধরন</td>
                <td>অবকাঠামোর ধরন</td>
                <td>বাৎসরিক ভাড়া</td>
                <td>বসবাসের ধরন</td>
                <td>পুর্বের বকেয়া </td>
                <td>বর্তমান কর</td>
                <td>আদায়কৃত কর</td>
                <td>বকেয়া কর</td>
                <td>স্টাটাস</td>
            </tr>
            <?php while($row=mysqli_fetch_assoc($res)){
                $word_id = $row['ward'];
                $word = mysqli_fetch_assoc(mysqli_query($conn,"SELECT bn_name FROM ward WHERE id=$word_id"));                
                ?>
	        <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo $word['bn_name'];?></td>
                <td><?php echo $row['tax_holder_name'];?></td>
                <td><?php echo $row['father_hasbend_name'];?></td>
                <td><?php echo $row['mother_name'];?></td>
                <td><?php echo $row['village'];?></td>
                <td><?php echo $row['date_of_birth'];?></td>
                <td><?php echo $row['birth_date'];?></td>
                <td><?php echo $row['nid_no'];?></td>
                <td><?php echo $row['holding'];?></td>
                <td><?php echo $row['education'];?></td>
                <td><?php echo $row['phone'];?></td>
                <td><?php echo $row['social_benifit_1'];?></td>
                <td><?php echo $row['social_benifit_2'];?></td>
                <td><?php echo $row['social_benifit_3'];?></td>
                <td><?php echo $row['gender'];?></td>
                <td><?php echo $row['religion'];?></td>
                <td><?php echo $row['profession'];?></td>
                <td><?php echo $row['nolkup'];?></td>
                <td><?php echo $row['toilet'];?></td>
                <td><?php echo $row['relation_1'];?></td>
                <td><?php echo $row['relation_type_1'];?></td>
                <td><?php echo $row['relation_2'];?></td>
                <td><?php echo $row['relation_type_2'];?></td>
                <td><?php echo $row['home'];?></td>
                <td><?php echo $row['home_owner'];?></td>
                <td><?php echo $row['annual_rent'];?></td>
                <td><?php echo $row['home_owner'];?></td>
                <td><?php echo $row['previous_due'];?></td>
                <td><?php echo $row['present_tax'];?></td>
                <td><?php echo $row['collect_tax'];?></td>
                <td><?php echo $row['due_tax'];?></td>
                <td><?php echo $row['status'];?></td>
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
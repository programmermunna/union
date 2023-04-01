<?php include("database.php");

//show section for village selection
// if(isset($_POST['reference']) && isset($_POST['vlg_id'])){
//     // echo $_POST['reference'];
//     // echo $_POST['vlg_id'];
//     echo "hello";
// }
if(isset($_GET['reference']) && isset($_GET['vlg_id'])){
    $vlg_id = $_GET['vlg_id'];
    $sections = mysqli_query($conn,"SELECT * FROM section WHERE vlg_id=$vlg_id");
    while($section = mysqli_fetch_assoc($sections)){ ?>
    <option><?php echo $section['name']?></option>
   <?php }exit; }
















?>
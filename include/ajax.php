<?php include("database.php");
//option for select
if(isset($_GET['reference']) && isset($_GET['table']) && isset($_GET['cond']) && isset($_GET['cond_val'])){
    if($_GET['reference'] == 'option'){?>
    <option value="">বাছাই করুন</option>
     <?php 
        $table = $_GET['table'];
        $cond = $_GET['cond'];
        $cond_val = $_GET['cond_val'];
        $datas = mysqli_query($conn,"SELECT * FROM $table WHERE $cond = $cond_val");
        while($data = mysqli_fetch_assoc($datas)){ ?>
    <option value="<?php echo $data['id']?>"><?php echo $data['bn_name']?></option>
    <?php }exit; }















}






















?>
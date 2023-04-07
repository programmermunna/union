<?php include("database.php");

//show section for village selection in customer add page
if(isset($_GET['reference']) && isset($_GET['vlg_id']) && isset($_GET['id'])){
    if($_GET['reference'] == 'section of village in customer add page'){
        $vlg_id = $_GET['vlg_id'];
        $id = $_GET['id'];
        $sections = mysqli_query($conn,"SELECT * FROM section WHERE admin_id = $id AND vlg_id=$vlg_id");
        while($section = mysqli_fetch_assoc($sections)){ ?>
    <option value="<?php echo $section['id']?>"><?php echo $section['name']?></option>
    <?php }exit; }
}

//show section for village selection in customer all page
if(isset($_GET['reference']) && isset($_GET['vlg_id']) && isset($_GET['id'])){
    echo "<option style='display:none;' selected disabled>পাড়া/মহল্লা বাছাই করুণ</option>";
    if($_GET['reference'] == 'section of village in customer all page'){
        $vlg_id = $_GET['vlg_id'];
        $id = $_GET['id'];
        $sections = mysqli_query($conn,"SELECT * FROM section WHERE admin_id=$id AND vlg_id=$vlg_id");
        while($section = mysqli_fetch_assoc($sections)){ ?>
        <option value="<?php echo $section['id']?>"><?php echo $section['name']?></option>
    <?php }exit; }
}















?>
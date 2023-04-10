<?php include("database.php");

//show section for village selection in tax_holder add page
if(isset($_GET['reference']) && isset($_GET['vlg_id']) && isset($_GET['id'])){
    if($_GET['reference'] == 'section of village in tax_holder add page'){
        $vlg_id = $_GET['vlg_id'];
        $id = $_GET['id'];
        $sections = mysqli_query($conn,"SELECT * FROM section WHERE admin_id = $id AND vlg_id=$vlg_id");
        while($section = mysqli_fetch_assoc($sections)){ ?>
    <option value="<?php echo $section['id']?>"><?php echo $section['name']?></option>
    <?php }exit; }
}

//show section for village selection in tax_holder all page
if(isset($_GET['reference']) && isset($_GET['vlg_id']) && isset($_GET['id'])){
    echo "<option style='display:none;' selected disabled>পাড়া/মহল্লা বাছাই করুণ</option>";
    if($_GET['reference'] == 'section of village in tax_holder all page'){
        $vlg_id = $_GET['vlg_id'];
        $id = $_GET['id'];
        $sections = mysqli_query($conn,"SELECT * FROM section WHERE admin_id=$id AND vlg_id=$vlg_id");
        while($section = mysqli_fetch_assoc($sections)){ ?>
        <option value="<?php echo $section['id']?>"><?php echo $section['name']?></option>
    <?php }exit; }
}

//show section for village selection in tax_holder all page
if(isset($_GET['reference']) && isset($_GET['admin_id'])){
    if($_GET['reference'] == 'village of union in home page'){
        $admin_id = $_GET['admin_id'];
        $villages = mysqli_query($conn,"SELECT * FROM village WHERE admin_id=$admin_id");
        echo "<option style='display:none;' selected disabled>গ্রাম বাছাই করুণ</option>";
        while($village = mysqli_fetch_assoc($villages)){ ?>
        <option value="<?php echo $village['id']?>"><?php echo $village['name']?></option>
    <?php }exit; }
}

//show section for village selection in tax_holder all page
if(isset($_GET['reference']) && isset($_GET['vlg_id'])){
    if($_GET['reference'] == 'section of village in home page'){
        $vlg_id = $_GET['vlg_id'];
        $sections = mysqli_query($conn,"SELECT * FROM section WHERE vlg_id=$vlg_id");
        echo "<option style='display:none;' selected disabled>পাড়া/মহল্লা বাছাই করুণ</option>";
        while($section = mysqli_fetch_assoc($sections)){ ?>
        <option value="<?php echo $section['id']?>"><?php echo $section['name']?></option>
    <?php }exit; }
}















?>
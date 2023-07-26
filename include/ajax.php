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



//show section for ward selection in tax_holder all page
if(isset($_GET['reference']) && isset($_GET['admin_id'])){
    if($_GET['reference'] == 'ward of union in home page'){
        $admin_id = $_GET['admin_id'];
        $wards = mysqli_query($conn,"SELECT * FROM ward WHERE admin_id=$admin_id");
        echo "<option style='display:none;' selected disabled>ওয়ার্ড বাছাই করুণ</option>";
        while($ward = mysqli_fetch_assoc($wards)){ ?>
        <option value="<?php echo $ward['id']?>"><?php echo $ward['bn_name']?></option>
    <?php }exit; }
}


//admin section ajax

//show ward for union selection in admin/tax-holder-add page
if(isset($_GET['reference']) && isset($_GET['union_id'])){
    if($_GET['reference'] == 'ward of union in admin/tax-holder-add page'){
        $union_id = $_GET['union_id'];
        $wards = mysqli_query($conn,"SELECT * FROM ward WHERE admin_id = $union_id");
        echo "<option style='display:none;' selected disabled>ওয়ার্ড বাছাই করুণ</option>";
        while($ward = mysqli_fetch_assoc($wards)){ ?>
    <option value="<?php echo $ward['id']?>"><?php echo $ward['bn_name']?></option>
    <?php }exit; }
}

//district of division in admin/union-add page
if(isset($_GET['reference']) && isset($_GET['division'])){
    if($_GET['reference'] == 'district of division in admin/union-add page'){?>
    <option value="">জেলা বাছাই করুন</option>
     <?php 
        $division = $_GET['division']; 
        $districts = mysqli_query($conn,"SELECT * FROM districts WHERE division_id = $division");
        while($district = mysqli_fetch_assoc($districts)){ ?>
    <option value="<?php echo $district['id']?>"><?php echo $district['bn_name']?></option>
    <?php }exit; }
}

//upazila of district in admin/union-add page
if(isset($_GET['reference']) && isset($_GET['district'])){
    if($_GET['reference'] == 'upazila of district in admin/union-add page'){ ?>
    <option value="">উপজেলা বাছাই করুন</option>
     <?php $district = $_GET['district'];
        $upazilas = mysqli_query($conn,"SELECT * FROM upazilas WHERE district_id = $district");
        while($upazila = mysqli_fetch_assoc($upazilas)){ ?>
    <option value="<?php echo $upazila['id']?>"><?php echo $upazila['bn_name']?></option>
    <?php }exit; }
}

//show ward for union  in admin/tax-holder page
if(isset($_GET['reference']) && isset($_GET['admin_id'])){
    if($_GET['reference'] == 'ward of union in admin/tax-holder page'){
        $admin_id = $_GET['admin_id'];
        $wards = mysqli_query($conn,"SELECT * FROM ward WHERE admin_id = $admin_id");
        echo "<option style='display:none;' selected disabled>ওয়ার্ড বাছাই করুন</option>";
        while($ward = mysqli_fetch_assoc($wards)){ ?>
    <option value="<?php echo $ward['id']?>"><?php echo $ward['bn_name']?></option>
    <?php }exit; }
}











?>
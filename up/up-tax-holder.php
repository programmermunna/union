<!-- Header -->
<?php include("header.php");?>
<!-- Header -->
<?php 
if(isset($_GET['session_destroy'])){
    if($_GET['session_destroy'] == 'true'){
        unset($_SESSION['ward']);
        header("location:up-tax-holder.php");
    }
}


if(isset($_GET['year'])){
  $year = $_SESSION['year'] = $_GET['year'];
}
if(isset($_SESSION['year'])){
    $year = $_SESSION['year'];
}else{
    $year = $present_year; 
}

if(isset($_GET['ward'])){
    $_SESSION['ward'] = $_GET['ward'];
}
if(isset($_SESSION['ward'])){
    $sess_ward = $_SESSION['ward'];
}else{
    $sess_ward = 0;
}
?> 
<!-- Main Content -->
<main class="main_content"> 
    <!-- Side Navbar Links -->

    <!-- Page Content -->
    <section class="content_wrapper">
        <!-- Page Main Content -->
        <section class="page_main_content">
            <div class="main_content_container">
                <!-- Table -->
                <div class="table_content_wrapper">
                    <div class="page_title flex justify-between">
                        <h3>করদাতার তালিকা</h4>
                        <select style="width: 200px;" class="input" id="year" name="year" onchange="window.location.href='up-tax-holder.php?year='+this.options [this.selectedIndex].value">
                            <option selected style="display:none;" value="<?php echo $year?>"><?php echo $year?></option>                            
                            <?php 
                            $years = mysqli_query($conn,"SELECT DISTINCT present_year FROM tax_holder WHERE admin_id=$id ORDER BY id DESC");
                            while($data = mysqli_fetch_assoc($years)){ ?>
                            <option value="<?php echo $data['present_year']?>"><?php echo $data['present_year']?></option>
                            <?php  }?>
                        </select>
                    </div>
                    <header class="table_header">
                        <div class="table_header_left">
                            <a href="up-tax-holder.php?session_destroy=true" class="px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring"><i class="fa-solid fa-rotate-right"></i> refresh</a>
                            <a href="up-tax-holder-add.php" class="px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">Add New</a>
                            <a href="up-tax-holder-export.php" class="px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">Export Excel</a>
                        </div>

                        <div>
                                <div class="table_header_right">
                                <select style="width: 350PX;"  onchange="window.location.href='up-tax-holder.php?ward='+this.options [this.selectedIndex].value" name="ward" id="ward" class="input">
                                    <?php
                                    if($sess_ward > 0 ){ 
                                    $select_ward  = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ward WHERE admin_id=$id AND id=$sess_ward"));
                                    ?>
                                    <option selected value="<?php echo $select_ward['id']?>"><?php echo $select_ward['bn_name']?></option>                                        
                                    <?php  }else{ ?>
                                    <option selected disabled>ওয়ার্ড বাছাই করুণ</option>
                                   <?php }?>

                                    <?php
                                    $wards = mysqli_query($conn,"SELECT * FROM ward WHERE admin_id=$id");
                                    while($ward = mysqli_fetch_assoc($wards)){ ?>
                                        <option value="<?php echo $ward['id']?>"><?php echo $ward['bn_name']?></option>
                                    <?php  }?>
                                </select>
                            </div>
                        </div>

                        <form action="" method="GET">
                            <div class="table_header_right">
                                <input type="search" name="src" placeholder="করদাতা খুজুন" value="<?php if(isset($_GET['src'])){echo $_GET['src'];}?>"/>
                                <input style="cursor:pointer;" type="submit" class="btn" value="খুজুন"/>
                            </div>
                        </form>
                    </header>

                    <div class="table_parent">
                        <div class="table_sub_parent">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="table_th"><div class="table_th_div"><span>ক্রমিক নং.</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>খানা প্রধানের ছবি</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>খানা প্রধানের নাম</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>পিতা/স্বামীর নাম</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>বাৎসরিক গড় আয়</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>পুর্বের বকেয়া</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>বর্তমান কর</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>আদায়কৃত কর</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>বকেয়া কর</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>স্টাটাস</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>প্রতিক্রিয়া</span></div></th>
                                    </tr>
                                </thead>
                                <tbody id="tax_holders_wrapper" class="text-sm">
                                <?php
                                if(isset($_GET['src'])){
                                    $src = $_GET['src'];
                                    $empSQL = "SELECT * FROM tax_holder WHERE admin_id = '$id' AND present_year = '$year' AND (tax_holder_name LIKE '$src' OR phone = '$src' OR nid_no = '$src' OR holding = '$src')";
                                }elseif($sess_ward > 0){
                                    $empSQL = "SELECT * FROM tax_holder WHERE admin_id=$id AND present_year='$year' AND ward = '$sess_ward'";
                                }else{
                                    $empSQL = "SELECT * FROM tax_holder WHERE admin_id=$id AND present_year='$year' ";
                                }
                                $query = mysqli_query($conn, $empSQL);
                                $i = 0;
                                while($row = mysqli_fetch_assoc($query)){ $i++;
                                ?>
                                    <tr>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $i?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center">
                                                <img style="width: 50px;height:50px;margin:auto" src="../upload/<?php echo $row['file']?>" alt="<?php echo $row['file']?>">
                                            </div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['tax_holder_name']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['father_hasbend_name']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center">৳ <?php echo $row['annual_avg_income']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center">৳ <?php echo $row['previous_due']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center">৳ <?php echo $row['present_tax']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center">৳ <?php echo $row['collect_tax']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center">৳ <?php echo $row['due_tax']?></div>
                                        </td>
                                        
                                        <td class="p-3 border whitespace-nowrap">
                                          <?php  if($row['status'] == 'Success'){ ?>
                                            <b><div style="color:green" class="text-center"><?php echo $row['status']?></div></b>
                                           <?php }else{ ?>
                                            <b><div style="color:red" class="text-center"><?php echo $row['status']?></div></b>
                                         <?php  }?>
                                        </td>

                                        <!-- <td class="p-3 border whitespace-nowrap">
                                          <?php  if($row['obostha'] == 'বহাল'){ ?>
                                            <b><div style="color:#fff;background:green;padding:5px;" class="text-center"><?php echo $row['obostha']?></div></b>
                                           <?php }else{ ?>
                                            <b><div style="color:#fff;background:red;padding:5px" class="text-center"><?php echo $row['obostha']?></div></b>
                                         <?php  }?>
                                        </td> -->

                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="w-full flex_center gap-1">
                                                <a class="btn table_edit_btn"
                                                    href="up-tax-holder-edit.php?id=<?php echo $row['id']?>">Edit</a>
                                                <a class="btn table_edit_btn"
                                                    href="up-tax-holder-view.php?id=<?php echo $row['id']?>">View</a>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php  } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    

                </div>
            </div>
        </section>
    </section>

    <!-- Page Content -->
</main>
<!-- Side Navbar Links -->
<?php include("footer.php");?>
<!-- Side Navbar Links -->


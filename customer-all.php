<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 

if(isset($_GET['session_destroy'])){
    if($_GET['session_destroy'] == 'true'){
        unset($_SESSION['village']);
        unset($_SESSION['section']);
    }
}

if(isset($_GET['village'])){
    $_SESSION['village'] = $_GET['village'];
}
if(isset($_SESSION['village'])){
    $sess_vlg = $_SESSION['village'];
}else{
    $sess_vlg = 0;
}

if(isset($_GET['section'])){
    $_SESSION['section'] = $_GET['section'];
}
if(isset($_SESSION['section'])){
    $sess_sec = $_SESSION['section'];
}else{
    $sess_sec = 0;
}

?> 
<!-- Main Content -->
<main class="main_content"> 
    <!-- Side Navbar Links -->
    <?php include("common/sidebar.php");?>
    <!-- Side Navbar Links -->

    <!-- Page Content -->
    <section class="content_wrapper">

        <!-- Page Main Content -->
        <section class="page_main_content">
            <div class="main_content_container">
                <!-- Table -->
                <div class="table_content_wrapper">
                    <div class="page_title">
                        <h4>ALL CUSTOMERS</h4>
                    </div>
                    <header class="table_header">
                        <div class="table_header_left">
                            <a href="customer-all.php?session_destroy=true" class="px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring"><i class="fa-solid fa-rotate-right"></i> refresh</a>
                            <a href="customer-add.php" class="px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">Add Customer</a>
                            <a href="customer-export.php" class="px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">Export Excel</a>
                        </div>


                        <div>
                            <form action="" method="GET">
                                <div class="table_header_right">
                                <select style="width: 350PX;" name="village" id="village" class="input">
                                    <?php
                                    if($sess_vlg != 0 ){ 
                                    $select_village  = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM village WHERE admin_id=$id AND id=$sess_vlg"));
                                    ?>
                                        <option selected value="<?php echo $select_village['id']?>"><?php echo $select_village['name']?></option>                                        
                                    <?php  }else{ ?>
                                    <option selected disabled>গ্রাম বাছাই করুণ</option>
                                   <?php }?>

                                    <?php
                                    $villages = mysqli_query($conn,"SELECT * FROM village WHERE admin_id=$id");
                                    while($village = mysqli_fetch_assoc($villages)){ ?>
                                        <option value="<?php echo $village['id']?>"><?php echo $village['name']?></option>
                                    <?php  }?>
                                </select>


                                <select name="section" class="input" id="section">
                                <?php
                                    if($sess_sec != 0 ){ 
                                    $select_section  = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM section WHERE admin_id=$id AND id=$sess_sec"));                                        
                                    ?>
                                        <option selected value="<?php echo $select_section['id']?>"><?php echo $select_section['name']?></option>                                        
                                    <?php  }else{ ?>
                                    <option selected disabled>পাড়া/মহল্লা বাছাই করুণ</option>
                                   <?php }?>
                                </select>
                                <input style="cursor:pointer;" type="submit" class="btn" placeholder="Search" />
                            </div>
                        </form>
                        </div>



                        <form action="" method="GET">
                            <div class="table_header_right">
                                <input type="search" name="src" placeholder="Search Customer" />
                                <input style="cursor:pointer;" type="submit" class="btn"
                                    placeholder="Search" />
                            </div>
                        </form>
                    </header>

                    <div class="table_parent">
                        <div class="table_sub_parent">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="table_th"><div class="table_th_div"><span>আইডি নং.</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>খানা প্রধানের ছবি</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>খানা প্রধানের নাম</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>পিতা/স্বামীর নাম</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>পেশা</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>গৃহের বিবরন</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>সদস্য সংখ্যা</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>হোল্ডিং নং</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>জাতীয় পরিচয়পত্র</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>স্থাপনার মুল্য</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>বার্ষিক কর</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>নগদ কর</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>বকেয়া কর</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>অর্থ বছর</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>মোবাইল নং</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>প্রতিক্রিয়া</span></div></th>
                                    </tr>
                                </thead>
                                <tbody id="customers_wrapper" class="text-sm">
                                <?php
                                if(isset($_GET['src'])){
                                    $src = $_GET['src'];
                                    $empSQL = "SELECT * FROM person WHERE admin_id=$id AND (name LIKE '$src' OR mobile_no = '$src' OR nid_no = '$src' OR holding_no = '$src' OR guardian_name LIKE '$src')";
                                }elseif($sess_vlg > 0 && $sess_sec > 0){
                                    $empSQL = "SELECT * FROM person WHERE admin_id=$id AND village = $sess_vlg AND section = $sess_sec ";
                                }elseif($sess_vlg > 0){
                                    $empSQL = "SELECT * FROM person WHERE admin_id=$id AND village = $sess_vlg ";
                                }else{
                                    $empSQL = "SELECT * FROM person WHERE admin_id=$id ";
                                }
                                $query = mysqli_query($conn, $empSQL);
                                $i = 0;
                                while($row = mysqli_fetch_assoc($query)){ $i++;
                                ?>
                                    <tr>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['id_no']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center">
                                            <img style="width: 70px;height:70px;margin:auto" src="upload/<?php echo $row['file_name']?>" alt="image">
                                        </div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['name']?></div>
                                        </td>
                                        
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['guardian_name']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['profession']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['home']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['family_member']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['holding_no']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['nid_no']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center">৳ <?php echo $row['net_worth']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center">৳ <?php echo $row['annual_tax']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center">৳ <?php echo $row['ablable_tax']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center">৳ <?php echo $row['due_tax']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['present_year']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['mobile_no']?></div>
                                        </td>
                                        </td>

                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="w-full flex_center gap-1">
                                                <a class="btn table_edit_btn"
                                                    href="customer-edit.php?id=<?php echo $row['id']?>">Edit</a>
                                                <a class="btn table_edit_btn"
                                                    href="delete.php?src=customer-all&&table=person&&id=<?php echo $row['id']?>">Delete</a>
                                                <a class="btn table_edit_btn"
                                                    href="customer-view.php?id=<?php echo $row['id']?>">View</a>
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

<script>
    $(document).ready(function(){  
      $("#village").on("change",function(){
        var vlg_id = $(this).val();
        $.ajax({
            url:"include/ajax.php",
            type:"GET",
            data:
            {
              reference:"section of village in customer all page",
              id:<?php echo $id?>,
              vlg_id:vlg_id,
            },         
            success:function(data){
              $("#section").html(data);
              }
            });
        })

    })
</script>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

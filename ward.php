<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php  
if(isset($_POST['add_ward'])){
  $add_ward = $_POST['add_ward_name'];

  $insert_ward = mysqli_query($conn,"INSERT INTO ward(admin_id,name) VALUE($id'$add_ward')");
  if($insert_ward){
    $msg = "ওয়ার্ড যুক্ত করা সফল হয়েছে";
    header("location:ward.php?msg=$msg");
  }
}

if(isset($_POST['update'])){
  $id = $_POST['id'];
  $up_ward = $_POST['up_ward'];

  $insert_ward = mysqli_query($conn,"UPDATE ward SET ward='$up_ward' WHERE id=$id");
  if($insert_ward){
    $msg = "ওয়ার্ড সংশোধন করা সফল হয়েছে";
    header("location:ward.php?msg=$msg");
  }
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
                    <div style="display:flex; justify-content: space-between;" class="page_title">
                      <div>
                            <h3>ওয়ার্ডের তালিকা</h3>
                        </div>
                        <div>
                        
                      </div>                    
                    </div>
                    <header class="table_header">
                        <div class="table_header_left">
                        <a href="ward-add.php" class="add_ward_btn show_add_new_cat px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">ওয়ার্ড যুক্ত করুন</a>
                        </div>

                        <form action="" method="GET">
                            <div class="table_header_right">
                                <input type="search" name="src" placeholder="ওয়ার্ড খুজুন" />
                                <input style="cursor:pointer;" type="submit" class="btn" value="খুজুন" />
                            </div>
                        </form>
                    </header>
                            <div class="table_parent">
                             <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="table_th"><div class="table_th_div"><span>আইডি নং</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>ওয়ার্ডের নাম</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>প্রতিক্রিয়া</span></div></th>
                                    </tr>
                                </thead>
                                <tbody id="tax_holders_wrapper" class="text-sm">
                                <?php
                                if(isset($_GET['src'])){
                                    $src = $_GET['src'];
                                    $SQL = "SELECT * FROM ward WHERE admin_id=$id AND name LIKE '%$src%'";
                                }else{                                
                                    $SQL = "SELECT * FROM ward WHERE admin_id=$id ";
                                }
                                $query = mysqli_query($conn, $SQL);
                                $i = 0;
                                while($row = mysqli_fetch_assoc($query)){ $i++; ?>
                                    <tr>
                                        <td class="p-3 border whitespace-nowrap"><div class="text-center"><?php echo $i?></div></td>
                                        <td class="p-3 border whitespace-nowrap"><div class="text-center"><?php echo $row['bn_name']?></div></td>                                       
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="w-full flex_center gap-1">
                                                <a class="btn table_edit_btn" href="ward-edit.php?id=<?php echo $row['id']?>">এডিট করুন</a>
                                            </div>
                                        </td>
                                    </tr>
                              <?php  } ?>
                            </table>
                            </div>
                            <br>                       

                        </div>
                    </div>
                </div>


            </div>
        </section>
    </section>
    <!-- Page Content -->
</main>

<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->


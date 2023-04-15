<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php

  
if(isset($_POST['add_section'])){
  $add_section = $_POST['add_section_name'];

  $insert_section = mysqli_query($conn,"INSERT INTO section(admin_id,name) VALUE($id'$add_section')");
  if($insert_section){
    $msg = "সফল ভাবে পাড়া/মহল্লা যুক্ত করা হয়েছে";
    header("location:section.php?msg=$msg");
  }
}

if(isset($_POST['update'])){
  $id = $_POST['id'];
  $up_section = $_POST['up_section'];

  $insert_section = mysqli_query($conn,"UPDATE section SET section='$up_section' WHERE id=$id");
  if($insert_section){
    $msg = "সফল ভাবে পাড়া/মহল্লা সংসোধন করা হয়েছে";
    header("location:section.php?msg=$msg");
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
                            <h3>পাড়ার তালিকা</h3>
                        </div>
                        <div>
                        
                      </div>                    
                    </div>
                    <header class="table_header">
                        <div class="table_header_left">
                        <a href="section-add.php" class="add_section_btn show_add_new_cat px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">পাড়া যুক্ত করুন</a>
                        </div>

                        <form action="" method="GET">
                            <div class="table_header_right">
                                <input type="search" name="src" placeholder="পাড়া খুজুন" />
                                <input style="cursor:pointer;" type="submit" class="btn" value="খুজুন" />
                            </div>
                        </form>
                    </header>
                            <div class="table_parent">
                             <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="table_th"><div class="table_th_div"><span>আইডি নং</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>পাড়ার নাম</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>গ্রামের নাম</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>প্রতিক্রিয়া</span></div></th>
                                    </tr>
                                </thead>
                                <tbody id="tax_holders_wrapper" class="text-sm">
                                <?php
                                if(isset($_GET['src'])){
                                    $src = $_GET['src'];
                                    $SQL = "SELECT * FROM section WHERE admin_id=$id AND name LIKE '%$src%'";
                                }else{
                                    $SQL = "SELECT * FROM section WHERE admin_id=$id ";                                
                                }
                                $query = mysqli_query($conn, $SQL);
                                $i = 0;
                                while($row = mysqli_fetch_assoc($query)){ $i++;
                                $vlg_id = $row['vlg_id'];
                                $vlg_id = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM village WHERE id=$vlg_id"));
                                ?>
                                    <tr>
                                        <td class="p-3 border whitespace-nowrap"><div class="text-center"><?php echo $i?></div></td>
                                        <td class="p-3 border whitespace-nowrap"><div class="text-center"><?php echo $row['name']?></div></td>                                       
                                        <td class="p-3 border whitespace-nowrap"><div class="text-center"><?php echo $vlg_id['name']?></div></td>                                       
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="w-full flex_center gap-1">
                                                <a class="btn table_edit_btn" href="section-edit.php?id=<?php echo $row['id']?>">এডিট করুন</a>
                                                <a class="btn table_edit_btn" href="delete.php?src=section&&table=section&&id=<?php echo $row['id']?>">ডিলেট করুন</a>
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
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

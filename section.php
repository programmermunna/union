<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php

  
if(isset($_POST['add_section'])){
  $add_section = $_POST['add_section_name'];

  $insert_section = mysqli_query($conn,"INSERT INTO section(admin_id,name) VALUE($id'$add_section')");
  if($insert_section){
    $msg = "Successfully created a new section";
    header("location:section.php?msg=$msg");
  }
}

if(isset($_POST['update'])){
  $id = $_POST['id'];
  $up_section = $_POST['up_section'];

  $insert_section = mysqli_query($conn,"UPDATE section SET section='$up_section' WHERE id=$id");
  if($insert_section){
    $msg = "Successfully created a new section";
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
                                <input type="search" name="src" placeholder="Search section" />
                                <input style="cursor:pointer;" type="submit" class="btn" placeholder="Search" />
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
                                <tbody id="customers_wrapper" class="text-sm">
                                <?php
                                if(isset($_GET['src'])){
                                    $src = $_GET['src'];
                                    $SQL = "SELECT * FROM section WHERE admin_id=$id AND name LIKE '%$src%'";
                                }else{
                                $pagination = "ON";                              
                                $showRecordPerPage = 8;
                                if(isset($_GET['page']) && !empty($_GET['page'])){
                                $currentPage = $_GET['page'];}else{$currentPage = 1;}
                                $startFrom = ($currentPage * $showRecordPerPage) - $showRecordPerPage;
                                $totalEmpSQL = "SELECT * FROM section WHERE admin_id=$id ORDER BY id DESC";
                                $allEmpResult = mysqli_query($conn, $totalEmpSQL);
                                $totalEmployee = mysqli_num_rows($allEmpResult);
                                $lastPage = ceil($totalEmployee/$showRecordPerPage);
                                $firstPage = 1;
                                $nextPage = $currentPage + 1;
                                $previousPage = $currentPage - 1;                                
                                $SQL = "SELECT * FROM section WHERE admin_id=$id ORDER BY id DESC LIMIT $startFrom, $showRecordPerPage";
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

                        <!-- -------------pagination---------------- -->
                        <?php if(isset($pagination)){
                        if($pagination == "ON"){ ?>
                        <div class="w-full" style="display: flex; justify-content: space-between;">
                            <nav aria-label="Page navigation">
                                <ul class="pagination_buttons">

                                    <?php if($currentPage >= 2) { ?>
                                    <li class="pagination"><a class="page-link"
                                            href="?page=<?php echo $previousPage ?>">Previws</a>
                                    </li>
                                    <?php } ?>
                                    <?php if($currentPage != $firstPage) { ?>
                                    <li class="pagination">
                                        <a class="page-link" href="?page=<?php echo $firstPage ?>" >
                                            <span class="page-link" aria-hidden="true">1</span>
                                        </a>
                                    </li>
                                    <?php } ?>

                                    <li class="pagination active"><a class="page-link active"
                                            href="?page=<?php echo $currentPage ?>"><?php echo $currentPage ?></a></li>

                                     <?php if($currentPage < $lastPage) { ?>
                                    <li class="pagination "><a class="page-link"
                                            href="?page=<?php echo $currentPage+1 ?>"><?php echo $currentPage+1 ?></a></li>
                                      <?php } ?>   
                                      
                                      <?php if($currentPage < $lastPage) { ?>
                                    <li class="pagination "><a class="page-link"
                                            href="?page=<?php echo $currentPage+1+1 ?>"><?php echo $currentPage+1+1 ?></a></li>
                                      <?php } ?>   

                                            <?php if($currentPage < $lastPage) { ?>     
                                    <li class="pagination "><a class="page-link"
                                            href="?page=<?php echo $currentPage+1+1+1 ?>"><?php echo $currentPage+1+1+1 ?></a></li>
                                            <?php } ?>   

                                    <?php if($currentPage < $lastPage) { ?>
                                    <li class="pagination"><a class="page-link"
                                            href="?page=<?php echo $nextPage ?>"><?php //echo $nextPage  ?>Next</a></li>
                                    <?php } ?>

                                    <li class="pagination">
                                        <a class="page-link" href="?page=<?php echo $lastPage ?>" aria-label="Next">
                                            <span aria-hidden="true">Last</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                            <div class="pagination_buttons">Page <?php echo $currentPage ?> of <?php echo $lastPage ?></div>
                        </div>
                        <?php }}?>
                    <!-- -------------pagination---------------- -->


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

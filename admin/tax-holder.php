<?php include("common/header.php")?>
<?php include("common/sidebar.php")?>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  <?php include("common/navbar.php")?>
  <div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 search_bar">
                <h6 class="text-white text-capitalize ps-3">করদাতার তালিকা সমূহ</h6>
                <div class="top_search">
                  <form action="" method="POST">
                    <input name="src" type="text" placeholder="এখানে লিখুন">
                    <button name="search" type="submit">খুজুন</button>
                  </form>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ক্রমিক নং</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ছবি</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">আইডি নং</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">নাম</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">পিতা/স্বামীর নাম</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">সদস্য সংখ্যা</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">হোল্ডিং</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">জাতীয় পরিচয়পত্র</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">পেশা</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">গৃহের বিবরন</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">স্থাপনার মূল্য</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">বার্ষিক কর</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">নগদ কর</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">বকেয়া কর</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">অর্থ বছর</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">মোবাইল নং</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">স্টাটাস</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">প্রতিক্রিয়া</th>
                    </tr>
                  </thead>
                  <tbody>

                  <?php                  
                  if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                  $page_no = $_GET['page_no'];} else {$page_no = 1;}
                  $total_records_per_page = 100;
                  $offset = ($page_no-1) * $total_records_per_page;
                  $previous_page = $page_no - 1;
                  $next_page = $page_no + 1;
                  $adjacents = "2"; 

                  $result_count = mysqli_query($conn,"SELECT * FROM person");
                  $total_records = mysqli_num_rows($result_count);
                  $total_no_of_pages = ceil($total_records / $total_records_per_page);
                  $second_last = $total_no_of_pages - 1;

                  $result = mysqli_query($conn,"SELECT * FROM person LIMIT $offset, $total_records_per_page");
                  $i=0;
                  while($data= mysqli_fetch_assoc($result)){ 
                    $i++;
                    ?>
                    <tr>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $i;?></span>
                      </td>
                      <td>
                        <div class="d-flex px-2 py-1">
                          <div>
                            <img src="../upload/<?php echo $data['file_name'];?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                          </div>
                        </div>
                      </td>                      
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['id_no'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['name'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['guardian_name'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['word_no'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['family_member'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['holding_no'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['nid_no'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['profession'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['home'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['net_worth'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['annual_tax'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['ablable_tax'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['due_tax'];?></span>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="text-secondary text-xs font-weight-bold"><?php echo $data['mobile_no'];?></span>
                      </td>
                      <td class="align-middle text-center">
                        <?php if($data['status']=='Pending'){ ?>
                          <span class="text-xs font-weight-bold badge badge-sm bg-gradient-danger"><?php echo $data['status'];?></span>
                     <?php }else{?>
                        <span class="text-xs font-weight-bold badge badge-sm bg-gradient-success"><?php echo $data['status'];?></span>
                        <?php }?>
                      </td>
                      <td style="text-align:center">
                        <a href="users-edit.php?src=users-all&&id=<?php echo $data['id'];?>" class="badge badge-sm bg-gradient-success">View</a>
                        <a href="delete.php?src=users&&id=<?php echo $data['id'];?>" class="badge badge-sm bg-gradient-success">Delete</a>
                      </td>
                    </tr>
                    <?php }?>
                  </tbody>
                </table>


              <!-- /* ----------paginations----------- */ -->
              <style>
                .paginations>ul{box-shadow: 0 0 1px gray;margin: 0;padding: 10px;}
                .paginations>ul>li{list-style: none;display: inline-block;line-height: 2.5;}
                .paginations>ul>li>a{padding: 5px 10px;margin:5px;background: #fff;font-weight: bolder;box-shadow: 0px 0px 2px gray;}
                .paginations>ul>li>a:hover{background: #E8503C;color: #fff;}
                .active>a{background: #E8503C !important;color: #fff !important;}
                .page_of{padding-top: 10px;}
                @media only screen and (max-width: 850px){.page_of{display: none;}}
              </style>

              <div style="display:flex;justify-content:space-between;padding:10px 20px;">
                  <div class="paginations">
                    <ul>
                      <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
                        
                      <li <?php if($page_no <= 1){ echo "class=''"; } ?>>
                      <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Previous</a>
                      </li>
                          
                        <?php 
                      if ($total_no_of_pages <= 10){  	 
                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                          if ($counter == $page_no) {
                          echo "<li class=''><a>$counter</a></li>";	
                            }else{
                              echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }
                            }
                      }
                      elseif($total_no_of_pages > 10){
                        
                      if($page_no <= 4) {			
                      for ($counter = 1; $counter < 8; $counter++){		 
                          if ($counter == $page_no) {
                          echo "<li class='active'><a>$counter</a></li>";	
                            }else{
                              echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }
                            }
                        echo "<li><a>...</a></li>";
                        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                        }

                      elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                        echo "<li><a href='?page_no=1'>1</a></li>";
                        echo "<li><a href='?page_no=2'>2</a></li>";
                            echo "<li><a>...</a></li>";
                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                              if ($counter == $page_no) {
                          echo "<li class='active'><a>$counter</a></li>";	
                            }else{
                              echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }                  
                          }
                          echo "<li><a>...</a></li>";
                        echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
                        echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
                                }
                        
                        else {
                            echo "<li><a href='?page_no=1'>1</a></li>";
                        echo "<li><a href='?page_no=2'>2</a></li>";
                            echo "<li><a>...</a></li>";

                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                              if ($counter == $page_no) {
                          echo "<li class='active'><a>$counter</a></li>";	
                            }else{
                              echo "<li><a href='?page_no=$counter'>$counter</a></li>";
                            }                   
                                    }
                                }
                      }
                    ?>
                        
                      <li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                      <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Next</a>
                      </li>
                        <?php if($page_no < $total_no_of_pages){
                        echo "<li><a href='?page_no=$total_no_of_pages'>Last</a></li>";
                        } ?>
                    </ul>
                  </div>
                  <div class="page_of">
                    <div><strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong></div>
                  </div>
                </div>
                <!-- /* ----------paginations----------- */ -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>  
  
  <?php include("common/footer.php")?>
  <?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

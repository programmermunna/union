<!-- Header -->
<?php include("common/header.php");?>
<!-- Header -->
<?php 
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $time = time();
  
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    move_uploaded_file($file_tmp,"upload/$file_name");
  
    $sql = "INSERT INTO customer(admin_id,name,email,phone,address,city,file,time) VALUES($id,'$name','$email','$phone','$address','$city','$file_name','$time')";
    $query = mysqli_query($conn,$sql);
    if($query){
    $msg = "Successfully Created New Customer!";
    header("location:customer-all.php?msg=$msg");
    }else{
    echo "Something is worng!";
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
                    <div class="page_title">
                        <h4>ALL CUSTOMERS</h4>
                    </div>
                    <header class="table_header">
                        <div class="table_header_left">
                            <a href="customer-add.php" class="px-4 py-2 text-sm bg-blue-600 text-white rounded focus:ring">Add Customer</a>
                        </div>


                        <div>
                            <form action="" method="POST">
                                <div class="table_header_right">
                                <select name="month" class="input">
                                    <?php
                                    if(isset($_POST['month'])){ ?>
                                        <option selected value="<?php echo $_POST['month']?>"><?php echo $_POST['month']?></option>                                        
                                    <?php  }?>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                                <select name="year" class="input">
                                    <?php
                                    if(isset($_POST['month'])){ ?>
                                        <option selected value="<?php echo $_POST['year']?>"><?php echo $_POST['year']?></option>                                        
                                    <?php  }?>
                                    <option value="2022">2022</option>
                                    <option value="2023">2023</option>
                                    <option value="2024">2024</option>
                                    <option value="2025">2025</option>
                                    <option value="2026">2026</option>
                                    <option value="2027">2027</option>
                                    <option value="2028">2028</option>
                                    <option value="2029">2029</option>
                                    <option value="2030">2030</option>
                                </select>
                                <input style="cursor:pointer;" name="select" type="submit" class="btn" placeholder="Search" />
                            </div>
                        </form>
                        </div>



                        <form action="" method="POST">
                            <div class="table_header_right">
                                <input type="search" name="src_text" placeholder="Search Customer" />
                                <input style="cursor:pointer;" type="submit" name="search" class="btn"
                                    placeholder="Search" />
                            </div>
                        </form>
                    </header>

                    <div class="table_parent">
                        <div class="table_sub_parent">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="table_th"><div class="table_th_div"><span>ক্রমিক নং.</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>খানা প্রধানের নাম</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>পিতা/স্বামীর নাম</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>সদস্য সংখ্যা</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>হোল্ডিং নং</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>জাতীয় পরিচয়পত্র</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>পেশা</span></div></th>
                                        <th class="table_th"><div class="table_th_div"><span>গৃহের বিবরন</span></div></th>
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
                                $empSQL = "SELECT * FROM person WHERE admin_id=$id ORDER BY id DESC";
                                $query = mysqli_query($conn, $empSQL);
                                $i = 0;
                                while($row = mysqli_fetch_assoc($query)){ $i++;
                                ?>
                                    <tr>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $i?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['name']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['guardian_name']?></div>
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
                                            <div class="text-center"><?php echo $row['profession']?></div>
                                        </td>
                                        <td class="p-3 border whitespace-nowrap">
                                            <div class="text-center"><?php echo $row['home']?></div>
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
                                                    href="delete.php?src=customer&&id=<?php echo $row['id']?>">Delete</a>
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

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="add_category_wrapper add_village" style="display: none;">
            <div class="hide_add_new_cat fixed inset-0 w-full h-screen bg-black bg-opacity-50 z-40"></div>
            <div
                class="fixed w-[96%] md:w-[500px] inset-0 m-auto p-5 bg-white rounded shadow z-50 h-fit add_product_main">
                <h3 class="p-4 border-b text-center">
                    Add New Customer
                </h3>

                <div>
                    <label>Full Name</label>
                    <input type="text" name="name" placeholder="Full name" class="input" />
                </div>
                <div>
                    <label>Email</label>
                    <input type="text" name="email" placeholder="Email" class="input" />
                </div>
                <div>
                    <label>Phone</label>
                    <input type="text" name="phone" placeholder="Phone" class="input" />
                </div>
                <div>
                    <label>Address</label>
                    <input type="text" name="address" placeholder="Address" class="input" />
                </div>
                <div>
                    <label>City</label>
                    <input type="text" name="city" placeholder="City" class="input" />
                </div>
                <div>
                    <label>Photo</label>
                    <input type="file" name="file" title="profile" placeholder="City" />
                </div>

                <div class="p-4 flex items-center justify-end gap-x-3 border-t mt-4">
                    <button class="btn w-fit p-2 bg-blue-600 text-white rounded focus:ring-2" type="submit"
                        name="submit">Create Product</button>
                    <button
                        class="btn w-fit p-2 bg-red-400 text-white rounded focus:ring-2 hide_add_new_cat">Cancel</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Page Content -->
</main>
<!-- Side Navbar Links -->
<?php include("common/footer.php");?>
<!-- Side Navbar Links -->
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

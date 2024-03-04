<?php include("common/home-header.php");?>

<?php

	$exect_id = '';
	$ward = '';
	$father_hasbend_name = '';
	$tax_holder_name = ''; 
	$present_year = $present_year; 

if(isset($_POST['submit'])){
	$exect_id = $_POST['exect_id'];	
	$father_hasbend_name = $_POST['father_hasbend_name'];
	$tax_holder_name = $_POST['tax_holder_name'];
	$present_year = $_POST['present_year'];

	if(isset($_POST['ward'])){
		$ward = $_POST['ward'];		
	}else{
		$ward = '';
	};
	
	if(!empty($exect_id)){
		$exect_id = $_POST['exect_id'];
		$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tax_holder WHERE present_year='$present_year' AND ( holding=$exect_id OR phone=$exect_id OR nid_no=$exect_id) "));
		if(!$data){header("location:tax-check.php");}
	}elseif(!empty($ward)){
		$ward = $_POST['ward'];
		$father_hasbend_name = $_POST['father_hasbend_name'];
		$tax_holder_name = $_POST['tax_holder_name'];
		$data = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM tax_holder WHERE present_year='$present_year' AND ward='$ward' AND father_hasbend_name='$father_hasbend_name' AND tax_holder_name='$tax_holder_name'"));
		if(!$data){header("location:tax-check.php");}
	}else{
		header("location:tax-check.php");
	}

	
	$word_id = $data['ward'];
	$ward = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM ward WHERE id=$word_id"));
	$union_id = $ward['union_id'];
	$unions = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM unions WHERE id=$union_id"));
	$upazila_id = $unions['upazila_id']; 
	$upazilas = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM upazilas WHERE id=$upazila_id"));
	$district_id = $upazilas['district_id'];
	$districts = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM districts WHERE id=$district_id"));
	$division_id = $districts['division_id'];
	$divisions = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM divisions WHERE id=$division_id"));

	include("tax-result.php"); exit;
	
	}


?>
        <main>
            <section class="hero" style="padding:30px 0">
                <div class="container">
                    <div class="hero-inners">
						<div class="card2">
							<div class="from">
								<form action="" method="POST">
									<div style="display: flex;justify-content:space-between">
										<div><h3>আপনার কর যাচাই করুন</h3></div>
										<div>
										<label for="present_year">অর্থবছর</label>
										<select name="present_year">
											<?php
											$present_years = mysqli_query($conn,"SELECT * FROM tax_holder GROUP BY present_year ORDER BY present_year DESC");
											while($present_year = mysqli_fetch_assoc($present_years)){ ?>
											<option value="<?php echo $present_year['present_year']?>"><?php echo $present_year['present_year']?></option>
											<?php }?>
										</select>
										</div>
									</div>

									<div>
										<label for="union">বিভাগ</label>
										<select name="division" class="select_bar division">
											<option value="">বিভাগ বাছাই করুন</option>									
											<?php 
											$divisions = mysqli_query($conn,"SELECT * FROM divisions");
											while($division = mysqli_fetch_assoc($divisions)){ ?>
											<option value="<?php echo $division['id'];?>"><?php echo $division['bn_name'];?></option>
											<?php }?>
										</select>
									</div>
									<div>
										<label for="union">জেলা</label>
										<select name="district" class="select_bar district">
										
										</select>
									</div>
									<div>
										<label for="union">উপজেলা</label>
										<select name="upazila" name="upazila" class="select_bar upazila">
											
										</select>
									</div>
									<div>
										<label for="union">ইউনিয়ন</label>
										<select name="union" name="union" class="select_bar union">
										
									</select>
									</div>
									<div>
										<label for="union">ওয়ার্ড</label>
										<select name="ward" name="ward" class="select_bar ward">
										
									</select>
									</div>

									<div>
										<label for="father_hasbend_name">করদাতার পিতা/স্বামী</label>
										<br>
										<input  name="father_hasbend_name" type="text" >
									</div>
									<div>
										<label for="tax_holder_name">করদাতার নাম</label>
										<br>
										<input  name="tax_holder_name" type="text" >
									</div>									
									<div style="color:red;font-size:15px;font-weight:bolder">অথবা</div>
									<div>
										<label for="exect_id">আইডি নং, ভোটার আইডি কার্ড, মোবাইল নং, হোল্ডিং নং</label>
										<br>
										<input  name="exect_id" type="number" >
									</div>

									<div>
									<input name="submit" type="submit" value="Submit">
									</div>									
								</form>
							</div>
						</div>
                    </div>
                </div>
            </section>
        </main>


<script>
      $(".division").on("change",function(){
        var division = $(this).val();
        return opt_func("","districts","division_id",division,".district");
        })

      $(".district").on("change",function(){
        var district = $(this).val();
        return opt_func("","upazilas","district_id",district,".upazila");
        })

      $(".upazila").on("change",function(){
        var upazila = $(this).val();
        return opt_func("","unions","upazila_id",upazila,".union");
        })

      $(".union").on("change",function(){
        var upazila = $(this).val();
        return opt_func("","ward","union_id",upazila,".ward");
        })
</script>

<?php include("common/home-footer.php")?>


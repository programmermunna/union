<?php include("common/home-header.php");?>
        <main>
            <section class="hero" style="padding:30px 0">
                <div class="container">
                    <div class="hero-inners">
						<div class="card2">
							<div class="from">
								<?php
								if(isset($_POST['submit'])){ 
									$present_year = $_POST['present_year'];	 
									$exect_id = $_POST['exect_id'];	
									if(!empty($exect_id)){
										if(is_numeric($exect_id)){
											$sql = "SELECT * FROM person WHERE present_year='$present_year' AND (id_no = $exect_id OR holding_no = $exect_id OR nid_no = $exect_id OR mobile_no = $exect_id)";
											$data = mysqli_fetch_assoc(mysqli_query($conn,$sql));
											if($data){
												$division = $data['division_id'];
												$district = $data['district_id'];
												$upazila = $data['upazila_id'];
												$union = $data['union_id'];
												$ward = $data['ward'];
	
												$division_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT bn_name FROM divisions WHERE id ='$division'")); 
												 $district_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT bn_name FROM districts WHERE id ='$district'")); 
												 $upazila_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT bn_name FROM upazilas WHERE id ='$upazila'")); 
												 $union_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT bn_name FROM union_name WHERE id ='$union'")); 
												 $ward_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT bn_name FROM ward WHERE id ='$ward'")); 
											}else{
											echo "<h1 style='text-align:center'>No Data Found</h1>";
											echo "<h1 style='text-align:center'><a href='tax-check.php'>Back</a></h1>";
											echo "<br>";
											exit;
											}

										}else{
											header("location:home.php");
										}
									}else{	
									
									if( isset($_POST['division']) && isset($_POST['district']) && isset($_POST['upazila']) && isset($_POST['union']) && isset($_POST['ward']) && isset($_POST['guardian_name']) && isset($_POST['tax_holder_name']) ){
									
										$division = $_POST['division'];	
										$district = $_POST['district'];	
										$upazila = $_POST['upazila'];	
										$union = $_POST['union'];	
										$ward = $_POST['ward'];
										$guardian_name = $_POST['guardian_name'];
										$tax_holder_name = $_POST['tax_holder_name'];								 	
																			
										$sql = "SELECT * FROM person WHERE present_year='$present_year' AND division_id='$division' AND district_id='$district' AND upazila_id='$upazila' AND union_id='$union' AND ward='$ward' AND guardian_name='$guardian_name' AND name='$tax_holder_name'";
										$data = mysqli_fetch_assoc(mysqli_query($conn,$sql));

										$division = $data['division_id'];
										$district = $data['district_id'];
										$upazila = $data['upazila_id'];
										$union = $data['union_id'];
										$ward = $data['ward'];

										$division_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT bn_name FROM divisions WHERE id ='$division'")); 
										$district_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT bn_name FROM districts WHERE id ='$district'")); 
										$upazila_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT bn_name FROM upazilas WHERE id ='$upazila'")); 
										$union_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT bn_name FROM union_name WHERE id ='$union'")); 
										$ward_name = mysqli_fetch_assoc(mysqli_query($conn,"SELECT bn_name FROM ward WHERE id ='$ward'")); 
									  }else{
										echo "<h1 style='text-align:center'>No Data Found</h1>";
										echo "<h1 style='text-align:center'><a href='tax-check.php'>Back</a></h1>";
										echo "<br>";
										exit;
										}								
									}

								?>
								<form action="">									
									<div>
										<label for="union">আইডি নং</label>
										<br>
										<input disabled type="text" name="id_no" value="<?php echo $data['id_no'] ?>" >
									</div>
									<div>
										<label for="union">করদাতার নাম</label>
										<br>
										<input disabled type="text" name="name" value="<?php echo $data['name'] ?>" >
									</div>
									<div>
										<label for="union">পিতা/স্বামীর নাম </label>
										<br>
										<input disabled type="text" name="guardian_name" value="<?php echo $data['guardian_name'] ?>" >
									</div>
									<div>
										<label for="division">বিভাগ</label>
										<br>
										<input disabled type="text" name="division" value="<?php echo $division_name['bn_name'] ?>" >
									</div>
									<div>
										<label for="district">জেলা</label>
										<br>
										<input disabled type="text" name="district" value="<?php echo $district_name['bn_name'] ?>" >
									</div>
									<div>
										<label for="upzila">উপজেলা</label>
										<br>
										<input disabled type="text" name="upzila" value="<?php echo $upazila_name['bn_name'] ?>" >
									</div>
									<div>
										<label for="union">ইউনিয়ন</label>
										<br>
										<input disabled type="text" name="union" value="<?php echo $union_name['bn_name'] ?>" >
									</div>
									<div>
										<label for="ward">ওয়ার্ড</label>
										<br>
										<input disabled type="text" name="ward" value="<?php echo $ward_name['bn_name'] ?>" >
									</div>
									<div>
										<label for="union">ওয়ার্ড নং</label>
										<br>
										<input disabled type="text" name="word_no" value="<?php echo $data['word_no'] ?>" >
									</div>
									<div>
										<label for="union">পরিবারের সদস্য সংখ্যা</label>
										<br>
										<input disabled type="text" name="family_member" value="<?php echo $data['family_member'] ?>" >
									</div>
									<div>
										<label for="union">পুরুষ</label>
										<br>
										<input disabled type="text" name="male" value="<?php echo $data['male'] ?>" >
									</div>
									<div>
										<label for="union">মহিলা</label>
										<br>
										<input disabled type="text" name="female" value="<?php echo $data['female'] ?>" >
									</div>
									<div>
										<label for="union">হোল্ডিং নং</label>
										<br>
										<input disabled type="text" name="holding_no" value="<?php echo $data['holding_no'] ?>" >
									</div>
									<div>
										<label for="union">জাতীয় পরিচয়পত্র নং</label>
										<br>
										<input disabled type="text" name="nid_no" value="<?php echo $data['nid_no'] ?>" >
									</div>
									<div>
										<label for="union">পেশা</label>
										<br>
										<input disabled type="text" name="profession" value="<?php echo $data['profession'] ?>" >
									</div>
									<div>
										<label for="union">গৃহের বিবরন</label>
										<br>
										<input disabled type="text" name="home" value="<?php echo $data['home'] ?>" >
									</div>
									<div>
										<label for="union">স্থাপনার মুল্য</label>
										<br>
										<input disabled type="text" name="net_worth" value="<?php echo $data['net_worth'] ?>" >
									</div>
									<div>
										<label for="union">বার্ষিক কর</label>
										<br>
										<input disabled type="text" name="annual_tax" value="<?php echo $data['annual_tax'] ?>" >
									</div>
									<div>
										<label for="union">নগদ কর</label>
										<br>
										<input disabled type="text" name="ablable_tax" value="<?php echo $data['ablable_tax'] ?>" >
									</div>
									<div>
										<label for="union">বকেয়া কর</label>
										<br>
										<input disabled type="text" name="due_tax" value="<?php echo $data['due_tax'] ?>" >
									</div>
									<div>
										<label for="union">অর্থ বছর</label>
										<br>
										<input disabled type="text" name="present_year" value="<?php echo $data['present_year'] ?>" >
									</div>
									<div>
										<label for="union">মোবাইল নং</label>
										<br>
										<input disabled type="text" name="mobile_no" value="<?php echo $data['mobile_no'] ?>" >
									</div>
									<div>
										<label for="union">স্টাটাস</label>
										<br>
										<input disabled type="text" name="status" value="<?php echo $data['status'] ?>" >
									</div>
									<div>
										<label for="union">ছবি</label>
										<br>
										<img style="width: 200px;height:200px;margin:auto" src="upload/<?php echo $data['file_name']?>" alt="image">
									</div>									
								</form>
								<?php }else{ ?>
								<form action="" method="POST">
									<div style="display: flex;justify-content:space-between">
										<div><h3>আপনার কর যাচাই করুন</h3></div>
										<div>
										<label for="present_year">অর্থবছর</label>
										<select name="present_year">
											<?php
											$present_years = mysqli_query($conn,"SELECT * FROM person GROUP BY present_year ORDER BY present_year DESC");
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
										<label for="guardian_name">করদাতার পিতা/স্বামী</label>
										<br>
										<input  name="guardian_name" type="text" >
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
									<input  name="submit" type="submit" value="Submit">
									</div>									
								</form>
								<?php }?>
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
        return opt_func("","union_name","upazila_id",upazila,".union");
        })

      $(".union").on("change",function(){
        var upazila = $(this).val();
        return opt_func("","ward","union_id",upazila,".ward");
        })
</script>

<?php include("common/home-footer.php")?>


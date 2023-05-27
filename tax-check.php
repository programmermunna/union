<?php include("common/home-header.php");?>
        <main>
            <section class="hero" style="padding:30px 0">
                <div class="container">
                    <div class="hero-inners">
						<div class="card2">
							<div class="from">
								<?php
								if(isset($_POST['submit'])){ 
									$exect_id = $_POST['exect_id'];
									
									if(isset($_POST['union'])){
										$union = $_POST['union'];
									}
									if(isset($_POST['village'])){
										$village = $_POST['village'];
									}
									if(isset($_POST['section'])){
										$section = $_POST['section'];
									}
									if(isset($_POST['guardian_name'])){
										$guardian_name = $_POST['guardian_name'];
									}
									if(isset($_POST['tax_holder_name'])){
										$tax_holder_name = $_POST['tax_holder_name'];
									}

									if(!empty($exect_id)){
										if(is_numeric($exect_id)){
											$sql = "SELECT * FROM person WHERE (id_no = $exect_id OR holding_no = $exect_id OR nid_no = $exect_id OR mobile_no = $exect_id)";
											$data = mysqli_fetch_assoc(mysqli_query($conn,$sql));
											if($data>0){
												$vlg_id = $data['village'];
												$section_id = $data['section'];
												$village = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM village WHERE id=$vlg_id"));
												$section = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM section WHERE id=$section_id"));
											}else{
												echo "<h1 style='text-align:center'>No Data Found</h1>";
												echo "<br>";
												exit;
												}
										}else{
											header("location:home.php");
										}
									}elseif(!empty($union) && !empty($village) && !empty($section) && !empty($guardian_name) && !empty($tax_holder_name)){										
										$sql = "SELECT * FROM person WHERE admin_id=$union AND village=$village AND section=$section AND guardian_name='$guardian_name' AND name='$tax_holder_name'";
										$data = mysqli_fetch_assoc(mysqli_query($conn,$sql));
										if($data>0){
											$vlg_id = $data['village'];
											$section_id = $data['section'];
											$village = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM village WHERE id=$vlg_id"));
											$section = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM section WHERE id=$section_id"));
										}else{
										echo "<h1 style='text-align:center'>No Data Found</h1>";
										echo "<br>";
										exit;
										}
										
									}else{
										echo "<h1 style='text-align:center'>No Data Found</h1>";
										echo "<br>";
										exit;
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
										<label for="union">গ্রাম</label>
										<br>
										<input disabled type="text" name="village" value="<?php echo $village['name'] ?>" >
									</div>
									<div>
										<label for="union">পাড়া/মহল্লা</label>
										<br>
										<input disabled type="text" name="section" value="<?php echo $section['name'] ?>" >
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
									<div>
										<label for="union">ইউনিয়নের নাম</label>
										<select name="union" id="union">
										<option style='display:none;' selected disabled>ইউনিয়ন বাছাই করুণ</option>
											<?php
											$unions = mysqli_query($conn,"SELECT * FROM union_name");
											while($union = mysqli_fetch_assoc($unions)){ ?>
											<option value="<?php echo $union['admin_id']?>"><?php echo $union['bn_name']?></option>
											<?php }?>
										</select>
									</div>
									<div>
										<label for="village">গ্রামের নাম</label>
										<select name="village" id="village">
											<option style='display:none;' selected >গ্রাম বাছাই করুণ</option>
										</select>
									</div>
									<div>
										<label for="section">পাড়ার নাম</label>
										<select name="section" id="section">
											<option style='display:none;' selected >পাড়া/মহল্লা বাছাই করুণ</option>
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
    $(document).ready(function(){  
      $("#union").on("change",function(){
        var admin_id = $(this).val();
        $.ajax({
            url:"include/ajax.php",
            type:"GET",
            data:
            {
              reference:"village of union in home page",
              admin_id:admin_id,
            },         
            success:function(data){
              $("#village").html(data);
              }
            });
        })

    })

	$(document).ready(function(){  
      $("#village").on("change",function(){
        var vlg_id = $(this).val();
        $.ajax({
            url:"include/ajax.php",
            type:"GET",
            data:
            {
              reference:"section of village in home page",
              vlg_id:vlg_id,
            },         
            success:function(data){
              $("#section").html(data);
              }
            });
        })
    })
</script>
<?php include("common/home-footer.php")?>


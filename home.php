<?php include("common/home-header.php");?>
        <main>
            <section class="hero" style="padding:30px 0">
                <div class="container">
                    <div class="hero-inners">
						<div class="card">
							<div class="from">
								<?php
								if(isset($_POST['submit'])){ 
									if(isset($_POST['submit'])){
									$exect_id = $_POST['exect_id'];

									$union = $_POST['union'];
									$village = $_POST['village'];
									$section = $_POST['section'];
									$guardian_name = $_POST['guardian_name'];
									$tax_holder_name = $_POST['tax_holder_name'];
								
									if(!empty($exect_id)){		
										$sql = "SELECT * FROM person WHERE (id_no = $exect_id OR holding_no = $exect_id OR nid_no = $exect_id OR mobile_no = $exect_id)";
										$query = mysqli_query($conn,$sql);
									}elseif(!empty($union) && !empty($village) && !empty($section) && !empty($guardian_name) && !empty($tax_holder_name)){
										$sql = "SELECT * FROM person WHERE (id_no = $exect_id OR holding_no = $exect_id OR nid_no = $exect_id OR mobile_no = $exect_id)";
										$query = mysqli_query($conn,$sql);
									}else{
										echo "<h1>No Data Found</h1>";
									}
									
									}
								?>
								<form action="">									
									<div>
										<label for="union">করদাতার পিতা/স্বামী</label>
										<br>
										<input type="text" >
									</div>
									<div>
										<label for="union">করদাতার নাম</label>
										<br>
										<input type="text" >
									</div>
									<div>
										<label for="union">করদাতার নাম</label>
										<br>
										<input type="text" >
									</div>
									<div>
										<label for="union">করদাতার নাম</label>
										<br>
										<input type="text" >
									</div>
									<div>
										<label for="union">করদাতার নাম</label>
										<br>
										<input type="text" >
									</div>
									<div>
										<label for="union">করদাতার নাম</label>
										<br>
										<input type="text" >
									</div>
									<div>
										<label for="union">করদাতার নাম</label>
										<br>
										<input type="text" >
									</div>
									<div>
										<label for="union">করদাতার নাম</label>
										<br>
										<input type="text" >
									</div>
									<div>
										<label for="union">করদাতার নাম</label>
										<br>
										<img style="width: 200px;height:200px;margin:auto" src="https://munnahasan4.netlify.app/img/code-art.jpg" alt="">
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
											<option value="<?php echo $union['admin_id']?>"><?php echo $union['union_name']?></option>
											<?php }?>
										</select>
									</div>
									<div>
										<label for="village">গ্রামের নাম</label>
										<select name="village" id="village">
											<option style='display:none;' selected disabled>গ্রাম বাছাই করুণ</option>
										</select>
									</div>
									<div>
										<label for="section">পাড়ার নাম</label>
										<select name="section" id="section">
											<option style='display:none;' selected disabled>পাড়া/মহল্লা বাছাই করুণ</option>
										</select>
									</div>
									<div>
										<label for="guardian_name">করদাতার পিতা/স্বামী</label>
										<br>
										<input name="guardian_name" type="text" >
									</div>
									<div>
										<label for="tax_holder_name">করদাতার নাম</label>
										<br>
										<input name="tax_holder_name" type="text" >
									</div>									
									<div style="color:red;font-size:15px;font-weight:bolder">অথবা</div>
									<div>
										<label for="exect_id">আইডি নং, ভোটার আইডি কার্ড, মোবাইল নং, হোল্ডিং নং</label>
										<br>
										<input name="exect_id" type="text" >
									</div>

									<div>
									<input name="submit" type="submit" value="Submit">
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
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

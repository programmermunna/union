<?php include("common/home-header.php");?>
        <main>
            <section class="hero" style="padding:30px 0">
                <div class="container">
                    <div class="hero-inners">
						<div class="card2">
							<div class="from">
							    <?php
                                if(isset($_POST['search'])){
                                    ?>
                                    <div style="text-align: center;">									
                                        <h3>No Data Found Please Fill-up valid informations</h3>
                                        <br>									
                                        <a style="padding:5px 10px;background:#000;color:#fff" href="nagoric-corner.php">Go to Back</a>
                                        <br>										
                                        <br>										
									</div>
                                <?php }else{ ?>
                                    <div>
                                        <h3>এখানে সার্চ করুন</h3>
                                    </div>
								<form action="" method="POST">																		
									<div>
										<label for="exect_id">আইডি নং, ভোটার আইডি কার্ড, মোবাইল নং, হোল্ডিং নং</label>
										<br>
										<input required name="search" type="text">
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
              reference:"ward of union in home page",
              admin_id:admin_id,
            },         
            success:function(data){
              $("#ward").html(data);
              }
            });
        })

    })

</script>
<?php include("common/home-footer.php")?>


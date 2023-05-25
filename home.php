<?php include("common/home-header.php");?>
        <main>
            <section class="hero" style="padding:30px 0">
                <div class="container">
                    <div class="hero-inners">
						<div class="card1">
							<div class="card1_inner">
								<img src="upload/commitioner.jpg" alt="Image">
								<h2>জি এস এম জাফরউল্লাহ্‌ এনডিসি</h2>
								<p>বিভাগীয় কমিশনার (অতিরিক্ত সচিব)</p>
							</div>
							<div class="card1_inner">
								<img src="upload/commitioner3.jpg" alt="Image">
								<h2>মোঃ এনামুল হক</h2>
								<p>পরিচালক (যুগ্মসচিব), স্থানীয় সরকার, রাজশাহী বিভাগ</p>
							</div>
						</div>
						<div class="card2">
							<div class="kslider-wrapper" id="testSlider">
								<div class="kslider">
									<div class="kslider-items-container">
									<div class="kslider-item item1"><img src="upload/shohid-minar.jpg" alt=""></div>
									<div class="kslider-item item2"><img src="upload/sritishoud.jpg" alt=""></div>
									<div class="kslider-item active-item item3"><img src="upload/songshod-vavan.jpg" alt=""></div>
									</div>
								</div>
							</div>
							<div class="counter">
								<div>
									<h2>অন্তর্ভুক্ত ইউনিয়ন</h2>
									<p>১২৪</p>
								</div>
								<div>
									<h2>সর্বমোট হোল্ডিং</h2>
									<p>৮৭৪৫</p>
								</div>
								<div>
									<h2>নাগরিক সনদ</h2>
									<p>১১২৫৪</p>
								</div>
								<div>
									<h2>ট্রেড লাইসেন্স</h2>
									<p>৬০০</p>
								</div>
							</div>
						</div>
						<div class="card3">
							<div class="card3_inner">
								<div><a href="admin/"><img src="upload/super-admin.png" alt="image"></a></div>
								<div><a href="login.php"><img src="upload/up-sochib.png" alt="image"></a></div>
								<div><a href="login.php"><img src="upload/stuff.png" alt="image"></a></div>
								<div><a href="nagoric-corner.php"><img src="upload/nagorik.png" alt="image"></a></div>
							</div>
							<div class="card3_inner">
								<div><a href="tel:01762589615"><img class="item2_img" src="upload/w-number.png" alt="image"></a></div>
							</div>
							<div class="card3_inner">
								<div><a href="tax-check.php"><img class="item3_img" src="upload/tax_image.png" alt="image"></a></div>
								<div><a href="home.php"><img class="item3_img" src="upload/note.png" alt="image"></a></div>

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


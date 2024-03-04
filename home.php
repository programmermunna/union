<?php include("common/home-header.php");?>
        <main>
            <section class="hero" style="padding:30px 0">
                <div class="container">
                    <div class="hero-inners">
						<div class="card1">
							<!-- <div class="card1_inner">
								<img src="upload/commitioner.jpg" alt="Image">
								<h2>জি এস এম জাফরউল্লাহ্‌ এনডিসি</h2>
								<p>বিভাগীয় কমিশনার (অতিরিক্ত সচিব)</p>
							</div>
							<div class="card1_inner">
								<img src="upload/commitioner3.jpg" alt="Image">
								<h2>মোঃ এনামুল হক</h2>
								<p>পরিচালক (যুগ্মসচিব), স্থানীয় সরকার, রাজশাহী বিভাগ</p>
							</div> -->
							<div class="card1_inner">
								<img src="upload/metro.jpg" alt="Image">
								<h2>বাংলাদেশ মেট্রোল</h2>
								<p>ঢাকা, বাংলাদেশ</p>
							</div>
							<div class="card1_inner">
								<img src="upload/cornofuli.jpg" alt="Image">
								<h2>কর্নফুলি টানেল</h2>
								<p>পতেঙ্গায়, বাংলাদেশ</p>
							</div>
							<div class="card1_link">
								<a target="_blank" href="https://surokkha.gov.bd/"><img src="https://bangladesh.gov.bd/sites/default/files/files/bangladesh.gov.bd/graphical_result_button/d58fb64e_d478_48dd_a0f2_1058a4f6ca8d/bangladesh-portal--batton-bangla.png" alt=""></a>
								<a target="_blank" href="https://janatarsarkar.gov.bd/"><img src="http://bangladesh.gov.bd/sites/default/files/files/bangladesh.gov.bd/graphical_result_button/00ed884a_8459_48ed_9f70_c08faeae5592/Jonotar-Sorkar-banner-Bangl%20(1).jpg" alt=""></a>
								<a target="_blank" href="https://www.mygov.bd/"><img src="http://bangladesh.gov.bd/sites/default/files/files/bangladesh.gov.bd/graphical_result_button/6b8058ef_c17d_4a2d_9b26_b4779731503b/mygov_bn.jpg" alt=""></a>
								<a target="_blank" href="http://www.bangladesh.gov.bd/site/view/district_branding_book/%E0%A6%9C%E0%A7%87%E0%A6%B2%E0%A6%BE-%E0%A6%AC%E0%A7%8D%E0%A6%B0%E0%A7%8D%E0%A6%AF%E0%A6%BE%E0%A6%A8%E0%A7%8D%E0%A6%A1%E0%A6%BF%E0%A6%82%20%E0%A6%AC%E0%A7%81%E0%A6%95"><img src="http://bangladesh.gov.bd/sites/default/files/files/bangladesh.gov.bd/graphical_result_button/d2712647_cde4_4e80_afdc_a1ab27bcd2bd/Tamplate_DistrictBranding_b%20(3).png" alt=""></a>
							</div>
						</div>
						<div class="card2">
							<div class="kslider-wrapper" id="testSlider">
								<div class="kslider" >
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
								<div><a href="up/up-login.php"><img src="upload/up-sochib.png" alt="image"></a></div>
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


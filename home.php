<?php include("common/home-header.php")?>
        <main>
            <section class="hero" style="padding:30px 0">
                <div class="container">
                    <div class="hero-inner">
						<div class="hero-copy">
	                        <h1 class="hero-title mt-0"><?php echo "This is Product Title"?></h1>
	                        <p style="text-align:left;" class="hero-paragraph"><?php echo "This is Product Summery"?></p>
	                        <div class="hero-cta">
								<a style="margin-right:5px" class="button button-primary" href="order.php">Buy it now</a>
								<a style="background:#3B82F6" class="button button-primary" target="_blank" href="login.php">See Demo</a>
							</div>
						</div>
						<div class="hero-media" style="margin-top:55px">
						<img class="template_img" src="upload/contact.jpg">
						<h3 style="text-align:center">200 ৳/Year</h3>
						</div>
                    </div>
                </div>
            </section>
        </main>
<?php include("common/home-footer.php")?>
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

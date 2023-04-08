<?php include("common/home-header.php")?>
        <main>
            <section class="hero" style="padding:30px 0">
                <div class="container">
                    <div class="hero-inners">
						<div class="card">
							<div class="from">
								<form action="tax-holder.php" method="POST">
									<div>
										<label for="union">ইউনিয়নের নাম</label>
										<select name="union" id="union">
											<option value="মুকন্দগাতি">মুকন্দগাতি</option>
											<option value="মুকন্দগাতি">মুকন্দগাতি</option>
											<option value="মুকন্দগাতি">মুকন্দগাতি</option>
											<option value="মুকন্দগাতি">মুকন্দগাতি</option>
											<option value="মুকন্দগাতি">মুকন্দগাতি</option>
										</select>
									</div>
									<div>
										<label for="union">গ্রামের নাম</label>
										<select name="union" id="union">
											<option value="মুকন্দগাতি">মুকন্দগাতি</option>
											<option value="মুকন্দগাতি">মুকন্দগাতি</option>
											<option value="মুকন্দগাতি">মুকন্দগাতি</option>
											<option value="মুকন্দগাতি">মুকন্দগাতি</option>
											<option value="মুকন্দগাতি">মুকন্দগাতি</option>
										</select>
									</div>
									<div>
										<label for="union">পাড়ার নাম</label>
										<select name="union" id="union">
											<option value="মুকন্দগাতি">মুকন্দগাতি</option>
											<option value="মুকন্দগাতি">মুকন্দগাতি</option>
											<option value="মুকন্দগাতি">মুকন্দগাতি</option>
											<option value="মুকন্দগাতি">মুকন্দগাতি</option>
											<option value="মুকন্দগাতি">মুকন্দগাতি</option>
										</select>
									</div>
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
									<div style="color:red;font-size:15px;font-weight:bolder">অথবা</div>
									<div>
									<label for="union">আইডি নং, ভোটার আইডি কার্ড, মোবাইল নং, হোল্ডিং নং</label>
										<br>
										<input type="text" name="exect_id" >
									</div>

									<div>
									<input type="submit" name="submit" value="Submit">
									</div>
									
								</form>
							</div>
						</div>
                    </div>
                </div>
            </section>
        </main>
<?php include("common/home-footer.php")?>
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

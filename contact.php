<?php include("common/home-header.php")?>
<?php 

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $headers = 'From: '.$email;    
    $to = $mail['site_replay_email'];
    $send = mail($to, $subject, $message, $headers);

  if($send){
    $msg = "বার্তা প্রেরন সফল হয়েছে";
    header("location:contact.php?msg=$msg");
    }else{
    $err = "কোনো ত্রুটি হয়েছে। দয়া করে আবার চেষ্টা করুন";
    header("location:contact.php?err=$err");
    }
}

?>
        <main> 
            <section class="hero">
                <div class="container">
                    <div class="hero-inner">

						<div class="hero-copy" style="padding-top:0;">
                            <form action="" method="POST" enctype="multipart/form-data">
                            <div class="order">
                                <div class="order-itmes">
                                    <label for="email">Email</label>
                                    <input  name="email" type="text">
                                </div>
                                <div class="order-itmes">
                                    <label for="subject">Subject</label>
                                    <input  name="subject" type="text">
                                </div>
                                <div class="order-itmes">
                                    <label for="email">Message</label>
                                    <textarea name="message"></textarea>
                                </div>
                                <input name="submit" class="submit_btn" type="submit" value="Contact">
                            </div>
                            </form>
						</div>

						<div class="hero-media my_account" style="padding:0;padding-top:20px"> 
                            <div>
							    <img style="width:100%;height:unset" src="upload/contact.jpg">
                            </div>
						</div>
                    </div>
                </div>
            </section>
        </main>
<?php include("common/home-footer.php")?>
<?php if (isset($_GET['msg'])) { ?><div id="munna" data-text="<?php echo $_GET['msg']; ?>"></div><?php } ?>

<?php 
ob_start();
require('database.php');
if(!session_start()){
    session_start();
}


$time = time();

function time_elapsed_string($datetime, $full = false) {
  /**int to string time by arif */
  $datte=date("Y-m-d H:i:s",$datetime);
  $now = new DateTime;
   /**onl string time by arif */
  $ago = new DateTime($datte);
  $diff = $now->diff($ago);
  /**devided time by arif */
  $diff->w = floor($diff->d / 7);
  $diff->d -= $diff->w * 7;
  /**time array by arif */
  $string = array(
      'y' => 'y',
      'm' => 'month',
      'w' => 'w',
      'd' => 'd',
      'h' => 'h',
      'i' => 'm',
      's' => 's',
  );
   /**loop for convert string by arif */
  foreach ($string as $k => &$v) {
      if ($diff->$k) {
          $v = $diff->$k . '' . $v . ($diff->$k > 1 ? '' : '');
      } else {
          unset($string[$k]);
      }
  }
/**check string time by arif */
  if (!$full) $string = array_slice($string, 0, 1);
  return $string ? implode(', ', $string) . ' ago' : 'just now';
}


// function convertSecToTime($sec){
// 	$date1 = new DateTime("@0"); //starting seconds
// 	$date2 = new DateTime("@$sec"); // ending seconds
// 	$interval =  date_diff($date1, $date2); //the time difference
// 	return $interval->format('%y Years, %m months, %d days, %h hours, %i minutes and %s seconds'); // convert into Years, Months, Days, Hours, Minutes and Seconds
// }
//OUTPUT: 7 Years, 9 months, 21 days, 19 hours, 14 minutes and 38 seconds



 // ----------exipire Date count----------
 function remainder($data){                      
 $startTime = $data;
 $endTime = time();
 $timeDiff = abs($startTime-$endTime);
 $numberDays = $timeDiff/86400;
 $numberDays = intval($numberDays);

 switch ($numberDays) {
     case 365*1>$numberDays:
       echo $numberDays." Days";
       break;
     case 365*2>$numberDays:
       echo "1 Years and more";
       break;
     case 365*3>$numberDays:
       echo "2 Years and more";
       break;
       break;
     case 365*4>$numberDays:
       echo "3 Years and more";
       break;
       break;
     case 365*5>$numberDays:
       echo "4 Years and more";
       break;
       break;
     case 365*100>$numberDays:
       echo "99 Years and more";
       break;
     default:
       echo "None";
   }
 }



// <!-- ===================php mailer=========== -->
 function sendVarifyCode($smtp_host, $smtp_username, $smtp_password, $smtp_port, $smtp_secure, $site_email, $sitename, $addres, $body, $subject)
    {

        require 'PHPMailer/PHPMailerAutoload.php';
        $mail = new PHPMailer;
        // $mail->SMTPDebug = 4;                             // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = $smtp_host;  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = $smtp_username;                 // SMTP username
        $mail->Password = $smtp_password;                           // SMTP password
        $mail->Port = $smtp_port;                                    // TCP port to connect to
        $mail->SMTPSecure = $smtp_secure;                            // Enable TLS encryption, `ssl` also accepted

        $mail->setFrom($site_email, $sitename);
        $mail->addAddress($addres);     // Add a recipient
        $mail->addReplyTo($site_email, 'Noreplay');

        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $subject;
        $mail->Body    = $body;

        if (!$mail->send()) {
            echo 'Code could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        }
    }

// <!-- ===================php mailer=========== -->
    



$website = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM website_setting WHERE id=1"));
$mail = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM mail_setting WHERE id=1"));






























  ?>

<script>
    // ---------popup Notification---------

    window.addEventListener("DOMContentLoaded", () => {
  const popup_msg = document.getElementById("popup_msg");
  if (popup_msg) {
    popup_msg.innerHTML = `
  <div id="popup_msg" style="position: fixed; top: 100px; right: 20px; z-index:999; background:#31B0D5; color:white; display:flex; padding:12px; align-items:center; gap:6px; border-radius: 5px; line-height: 0px; ">
  <span style="font-size:18px;">
  </span>
  <h6 style="color:white;">
  ${popup_msg?.dataset?.text} </div>
  </h6> `;
    setTimeout(() => {
      popup_msg.innerHTML = "";
    }, popup_msg?.dataset?.time || 2000);
  }

  const error_msg = document.getElementById("error_msg");
  if (error_msg) {
    error_msg.innerHTML = `
    <div id="error_msg" style="position: fixed; top: 100px; right: 20px; z-index:999; background:red; color:white; display:flex; padding:12px; align-items:center; gap:6px; border-radius: 5px; line-height: 0px; ">
    <span style="font-size:18px;">
    <i class="fa-solid fa-triangle-exclamation"></i>
    </span>
    <h6 style="color:white;">
    ${error_msg?.dataset?.text} </div>
    </h6> `;
    setTimeout(() => {
      error_msg.innerHTML = "";
    }, error_msg?.dataset?.time || 2000);
  }
});
    </script>


<?php if (isset($_GET['msg'])) {?><div id="popup_msg" data-text="<?php echo $_GET['msg']; ?>"></div><?php }?>
<?php if (isset($_GET['err'])) {?><div id="error_msg" data-text="<?php echo $_GET['err']; ?>"></div><?php }?>
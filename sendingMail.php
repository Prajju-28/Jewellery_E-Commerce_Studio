<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';
$status=0;
function send_mail($recipient,$subject,$message)
{
  $mail = new PHPMailer();
  $mail->IsSMTP();

  $mail->SMTPDebug  = 0;  
  $mail->SMTPAuth   = TRUE;
  $mail->SMTPSecure = "ssl";
  $mail->Port       = 465;
  $mail->Host       = "smtp.gmail.com";
  //$mail->Host       = "smtp.mail.yahoo.com";
  $mail->Username   = "jewelwork24@gmail.com";
  $mail->Password   = "iphzfwrfbcxafzf";

  $mail->IsHTML(true);
  $mail->AddAddress($recipient, "Sendmail");
  $mail->SetFrom("jewelwork24@gmail.com", "Mail");
  //$mail->AddReplyTo("reply-to-email", "reply-to-name");
  //$mail->AddCC("cc-recipient-email", "cc-recipient-name");
  $mail->Subject = $subject;
  $content = $message;

  $mail->MsgHTML($content); 
  if(!$mail->Send())  	
  {
		
		$status=1;
  }
  else
  {
	 
	  $status=0;
  }
}
?>
<?php
require('phpmailer/class.phpmailer.php');

$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 0;
$mail->SMTPAuth = TRUE;
$mail->SMTPSecure = "ssl";
$mail->Port     = 465;
$mail->Username = "nimuel@feemo.xsrv.jp";
$mail->Password = "fgsp2019";
$mail->Host     = "sv7066.xserver.jp";
$mail->Mailer   = "smtp";
$mail->SetFrom("nimuel.eiman.nebreja@fgsp.ph", "FGSP");
$mail->AddReplyTo("nimuel.eiman.nebreja@fgsp.ph", "FGSP");
$mail->AddAddress($_POST["userEmail"]);
$mail->Subject = $_POST["subject"];
$mail->WordWrap   = 80;
$mail->MsgHTML($_POST["content"]);

foreach ($_FILES["attachment"]["name"] as $k => $v) {
    $mail->AddAttachment( $_FILES["attachment"]["tmp_name"][$k], $_FILES["attachment"]["name"][$k] );
}

$mail->IsHTML(true);

if(!$mail->Send()) {
	echo "<p class='error'>Problem in Sending Mail.</p>";
} else {
	echo "<p class='success'>Mail Sent Successfully.</p>";
}	
?>
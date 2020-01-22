<?php
if (isset($_POST['mail_btn'])) {
$file = "Resume.docx";
$to = $_POST['receiver_name'];                        
$from = "nimuel24@gmail.com";
$subject = "FGSP UPCOMING EVENT";
$message =  "<h1>$from. </h1>";
$message =  "<h3>$to. </h3>";
$message =  "<p>$file. </p>";
$headers = "From: $from\n";
$headers .= "MIME-Version: 1.0\n";
$headers .= "Content-type: text/html; charset=iso-8859-1\n";
$headers .= "X-Priority: 1 (Highest)\n";
$headers .= "X-MSMail-Priority: High\n";
$headers .= "Importance: High\n";
$mail_result = mail($to, $subject, $message, $headers);

echo "<script>alert('You successfully added one Event!')</script>";
echo "<script>window.open('expenses-mail.php','_self')</script>";
}?>
<?php
use PHPMailer\PHPMailer\PHPMailer;

require 'vendor/autoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.hostinger.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'test@hostinger-tutorials.com';
$mail->Password = 'SUA SENHA AQUI';
$mail->setFrom('test@hostinger-tutorials.com', 'Your Name');
$mail->addReplyTo('test@hostinger-tutorials.com', 'Your Name');
$mail->addAddress('exemplo@email.com', 'Receiver Name');
$mail->Subject = 'Testing PHPMailer';
$mail->msgHTML(file_get_contents('message.html'), _DIR_);
$mail->Body = 'This is a plain text message body';
//$mail->addAttachment('test.txt');
if (!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'The email message was sent.';
}

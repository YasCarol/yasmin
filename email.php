<?php

use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.office365.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'carolineyasmin815@gmail.com';
$mail->Password = 'yasmin123456';
$mail->setFrom('carolineyasmin815@gmail.com', 'yas');
//$mail->addReplyTo('test@hostinger-tutorials.com', 'Your Name');
$mail->addAddress('yasminazapfy@gmail.com', 'Receiver Name');
$mail->Subject = 'Teste';
//$mail->msgHTML(file_get_contents('message.html'), __DIR__);
$mail->Body = 'TESTE';
$mail->addAttachment('../pdf/exercicios.pdf');
if (!$mail->send()) {
    echo 'EMAIL NÂO ENVIADO' . $mail->ErrorInfo;
} else {
    echo 'EMAIL ENVIADO';
}
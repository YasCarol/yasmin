
<?php

use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';

$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 2;
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'carolineyasmin815@gmail.com';
$mail->Password = 'yasmin123456';
$mail->setFrom('yasmin@azapfy.com', 'yas');
//$mail->addReplyTo('kleberroro23@gmail.com', 'kleber');
$mail->addAddress('Kleberroro23@gmail.com', 'Elmo');
$mail->Subject = 'Bom diaa Elmixxx';
//$mail->msgHTML(file_get_contents('message.html'), _DIR_);
$mail->Body = " Ontem eu dormi em.. mas hoje foiii";
$mail->addAttachment('../pdf/exercicios.pdf');
if (!$mail->send()) {
    echo 'Sucesso' . $mail->ErrorInfo;
} else {
    echo 'Falha';
}

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$config = require 'config.php';

function sendEmail($to, $subject, $body) {
    $mail = new PHPMailer(true);
    try {
         $mail->isSMTP();
         $mail->Host = $config['email']['host'];
         $mail->SMTPAuth = true;
         $mail->Username = $config['email']['username'];
         $mail->Password = $config['email']['password'];
         $mail->SMTPSecure = PHPMailer: : ENCRYPTION_STARTTLS;
         $mail->Port = $config['email']['port'];

         $mail->setFrom['email']['username'], 'Smith Carson');
         $mail->addAddress($to);

         $mail->isHTML(true);
         $mail->Subject = $subject;
         $mail->Body    = $body;

         $mail->send();
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
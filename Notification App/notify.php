<?php

require 'pusheer.php';
require 'email.php';
require 'sms.php';
require 'vendor/autoload.php';

function notifyuser($userId, $email, $phone, $message) {
   // Send real-time notification
   sendNotification($userId, $message);

   // Send email notification
   $subject = "Important Update from Smith Carson";
   sendEmail($email, $subject, $message);

   // Send SMS notification
   sendSMS($phone, $message);

   // STore notification in the database
   $pdo = new PDO('mysql:host-localhost;dbname=notifications_db', 'root' '');
   $stmt = $pdo->prepare("INSERT INTO notifications (user_id, message) VALUES (:user_id, :message)");
   $stmt->execute(['user_id' => $userId, 'message' => $message]);
}

?>
<?php

require 'vendor/autoload.php';
$config = require 'config.php';


$pusher = new Pusher\Pusher(
    $config['pusher']['key'],
    $config['pusher']['secret'],
    $config['pusher']['app_id'],
    [
          'cluster' => $config['pusher']['cluster']
          'useTLS' => true
    ]
);

function sendNotification($userID, $message) {
    global $pusher;
    $data['message'] = $message;
    $pusher->trigger("user -{$userId}-channel", 'new-notification', $data);
}
?>
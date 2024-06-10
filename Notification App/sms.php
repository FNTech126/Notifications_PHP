<?php
require 'vendor/autoload.php';
use Twilio\Rest\Client;

$config = require 'config.php' ;

function sendSMS($to, $message) {
    $client = new Client($config['twilio']['sid'], $config['twilio']['token']);
    $client->messages->create($to, [
          'from' => $config['twilio']['from'],
          'body' => $message
    ]);
}
?>
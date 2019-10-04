<?php

/**
 * Pontus Slackbot
 *
 * Details: This file is part of the pontus slackbot file
 * Author: titaro
 *
 */

// Create the slack classs
// Please don't edit this file if you don't know OOP
class SlackMessaging
{
 // Create the token
 public $token = "";

 // Create the channel
 public $channel = "#pontus";

 // Create the text
 public $text = "Hello, my name is pontus!";

// Create the method to send the slack messages
public function message($message, $channel)
{
 if(empty($message) && !isset($message))
 {
  $message = $this->text;
 }

 if(empty($channel) && !isset($channel))
 {
  $channel = $this->channel;
 }

 $ch = curl_init("https://slack.com/api/chat.postMessage");
 $data = http_build_query([
   "token" => $this->token,
   "channel" => $channel,
   "text" => $message,
   "username" => "pontus",
 ]);

 curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
 curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 $result = curl_exec($ch);
 curl_close($ch);

 return $result;
}
}

// Class created by titaro
// Don't touch if you are clueless about Object Oriented PHP

?>
<?php

/**
 * Pontus Slackbot
 *
 * Details: This file is part of the pontus slackbot file
 * Author: titaro
 *
 */

// Include the main file
require_once "./assets/sys/Main.php";

// Now lets give this page some intellect
if(isset($_POST["rsubmit"]))
{
 $text = $_POST["message"];

 // Now lets process the information we have
 if(isset($_POST["channel"]))
 {
  $channel = $_POST["channel"];
  $channel = "#".$channel;
  $slack->message($text, $channel);
  header("location: remote.php?rem=yes");
 }

 if(isset($_POST["channel-list"]))
 {
  $channel_list = $_POST["channel-list"];
  $channel_list = "#".$channel_list;
  $slack->message($text, $channel_list);
  header("location: remote.php?rem=yes");
 }

 if(isset($_POST["multi-channel"]))
 {
  $multi_channel = $_POST["multi-channel"];

  // This is where things become tricky
  // Filter the input for ","
  $cr = str_replace(",", "", $multi_channel);

  // Filter again for " "
  $cs = str_replace(" ", "", $cr);

  // Turn filter result to array
  $f_array = explode("#", $cs);

  // Remove the empty value from the top of the array
  array_shift($f_array);

  // Lets not forget to count the array
  $count = count($f_array);

  // Now lets begin the fun part, i don't even know why i like commenting.
  for($c = 0; $c < $count; $c++)
  {
   $chan = "#".$f_array[$c];
   $slack->message($text, $chan);
  }

  header("location: remote.php?rem=yes");
 }
}

?>
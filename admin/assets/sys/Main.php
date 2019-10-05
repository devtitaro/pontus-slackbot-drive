<?php

/**
 * Pontus Slackbot
 * 
 * Details: This file is part of the pontus slackbot file
 * Author: titaro
 *
 */

// Attempt to get it automatically
if(!defined('PON_DIR'))
{
 define('PON_DIR', dirname(dirname(dirname(dirname(__FILE__))))."/");
}

if($session_activate == true)
{
 // Check to see if session is on
 if(!isset($_SESSION))
 {
  session_start();
 }

 // Check the important sessions
 if(isset($_SESSION['aid']) && isset($_SESSION['email']) && isset($_SESSION['username']))
 {
  $aid = $_SESSION['aid'];
  $email = $_SESSION['email'];
  $username = $_SESSION['username'];
 }
  else
 {
  if(file_exists("./register.php") && file_exists("./reg.php"))
  {
   header("location: register.php");
  }
   else
  {
   header("location: login.php");
  }
 }
}

// Load the config file
require_once PON_DIR."config.php";

// Load the database file
require_once PON_DIR."sys/database/MySqli.php";

// Database connection
$db = new MySqliServer($host, $user, $password, $dbname);

// Load the slack remote messaging class
require_once PON_DIR."admin/assets/sys/classes/SlackClass.php";

// Instantiate the class
$slack = new SlackMessaging;

?>
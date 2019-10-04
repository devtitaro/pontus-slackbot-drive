<?php

/**
 * Pontus Slackbot
 * 
 * Details: This file is part of the pontus slackbot file
 * Author: titaro
 *
 */

// Lets include some important files here
require_once 'sys/Main.php';

if(isset($_POST["submit"]))
{
 $sub = $_POST["submit"];
}
 else
{
 @header("location: register.php");
}

// Just to make extra sure user has submitted form
if(isset($_POST) && isset($sub))
{
 // Create empty variables
 $name = $email = $password = '';

 // Collect input data and sanitize it
 $username = htmlspecialchars(trim(stripslashes($_POST["username"])));
 $email = htmlspecialchars(trim(stripslashes($_POST["email"])));
 $password = MD5($_POST['password']);

 // Create database tables
 $db->query("CREATE TABLE IF NOT EXISTS `".PON_PREFIX."user` (
    `uid` int(11) NOT NULL AUTO_INCREMENT,
    `email` varchar(255) NOT NULL,
    `username` varchar(255) NOT NULL,
    `password` varchar(100) NOT NULL,
    PRIMARY KEY (`uid`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");

 // Another quick check
 if(isset($username) && strlen($username) > 5 && isset($email) && isset($password))
 {
  if($db->count("SELECT * FROM ".PON_PREFIX."user WHERE username = '$username'") > 0 )
   {
    header("Location: register.php?reg=u-taken");
   }

  elseif($db->count("SELECT * FROM ".PON_PREFIX."user WHERE email = '$email'") > 0)
   {
    header("Location: register.php?reg=e-taken");
   }

  else
   {
    // Insert data into tables.
    $db->query("INSERT INTO `".PON_PREFIX."user` (`email`, `username`, `password`) VALUES
('".$email."', '".$username."', '".$password."');");

    // Redirect users to login page
    header("location: login.php?log=yes");
   }
 }
  else
 {
  header("location: register.php");
 }
}

// Thats all regarding registration

?>
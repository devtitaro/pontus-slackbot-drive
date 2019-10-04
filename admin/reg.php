<?php

/**
 * Pontus Slackbot
 * 
 * Details: This file is part of the pontus slackbot file
 * Author: titaro
 *
 */

// Lets include some important files here
require_once './assets/sys/Main.php';

if(isset($_POST["submit"]))
{
 $sub = $_POST["submit"];
}
 else
{
 @header("location: register.php");
}

// Just to make extra admin user has submitted form
if(isset($_POST) && isset($sub))
{
 // Create empty variables
 $name = $email = $password = '';

 // Collect input data and sanitize it
 $username = htmlspecialchars(trim(stripslashes($_POST["username"])));
 $email = htmlspecialchars(trim(stripslashes($_POST["email"])));
 $password = MD5($_POST['password']);

 // Create admin user database tables
 $db->query("CREATE TABLE IF NOT EXISTS `".PON_PREFIX."admin` (
    `aid` int(11) NOT NULL AUTO_INCREMENT,
    `email` varchar(255) NOT NULL,
    `username` varchar(255) NOT NULL,
    `password` varchar(100) NOT NULL,
    PRIMARY KEY (`aid`)
  ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;");

 // Another quick check
 if(isset($username) && strlen($username) >= 5 && isset($email) && isset($password))
 {
  // Insert data into table no time wasting
  $db->query("INSERT INTO `".PON_PREFIX."admin` (`email`, `username`, `password`) VALUES
('".$email."', '".$username."', '".$password."');");

  // Redirect users to login page
  header("location: login.php?log=yes");
 }
}

// Thats all for admin registration

?>
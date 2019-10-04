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
 @header("location: login.php");
}

// Just to make extra sure user has submitted form
if(isset($_POST) && isset($sub))
{
 // Create empty variables
 $name = $email = $password = '';

 // Collect input data and sanitize it
 $username = htmlspecialchars(trim(stripslashes($_POST["username"])));
 $password = MD5($_POST['password']);

 // Run  a query
 $query = $db->query("SELECT * FROM ".PON_PREFIX."user WHERE username = '$username' AND password = '$password'");
 if($db->count("SELECT * FROM ".PON_PREFIX."user WHERE username = '$username' AND password = '$password'") > 0)
 {
  while($row = $db->fetch_array($query))
  {
   $uid = $row["uid"];
   $email = $row["email"];
   $username = $row["username"];

   // Start session
   session_start();
   $_SESSION['uid'] = $uid;
   $_SESSION['email'] = $email;
   $_SESSION['username'] = $username;
  }
  
  // Redirect users to the dashboard
  header("location: dashboard.php");
 }
  else
 {
  header("location: login.php?log=no");
 }

}

// Thats all regarding login

?>
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
 @header("location: login.php");
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

 // Run  a query
 $query = $db->query("SELECT * FROM ".PON_PREFIX."admin WHERE username = '$username' AND password = '$password'");
 if($db->count("SELECT * FROM ".PON_PREFIX."admin WHERE username = '$username' AND password = '$password'") > 0)
 {
  while($row = $db->fetch_array($query))
  {
   $aid = $row["aid"];
   $email = $row["email"];
   $username = $row["username"];

   // Start session
   session_start();
   $_SESSION['aid'] = $aid;
   $_SESSION['email'] = $email;
   $_SESSION['username'] = $username;
  }
  
  // Redirect users to the index
  header("location: index.php");

  // Delete the registration pages if user has logged in we don't want multiple admin accounts
  // This might change in the future but for now we delete the files
  unlink("./register.php");
  unlink("./reg.php");
 }
  else
 {
  header("location: login.php?log=no");
 }
}

// Thats all regarding admin login

?>

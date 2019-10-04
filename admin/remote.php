<?php

/**
 * Pontus Slackbot
 *
 * Details: This file is part of the pontus slackbot file
 * Author: titaro
 *
 */

// Set this to false if you don't want session on this page
// Always include this so php keeps his mouth shut
$session_activate = true;

// Include the main file
require_once "./assets/sys/Main.php";

?>

<!DOCTYPE html>
<html lang="html">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ACP - Remote Messaging</title>
<!-- Styles -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
<style type="text/css">
input[type="text"]
{
 background-color: rgba(255, 255, 255, 0.8);
 padding: 10px;
 border: none;
 border-radius: 10px;
 margin-bottom: 20px;
 box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
 display: none;
}

label
{
 display: none;
 margin-bottom: 1px;
}

.success
{
 background-color: rgba(0, 255, 0, 0.4);
 padding: 15px;
 color: #fff;
 margin: -30px -30px 20px -30px;
 text-align: center;
}

.success b
{
 float: left;
}

.success b:after
{
 clear: left;
}

textarea
{
 background-color: rgba(255, 255, 255, 0.8);
 padding: 10px;
 border: none;
 width: 80%;
 height: 200px;
 margin-bottom: 10px;
 border-radius: 10px;
 box-shadow: 0 0 5px rgba(0, 0, 0, 0.4);
}

.b-con
{
 margin-bottom: 30px;
}

.bars
{
 background-color: #008080;
 padding: 10px;
 border-radius: 5px;
 box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
 cursor: pointer;
}

.bars:hover
{
 background-color: #000;
 padding: 10px;
 border-radius: 5px;
 box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
}

select
{
 background-color: #008080;
 padding: 10px;
 border: none;
 color: #fff;
 border-radius: 5px;
 margin: 20px 0;
 box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
 display: none;
}

input[type="submit"]
{
 background-color: #000;
 padding: 15px;
 border: none;
 color: #fff;
 border-radius: 10px;
 box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);
}
</style>
</head>
<body>
<header>
<div class="logo">
<img src="assets/images/logo.png" alt="Pontus Drive" width="211" height="40">
<nav class="nav-bar">
<a href="logout.php">Logout Now!</a>
<a id="menu">Menu!</a>
</nav>
</div>
<div class="drop" id="show">
<h5><a href="remote.php">REMOTE MESSAGE</a></h5>
</div>
</header>
<div class="details">
<h5>REMOTE MESSAGING</h5>
</div>
<div class="details-2">
<?php
if(!isset($_GET["rem"]))
{
 // Do Nothing :D
}
 else
{
 $get = $_GET["rem"];
 if($get == "yes")
 {
  echo '<div class="success" align="center"><b><a href="remote.php">X</a></b></b> Your Remote Message Has Been Posted!</div>';
 }
}
?>
<div class="b-con">
<span class="bars" id="bar1">Select</span>
<span class="bars" id="bar2">Custom</span>
<span class="bars" id="bar3">Multiple</span>
</div>
<form action="./rem.php" method="POST">
<label id="c-label"><em>Enter Your Custom Channel Name!</em></label>
<input type="text" value="" name="channel" size="30" id="cus" placeholder="E.g #name">
<label id="m-label"><em>Post Same Message In Multiple Channels!</em></label>
<input type="text" value="" name="multi-channel" size="30" id="mul" placeholder="E.g #general, #pontus, #random">
<select name="channel-list" id="s-bar">
<option value="" selected>None</option>
<option value="general">#general</option>
<option value="pontus">#pontus</option>
<option value="random">#random</option>
<option value="help">#help</option>
</select>
<textarea name="message">Enter Your Message Here!</textarea>
<br>
<input type="submit"  name="rsubmit" value="Send Message">
</form>
</div>
<footer class="footer">
<span class="fs">
&copy; TEAM PONTUS
</span>
</footer>
<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/index.js"></script>
</body>
</html>
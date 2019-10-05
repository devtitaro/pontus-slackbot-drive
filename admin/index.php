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
<title>ACP - Index</title>
<!-- Styles -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet">
<link href="assets/css/style.css" rel="stylesheet">
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
<h5>Welcome Admin To Your Control Panel</h5>
</div>
<div class="details-2">THIS IS YOUR ADMIN PANEL, ALDO MORE FEATURES AND FUNCTIONALITIES ARE STILL YET TO BE ADDED. CLICK THE MENU BUTTON ON THE HEADER TO SEE FUNCTIONALITIES THAT ARE AVAILABLE.<br><br>LONG LIVE PONTUS!!!</div>
<footer class="footer">
<span class="fs">
&copy; TEAM PONTUS
</span>
</footer>
<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/index.js"></script>
</body>
</html>
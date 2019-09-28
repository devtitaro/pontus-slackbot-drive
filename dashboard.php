<?php

/**
 * Pontus Slackbot
 * 
 * Details: This file is part of the pontus slackbot file
 * Author: @officialozioma
 * Modified By: @titaro
 *
 */

// Lets include some important files here
require_once 'sys/Main.php';

// Start sessions
session_start();

if(isset($_SESSION))
{
 $username = $_SESSION["username"];
 $email = $_SESSION["email"];
}
 else
{
 header("location: index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="assets/Dashboard.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<title>Dashboard - Slackbot Drive</title>
</head>
<body>
<div class="container first-child"></div>
<div class="container second-child"></div>
<div class="container third-child">
<div class="row">
<div class="col-lg-3">
<section class="left">
<div class="logo">
<h3 class="text-center">Slackbot Drive</h3>
</div>
<div class="user-welcome text-center mt-1">Welcome <span class="text-success"><?php echo $username; ?></span></div>
</section>
</div>
<div class="col-lg-9">
<section class="right">
<header class="d-flex">
<div class="img">
<a href="logout.php" class="btn btn-danger">Log out</a>
<img src="assets/images/disability.svg" alt="user-image" class="rounded-circle" width="50">
</div>
</header>
<hr>
<div class="section-info">
<h3 class="text-grey">Your Saved Slack Messages!</h3>
<div class="wrapper mt-5 mb-5">
<?php
$q = $db->query("SELECT * FROM ".PON_PREFIX."convo WHERE user_convo = '$email' ORDER BY cid DESC");

while($row = $db->fetch_array($q))
{
 $conversation = $row['user_conversation'];
 $time = $row['convo_time'];
?>
<div class="card d-flex p-4 text-white">
<img src="assets/images/disability.svg" alt="user-image" width="50">
<?php

// Display user slack conversation
echo '<p>';
echo $conversation;
echo '<br>';
echo 'Saved: '.$time;
echo '</p>';

?>
</div>
<?php
}
?>
</div>
</div>
</section>
</div>
</div>
</div>
<br>
<br>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

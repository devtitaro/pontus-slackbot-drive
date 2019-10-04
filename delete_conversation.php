<?php
/**
* Pontus Slackbot
* 
* Details: This file is part of the pontus slackbot file
* Author: @Josef
*
*/

// Lets include some important files here
require_once 'sys/Main.php';

if($_GET['id']){
	$id = $_GET['id'];
	$sql = "DELETE FROM ".PON_PREFIX."convo WHERE cid = '$id'";
	mysqli_query($db, "$sql");
}

header("location: dashboard.php");
?>
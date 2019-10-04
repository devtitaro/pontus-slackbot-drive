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
$table = "pon_convo";
if($_GET['id']){
	$id = $_GET['id'];
	$sql = "DELETE FROM $table WHERE `cid` = '$id'";
	$db->query($sql);
	
}

header("location: dashboard.php");
?>


<?php

/**
 * Pontus Slackbot
 *
 * Details: This file is a config file for google sign in to the Pontus App
 * Author: @Bringforthjoy
 *
 */

	session_start();
	require_once "api/google_api/vendor/autoload.php";
	$gClient = new Google_Client();
	$gClient->setClientId("786201381001-m5kp1flqqh227sb216a0pkbiifb8dggr.apps.googleusercontent.com");
	$gClient->setClientSecret("OFp1EUo-N36plfTH3Ukmt_iG");
	$gClient->setApplicationName("Pontus-Slack-Bot");
	$gClient->setRedirectUri("https://pontus-slackbot.herokuapp.com/g-callback.php");
	$gClient->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");	
	$con = new mysqli('s9xpbd61ok2i7drv.cbetxkdyhwsb.us-east-1.rds.amazonaws.com', 'jse831u4uvmhykrg','ji7u73u42vplhnzb' ,'ikhgynl5yi6ppldx');
    if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
	
?>
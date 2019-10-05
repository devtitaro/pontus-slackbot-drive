<?php

/**
 * Pontus Slackbot
 *
 * Details: This file is a callback link for google signin
 * Author: @Bringforthjoy
 *
 */

	require_once "google_config.php";
	if (isset($_SESSION['access_token']))
		$gClient->setAccessToken($_SESSION['access_token']);
	else if (isset($_GET['code'])) {
		$token = $gClient->fetchAccessTokenWithAuthCode($_GET['code']);
		$_SESSION['access_token'] = $token;
	} else {
		header('Location: login.php');
		exit();
	}
	$oAuth = new Google_Service_Oauth2($gClient);
	$userData = $oAuth->userinfo_v2_me->get();
	$_SESSION['id'] = $userData['id'];
	$_SESSION['email'] = $userData['email'];
	$_SESSION['gender'] = $userData['gender'];
	$_SESSION['picture'] = $userData['picture'];
	$_SESSION['familyName'] = $userData['familyName'];
	$_SESSION['givenName'] = $userData['givenName'];
	
	$sql = "select * from pon_user where email = '".$userData['email']."' ";
	$result = mysqli_query($con, $sql);
	$sql2="insert into pon_user (email,username) values ('".$userData['email']."','".$userData['givenName']."')";
	
	// if user email doest exist in pontus db, it inserts all user's details 

	 if (mysqli_num_rows($result) == 0) {
		mysqli_query($con,$sql2);
	 }
	
	header('Location: google_dashboard.php');
	exit();
?>
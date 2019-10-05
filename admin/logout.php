<?php

/**
 * Pontus Slackbot
 * 
 * Details: This file is part of the pontus slackbot file
 * Author: titaro
 *
 */

// Destroy user login session
session_start();   
session_destroy();

// Incase sessison destroy disappoints me
unset($_SESSION["aid"]);
unset($_SESSION["email"]);
unset($_SESSION["username"]);

// Redirect to index page after logout
header("location: index.php");

?>
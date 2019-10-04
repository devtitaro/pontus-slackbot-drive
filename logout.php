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

// Redirect to index page after logout
header("location: index.html");

?>
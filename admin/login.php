<!DOCTYPE html>
<html>
<head>
<link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
<link  href="assets/css/form.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Hind:600&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
<div class="logo">
<img src="assets/images/logo.png" alt="Pontus Drive" width="211" height="40">
</div>
<form action="./log.php" method="POST">
<div class="details"><h5>ADMIN SIGN IN!</h5></div>
<div class="details-2">
<div>
<?php
if(!isset($_GET["log"]))
{
 // Do Nothing :D
}
 else
{
 $get = $_GET["log"];
 if($get == "no")
 {
  echo '<div class="error" align="center">Invalid Username Or Password!</div>';
 }

 if($get == "yes")
 {
  echo '<div class="success" align="center">Your Admin Account Was Successfully Created. Please Login Bellow!</div>';
 }
}
?>
</div>
<input id="username" name="username" type="text" placeholder="USERNAME" minLength="5" required/>
<input id="password" name="password" type="password" placeholder="PASSWORD" minLength="5" required/>
<input type="submit"  name="submit" value="Sign In">
</form>
</div>
<footer class="footer">
<span class="fs">
&copy; TEAM PONTUS
</span>
</footer>
</body>
</html>
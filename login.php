<!DOCTYPE html>
<html>
<head>
<link href="assets/bootstrap.min.css" rel="stylesheet"/>
<link  href="assets/signUp.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Hind:600&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<section class="loginBox">
<div class="">
<div class="col-lg-6 mq-none">
<div class="text-box">
<div class="abtimage">
<img src="assets/images/bg-sign.jpeg" width="100%">
</div>
</div>
</div> 
<div class="col-lg-6 col-md-8 col-sm-12">
<form class="form" action="log.php" method="POST">
<div class="form-header">
<h3 class="h-underline--blue">Sign In</h3>
</div>
<div class="form-group">
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
  echo '<div class="success" align="center">Your Account Was Successfully Created. Please Login Bellow!</div>';
 }
}
?>
</div>
</div>
<div class="form-group">
<input id="username" name="username" class="form-control" type="text" placeholder="Type your Username here" minLength="5" required/>
</div>
<div class="form-group">
<input id="password" name="password" class="form-control" type="password" placeholder="Password here" minLength="5" required/>
</div>
<div class="form-group">
<input type="submit"  class="btn btn-primary btn-block" name="submit" value="Sign In">
</div>
<hr class="styled-hr">
<div class="" align="center">
<h4 class="bottomH">Don't have An Account? <a href="register.php">Sign Up Here</a></h5>
</div>
</form>
</div>
</div>
</section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="assets/script.js" type="text/javascript"></script>
</html>
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
<div class="col-lg-6 col-md-8 col-md-12">
<form class="form" action="reg.php" method="POST">
<div class="form-header">
<h3 class="h-underline--blue">Sign Up</h3> <!-- I don't get why FE guys put this here but let me just play along -->
</div>
<div class="form-group">
<div>
<?php
if(!isset($_GET["reg"]))
{
 // Do Nothing :D
}
 else
{
 $get = $_GET["reg"];
 if($get == "u-taken")
 {
  echo '<div class="error">Username Already Exists!</div>';
 }

 if($get == "e-taken")
 {
  echo '<div class="error">Email Already Exists!</div>';
 }
}
?>
</div>
</div>
<div class="form-group">
<input id="email" name="email" class="form-control" type="text" placeholder="Type your email address here" required/>
</div>
<div class="form-group">
<input id="name" name="username" class="form-control" type="text" placeholder="Type your username here" minLength="5" required/>
</div>
<div class="form-group">
<input id="password" name="password" class="form-control" type="password" placeholder="Password here" minLength="5" required/>
</div>
<div class="form-group">
<input type="submit" name="submit" class="btn btn-primary btn-block" value="Continue">
</div>
<hr class="styled-hr">
<div class="" align="center">
<h4 class="bottomH">Already Have An Account? <a href="login.php">Sign In Here</a></h4>
</div>
</form>
</div>
</div>
</section>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="assets/script.js" type="text/javascript"></script>
</html>
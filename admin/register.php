<!DOCTYPE html>
<html>
<head>
<link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
<link  href="assets/css/form.css" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css?family=Hind:600&display=swap" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
.error
{
 background-color: rgba(255, 0, 0, 0.4);
 padding: 15px;
 color: #fff;
 margin: -30px -30px 10px -30px;
 text-align: center;
}
</style>
</head>
<body>
<header>
<div class="logo">
<img src="assets/images/logo.png" alt="Pontus Drive" width="211" height="40">
</div>
</header>
<form class="form" action="./reg.php" method="POST">
<div class="details"><h5>ADMIN SIGN UP!</h5></div>
<div class="details-2">
<div class="error">NOTE: Please Use A Username And Password You Can Remember Because You Won't Be Able To Change It!</div>
<input name="email" type="text" placeholder="EMAIL" required/>
<input name="username" type="text" placeholder="USERNAME" minLength="5" required/>
<input name="password" type="password" placeholder="PASSWORD" minLength="5" required/>
<input type="submit" name="submit" value="Continue">
</form>
</div>
<footer class="footer">
<span class="fs">
&copy; TEAM PONTUS
</span>
</footer>
</body>
</html>
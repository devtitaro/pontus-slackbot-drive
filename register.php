<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="assets/signUp.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Hind:600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/style.css" rel="stylesheet">
    <title>Pontus Drive SlackBot</title>

</head>
<body>

<header class="top-header" role="banner">
    <div class="navbar ">
        <div class="container-fluid">
            <div class="navbar-header">

                <a  class="navbar-brand">Pontus <span>Drive</span></a>
                <button type="button"  class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <h6>Menu</h6>
                </button>
            </div>


            <div class="navbar-collapse collapse offset" id="navbar">
                <ul class="nav navbar-nav justify-content-end">
                    <li class="nav-item"><a href="/" class="nav-link">Home</a> </li>
                    <li class="nav-item"><a href="login.php" class="nav-link">Login</a> </li>
                    <li class="nav-item"><a href="register.php" class="nav-link">Sign up</a> </li>
                    <li class="nav-item"><a href="about.php" class="nav-link">About us</a> </li>
                </ul>
            </div>
        </div>
</header>



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
                    <h3 class="h-underline--blue">Sign Up</h3>
                    <!-- I don't get why FE guys put this here but let me just play along -->
                </div>
                <div class="form-group">
                    <div>
                        <?php
                        if (!isset($_GET["reg"])) {
                            // Do Nothing :D
                        } else {
                            $get = $_GET["reg"];
                            if ($get == "u-taken") {
                                echo '<div class="error">Username Already Exists!</div>';
                            }

                            if ($get == "e-taken") {
                                echo '<div class="error">Email Already Exists!</div>';
                            }
                        }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <input id="email" name="email" class="form-control" type="text"
                           placeholder="Type your email address here" required/>
                </div>
                <div class="form-group">
                    <input id="name" name="username" class="form-control" type="text"
                           placeholder="Type your username here" minLength="5" required/>
                </div>
                <div class="form-group">
                    <input id="password" name="password" class="form-control" type="password"
                           placeholder="Password here" minLength="5" required/>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit"  class="btn btn-primary btn-block">Continue</button>
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
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script></html>
<script src="assets/script.js" type="text/javascript"></script>
</html>
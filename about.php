<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
 
  <title>About us</title>

  <link href="assets/bootstrap.min.css" rel="stylesheet">

 
  <link href="assets/about.css" rel="stylesheet">
  <link href="assets/style.css" rel="stylesheet">
  <link rel="stylesheet" href="assets/fontsawesome/css/all.css">
</head>

<body>
    <header class="">
        <header class="top-header" role="banner">
            <div class="navbar navbar-expand-lg">
                <div class="navbar-brand">
                    <h2>Pontus <span>Drive</span></h2>
                </div>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar">Menu</span>
                </button>
              
                <div class="navbar-collapse collapse offset" id="navbar">
                  <ul class="nav navbar-nav justify-content-end">
                      <li class="nav-item"><a href="/" class="nav-link" style="color: #337ab7;">Home</a> </li>
                      <li class="nav-item"><a href="login.php" class="nav-link" style="color: #337ab7;">Login</a> </li>
                      <li class="nav-item"><a href="register.php" class="nav-link" style="color: #337ab7;">Sign up</a> </li>
                      <li class="nav-item"><a href="about.php" class="nav-link" style="color: #337ab7;">About us</a> </li>
                  </ul>
              </div>
            </div>
        </header>
    </header>
<div class="d-flex" id="wrapper">

<!-- Sidebar -->
<div class="bg-light border-right" id="sidebar-wrapper">
  
  <div class="list-group list-group-flush">
    <a href="#" class="list-group-item list-group-item-action bg-light" onclick="hideAndshow('aboutus','mission','team','how');"><h3 >About SlackBot </h3></a>
    <a href="#" class="list-group-item list-group-item-action bg-light" onclick="hideAndshow('mission','aboutus','team','how')"><h3 > Our Mission </h3></a>
    <a href="#" class="list-group-item list-group-item-action bg-light" onclick="hideAndshow('team','mission','aboutus','how')" ><h3> Team Pontus <h3 ></a>
    <a href="#" class="list-group-item list-group-item-action bg-light" onclick="hideAndshow('how','mission','team','aboutus')" ><h3 >How to use SlackBot </h3></a>
  </div>
</div>
<!-- /#sidebar-wrapper -->

<!-- Page Content -->
<div id="page-content-wrapper">

  <nav class="navbar navbar-expand-lg navbar-light">
    <button class="mybtn" id="menu-toggle">
        <h3>
        <span class="navbar-toggler-icon" style="color:black;"></span>
        </h3>
    </button>
  </nav>
    <section class="hero">
        <div class="row m-0">
            <div class="col-lg-7">
                <div class="hero-heading1"  id="aboutus" >
                    <h2 class="">ABOUT US</h2>
                    <br>
                    <p class="font-weight-bold" style="color: #7e7e7e">
                        Slackbot is one of the task in HNG Internship program <br />
                        This is a task for stage 3. Slackbot was developed by the team Pontus.
                    </p>
                </div>
                <div class="hero-heading1"  id="mission" style="display:none;">
                    <h2 class="">OUR MISSION</h2>
                    <br>
                    <p class="font-weight-bold" style="color: #7e7e7e">
                      Team <strong> PONTUS SLACKBOT,</strong> is built to enable our users save
                      their conversation. With our Slackbot all your conversations in slack is saved.<br />
                      <p class="font-weight-bold" style="color: #7e7e7e">
                        Our aim is to create a space and give our users a place to save and backup their 
                        conversations. This space enables them to view all their conversation in one place.
                      </p>
                    </p>
                </div>
                <div class="hero-heading1"  id="team" style="display:none;">
                    <h2 class="">ABOUT TEAM PONTUS</h2>
                    <br>
                    <p class="font-weight-bold" style="color: #7e7e7e">
                      <strong> TEAM PONTUS </strong> is one of the Teams in the HNG Internship program.
                      The team is made up of 21 team members, with <a href="https://www.twitter.com/icey_ree" target="blank"> Rita Okonkwo </a> as the Team Lead.
                      The SlackBot was developed by the backend and frontend developer of Team Pontus
                    </p>
                    <br />
                    <div class="row">
                      <div class="col-md-4">
                        <div class="thumbnail responsive">
                            <img src="image1.jpg" alt="Rita" style="width:100%">
                            <div class="caption text-center my-3">
                              <label class="font-weight-bold" style="color: #7e7e7e"> 
                                Rita Okonkwo
                              </label>
                              <label>Team Lead </label>
                              <label style="color: #7e7e7e"> 
                                Android / Java developer
                              </label>
                              <div class="icons">
                              <a href="https://www.twitter.com/icey_ree" target="blank"> 
                                <i class="fab fa-twitter-square fa-2x"></i> 
                              </a>
                              <a href="mailto:ritaokonkwo6@gmail.com" target="blank"> 
                                <i class="fas fa-envelope-open-text fa-2x"></i>
                              </a>
                              </div>
                            </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="thumbnail responsive">
                            <img src="image2.jpg" alt="jubril" style="width:100%;" >
                            <div class="caption text-center my-3">
                              <label class="font-weight-bold" style="color: #7e7e7e"> 
                                Adekanye Jubril 
                              </label>
                              <label>Duputy Lead Backend</label>
                              <label style="color: #7e7e7e"> 
                                Backend developer
                              </label>
                              <div class="icons">
                              <a href="https://www.twitter.com/tyroklonejnr" target="blank"> 
                                <i class="fab fa-twitter-square fa-2x"></i> 
                              </a>
                              <a href="mailto:adekanyejubrilmartins@gmail.com" target="blank"> 
                                <i class="fas fa-envelope-open-text fa-2x"></i>
                              </a>

                              </div>
                            </div>
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="thumbnail responsive">
                            <img src="image3.jpg" alt="ozioma" style="width:100%;">
                            <div class="caption text-center my-3">
                            <label class="font-weight-bold" style="color: #7e7e7e"> 
                                  Olajide Joshus 
                              </label>
                              <label>Duputy Lead Frontend</label>
                              <label style="color: #7e7e7e"> 
                                  Frontend developer
                              </label>
                              <div class="icons">
                              <a href="https://www.twitter.com/olatojoshua" target="blank"> 
                                <i class="fab fa-twitter-square fa-2x"></i> 
                              </a>
                              <a href="mailto:olajidejoshua@gmail.com" target="blank"> 
                                <i class="fas fa-envelope-open-text fa-2x"></i>
                              </a>
                              </div>
                          </div>
                        </div>
                      </div>

                    </div>                      
                </div>
                <div class="hero-heading1"  id="how" style="display:none;">
                    <h2 class="">HOW TO USE SLACKBOT</h2>
                    <br>
                    <p class="font-weight-bold" style="color: #7e7e7e">
                        To use Pontus SlackBot is very easy, All you have to do is
                        just follow this few steps
                    </p>
                    <p class="font-weight-bold" style="color: #7e7e7e">
                        <ol class="font-weight-bold" style="color: #7e7e7e">
                            <li>
                              First, Sign up in this Slackbot website.
                              then you will have access to your dashboard, 
                              which is where you can view all ur conversations
                            </li>
                            <br />
                            <li>
                              Make sure that Pontus SlackBot is Added to your Slack workspace.
                              Pontus SlackBot need to added to your slack workspace, to enable the it 
                              save all your conversations
                            </li>
                            <br />
                            <li>
                              When Pontus SlackBot is added to your Slack workspace.
                              You can now use the bot to save your conversation by typing command <br />
                              <strong><code>@Pontus save-this </code> <em>the message you want save</em></strong> <br />
                            </li>
                            <br />
                            <li>Then You can now Login to your dashboard to view all your saved conversations</li>
                            <br />
                            <li>From Your dashboard, you can edit, or delete a conversations</li>
                            <br />
                        </ol>
                        <p class="font-weight-bold" style="color: #7e7e7e">
                           we hope you enjoy using SlackBot... 
                        </p>
                       
                    </p>
                </div>
                
            </div>
            <div class="col-lg-5">
                <div class="img-block">
                    <img src="assets/images/bg-master.png" width="100%">
                </div>
            </div>
        </div>
    </section>
  
</div>

</div>
<!-- /#wrapper -->

<!-- Bootstrap core JavaScript -->
<script src="assets/jquery.js"></script>
<script src="assets/bootstrap.min.js"></script>

<!-- Menu Toggle Script -->
<script>
$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
});

function hideAndshow(currentmenu,others1,others2,others3){
  let cu = document.getElementById(currentmenu);
  let mission = document.getElementById(others1);
  let team = document.getElementById(others2);
  let how = document.getElementById(others3);

  if(cu.style.display == "none"){
    cu.style.display = "block";
    mission.style.display = "none";
    team.style.display = "none";
    how.style.display = "none";
  }
}
</script>

</body>

</html>


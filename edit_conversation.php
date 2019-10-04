<?php

/**
 * Pontus Slackbot
 *
 * Details: This file is part of the pontus slackbot file
 * Author: @Josef
 *
 */

// Lets include some important files here
require_once 'sys/Main.php';

// Start sessions
session_start();

if (isset($_SESSION)) {
    $username = $_SESSION["username"];
    $email = $_SESSION["email"];
}

if (!isset($_SESSION["email"]) || !isset($_SESSION["username"])) {
    header("location: login.php");
}

?>
<?php
// getting the query string id from the dashboard page
$id = $_GET['id'];

// querying the database
$q = $db->query("SELECT * FROM ".PON_PREFIX."convo WHERE WHERE cid = '$id'");

// fetching row from database
while($row = $db->fetch_array($q))
{
 $conversation = $row['user_conversation'];
 $time = $row['convo_time'];
 $id = $row['cid'];
}
?>

<!DOCTYPE html>
<html lang="html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HNG: SlackBot</title>
    <link href="assets/mydshboard.css" rel="stylesheet">
     <link rel="stylesheet" href="assets/chat.css">
    <link href="assets/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,900&display=swap" rel="stylesheet">


</head>
<body>
    <header class="top-header" role="banner">
        <div class="navbar navbar-expand-lg">
            <div class="navbar-brand">
                <h2>Pontus Drive</h2>
            </div>

            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search Coversations..">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <span class="fa fa-search"></span>
                    </button>
                </span>
            </div>
        </div>

    </header>

        <div class="row">
            <div class="sidebar col-lg-2">
                <a class="active" href="#home"><?php echo ucfirst($username); ?></a>
                <a href="dashboard.php">Conversations</a>
                <a href="profile.html">Profile Settings</a>
                <a href="logout.php">Log Out</a>
            </div>

            <div class="page-content col-lg-10  d-flex justify-content-center">
                <div class="col-sm-9">
                    <div class="p-4">
                        <h4>Edit Conversations</h4>
                        <hr>
                    </div>

                    <div class="row">
                        <div class="convo-section">
                            <div class="title-heading">
                                
                                <br>
                            </div>
                            <div class="convo-text">
                                <?php
                                if(isset($_POST['msg'])){
                                    $id = $_POST['id'];
                                    $convo = $_POST['conversation'];

                                    if(!empty($convo)){
                                        $query = "UPDATE ".PON_PREFIX."convo SET user_conversation='".mysqli_real_escape_string($convo)."' WHERE cid = '$id'";

                                        $query_update = mysqli_query($db, $query);
                                        if ($query_update = TRUE) {
                                            header("location:dashboard.php");  
                                        }
                                        else{
                                            echo '<p style="color:red;">An error occurred. Try again.</p>';
                                        } 
                                    }
                                    else{
                                        echo '<p style="color:red;">Field can not be left empty.</p>';
                                    } 
                                }
                                ?>
                                <form action="edit_conversation.php" method="post">
                                <input name="id" type="hidden" value="<?php echo $id; ?>">
                                <div class="form-group">
                                    <label for="myconversation"><h5>Edit conversation</h5></label>
                                    <textarea name="conversation" class="form-control" id="myconversation" style="min-height: 200px;"><?php echo $conversation; ?></textarea>
                                </div>
                                <div class="form-group">                    
                                    <input type="submit" name="msg" class="btn btn-primary" id="submit" value="Update"/>
                                </div>
                                </form>

                            </div>
                            <hr>
                            <div class="controls" align="right">
                                <a href="dashboard.php" class="btn btn-info">Cancel</a>
                            </div>

                        </div>
                        
                    </div>



                </div>

            </div>

        </div>

<?php include 'chat.php'; ?>
<button id="show" style="">Chat</button>
</body>
</html>


<script type="text/javascript" src="assets/jquery-3.1.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function(e){
    $.ajaxSetup({cache:false});
    setInterval(function(){
        var tbl = form1.tbl.value;
        var csrf = document.getElementsByClassName("csrf_field")[0].value;
        $('#chatlogsall').load('chatlog.php?csrf_field='+csrf+'&tbl='+tbl);
            }, 2000);
});
$('#case_hole').hide();
$('#show').click(function(){
    $('#case_hole').slideToggle();
});
</script>
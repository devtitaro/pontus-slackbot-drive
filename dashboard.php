

<?php

/**
 * Pontus Slackbot
 *
 * Details: This file is part of the pontus slackbot file
 * Author: @officialozioma
 * Modified By: @titaro
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
                        <h4>Recent Conversations</h4>
                        <hr>
                    </div>

                    <div class="row">

                           <?php
                        $q = $db->query("SELECT * FROM " . PON_PREFIX . "convo WHERE user_convo = '$email' ORDER BY cid DESC");
                        if ($q->num_rows>0) {
                           
                        while ($row = $db->fetch_array($q)) {
                            $conversation = $row['user_conversation'];
                            $time = $row['convo_time'];

							 $id = $row['cid'];

                            ?>
                            
                               
                            
                        <div class="convo-section">
                            <div class="title-heading">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <h5><span class="fa fa-clock-o"> </span> <?php

                                // Display user slack conversation
                                echo '<p>';
                                echo $time;?></h5>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="spacer"></div>
                                    </div>
                                    <div class="col-lg-3 icon-pack" align="right">
                                        <i class="fa fa-star yellow"></i>
                                        <i class="fa fa-star yellow"><a href="edit_conversation.php?<?php echo 'id='.$id;?>" class="btn btn-primary">Edit Conversation</a></i>
                                        <i class="fa fa-trash"><a href="delete_conversation.php?<?php echo 'id='.$id;?>" title="delete conversation" class="btn btn-danger">Delete Conversation</a></i>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="convo-text">
                                <p><?php

                                // Display user slack conversation
                                echo '<p>';
                                echo $conversation;?></p>

                            </div>
                            <hr>
                            <div class="controls" align="right">
                                <a href="" class="btn btn-warning">Add to favourites</a>
                            </div>

                        </div>
                        <?php
                    }
                        }else{?>
                             <div class="convo-section">
                            <div class="title-heading">
                                <div class="row">
                                    <div class="col-lg-5">
                                        <h5><span class="fa fa-clock-o"> </span> Benefits of Pontus Drive </h5>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="spacer"></div>
                                    </div>
                                    <div class="col-lg-3 icon-pack" align="right">
                                        <i class="fa fa-star yellow"></i>
                                        <i class="fa fa-star yellow"></i>
                                        <i class="fa fa-trash"></i>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div class="convo-text">
                                <p>
                                    Back-up with ease<br>

Pontus slack drive, makes it super easy to store all your data with just a click. It will provide you backup of all your conversations and important data on our server in record time.<br>

Large amount of storage<br>

You don’t have to worry about loosing important data and conversations, with Pontus slackbot drive users get free useful amount of data storage.
</p>

                            </div>
                            

                        </div><?php
                        }
                        ?>
                        
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
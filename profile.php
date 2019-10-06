<?php

/**
 * Pontus Slackbot
 *
 * Details: This file is part of the pontus slackbot file
 * Author: @Syntax
 *
 */

// Lets include some important files here
require_once 'sys/Main.php';

// Start sessions
session_start();

if (isset($_SESSION)) {
    $uid = $_SESSION['uid'];
    $username = $_SESSION["username"];
    $email = $_SESSION["email"];
}

if (!isset($_SESSION["email"]) || !isset($_SESSION["username"])) {
    header("location: login.php");
}

if (isset($_POST['submit_search'])) {
    $search = $_POST['search'];

    $q_search = $db->query("SELECT * FROM " . PON_PREFIX . "convo WHERE user_convo = '$email' AND user_conversation LIKE '%$search%'  ORDER BY cid DESC");
    if ($q_search) {
               
        if ($q_search->num_rows > 0) {
           $_SESSION['search'] = true;
        }
    }
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

        <div class="row" >
            <div class="sidebar col-lg-2">
                <a class="" href="dashboard.php"  id="homeLink">My Dashboard</a>
                <a href="javascript:;" onclick="showConversation()" id="dashboardLink">Conversations</a>
                <a href="profile.php" class="active" onclick="showProfile()" id="profileLink">Profile Settings</a>
                <a href="logout.php">Log Out</a>
            </div>

            <div class="page-content col-lg-10  d-flex justify-content-center" id="page-append">
               
<div class="col-sm-9">
        <div class="p-4">
            <h4>Profile Settings</h4>
            <hr>
        </div>

        <div class="row" >
        <div class="col-lg-3 col-sm-12">
            <img src="https://via.placeholder.com/200x180" alt="" class="rounded-cirle" width="200px" height="180px">
            <form method="post">
            <div class="image-upload">
                <label for="file-input">
                <i class="fa fa-camera"></i>
                </label>

                <input id="file-input" type="file" name="photo"/>
          </div>
            <h5 class="mt-3"><?php echo ucfirst($username); ?></h5>
            
            <button class="btn btn-purple form-control" onclick="showInput()">Edit Profile</button>
        </div> 
        <div class="col-lg-9 col-md-9 col-sm-12">
        
            <div class="details">
                <div class="input-group  mb-2 ">
                    <div class="input-group-prepend rounded-circle">
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope"></i> </span>
                </div>
                    <input type="text" class="form-control h-input" value="<?php echo ucfirst($email); ?>" readonly name="email" required>
                    </div>

            <div class="input-group  mb-2 ">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-facebook"></i> </span>
        </div>
            <input type="text" class="form-control h-input" value="my facebook username" readonly name="facebook" required>
            </div>
            
            </div>
            <div class="input-group  mb-2 ">
            <div class="input-group-prepend">
            <span class="input-group-text" id="basic-addon1"><i class="fa fa-twitter"></i> </span>
        </div>
            <input type="text" class="form-control h-input" value="https://twitter.com/olatojoshua" readonly name="twitter" required>
            
            </div>
            <div class="input-group">
            <button type="submit" class="btn btn-success d-none" id="saveBtn" name="saveBtn">SAVE</button>
        </div>
            
        </div>
        </form>
            </div>
        </div>
        </div>
        </div>


            </div>

        </div>

</body>
</html>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
     
    
       const showProfile = () => {
        //    e.preventDefault();
        $.ajax({
            url: "profile.php",
            type: "GET",
            dataType: "text",
            success: function(res) {
                console.log('This page was loaded', res);
                $("#page-append").html(res);
                $("#homeLink").removeClass("active");
                $("#dashboardLink").removeClass("active");
                $("#profileLink").addClass("active");
            },
            error: function(err) {
                console.log("This page was not loaded", err);
            },
            complete: function(xhr, status) {
                console.log("The requet is complete");
            }
        })
       }

       const showConversation = () => {
        $("#homeLink").removeClass("active");
                $("#dashboardLink").addClass("active");
                $("#profileLink").removeClass("active");
        //    e.preventDefault();
        // $.ajax({
        //     url: "conversation.html",
        //     type: "GET",
        //     dataType: "text",
        //     success: function(res) {
        //         console.log('This page was loaded', res);
        //         $("#page-append").html(res);
        //         $("#homeLink").removeClass("active");
        //         $("#dashboardLink").addClass("active");
        //         $("#profileLink").removeClass("active");
        //     },
        //     error: function(err) {
        //         console.log("This page was not loaded", err);
        //     },
        //     complete: function(xhr, status) {
        //         console.log("The requet is complete");
        //     }
        // })
       }

       const showDashboard = () => {
        $("#homeLink").addClass("active");
                $("#dashboardLink").removeClass("active");
                $("#profileLink").removeClass("active");
        //    e.preventDefault();
        // $.ajax({
        //     url: "conversation.html",
        //     type: "GET",
        //     dataType: "text",
        //     success: function(res) {
        //         console.log('This page was loaded', res);
        //         $("#page-append").php(res);
        //         $("#homeLink").addClass("active");
        //         $("#dashboardLink").removeClass("active");
        //         $("#profileLink").removeClass("active");
        //     },
        //     error: function(err) {
        //         console.log("This page was not loaded", err);
        //     },
        //     complete: function(xhr, status) {
        //         console.log("The requet is complete");
        //     }
        // })
       }

       const showInput = () => {
           $("input").removeClass("h-input");
           $("input").removeAttr("readonly");
           $("button[type='submit']").removeClass("d-none");

      
       }
       
   
    
</script>

<?php
echo $id;
    if (isset($_POST['saveBtn'])) {
            $em = $_POST['email'];
            $fb = $_POST['facebook'];
            $tw = $_POST['twitter'];

                // Image upload / Update code here

                $userPassport = $_FILES['photo'];
                $imageName = $_FILES['photo']['name'];
                $imageTmpName = $_FILES['photo']['tmp_name'];
                $imageError = $_FILES['photo']['error'];
                $imageSize = $_FILES['photo']['size'];
                $imageType = $_FILES['photo']['type'];
                $imageExt = explode('.', $imageName);
                $imageActualExt = strtolower(end($imageExt));
                $allowedExt = array("jpg","jpeg","png");
		if (in_array($imageActualExt, $allowedExt)) {
			if ($imageError === 0) {
				if ($imageSize <= 150000) {
					$imageNewName = $username . "  " .$imageActualExt;
					$imageDestination = 'uploadImages/'. $imageNewName;
					move_uploaded_file($imageTmpName, $imageDestination);
                    $updateImage = $db->query("UPDATE user SET photo = '$imageDestination' WHERE id ='$uid'");
                    $imageSelect = $db->query("SELECT photo FROM user WHERE id = '$uid'");
                    // Getting the image Row from database
                    $imageRow = $db->fetch_array($imageSelect); // This will later be echoed at top

                    // Updating the user details
                    $updateUserDetail = $db->query("UPDATE user SET email = '$em', facebook = '$fb', twitter = '$tw' WHERE id ='$uid'");

                    if($updateUserDetail) {
                        echo "<script> You have successfully Updated your details :) </script>";
                    }


    }
    }
}
    }


?>

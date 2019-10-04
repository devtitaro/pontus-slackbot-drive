<?php

/**
 * Pontus Slackbot
 *
 * Details: This file is part of the pontus slackbot file
 * Author: Ugbogu Justice
 * 
 */
 
// Lets include some important files here

$dbname = "ikhgynl5yi6ppldx";
$user = "jse831u4uvmhykrg";
$host = "s9xpbd61ok2i7drv.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
$password = "ji7u73u42vplhnzb";

// $dbname = "swift_team";
// $user = "root";
// $host = "localhost";
// $password = "";

$db = mysqli_connect("$host", "$user", "$password", "$dbname");

class error_report 
{
    public $error;
    public $error1;

    function __construct($error,$error1,$error2)
    {
        $this->error=$error;
        $this->error1=$error1;
        $this->error2=$error2;
    }
    function error(){
        ini_set('display_errors', $this->error1);
        ini_set('display_startup_errors', $this->error2);
        error_reporting($this->error);
    }
}

//setting up error[error_reporting,display_errors,display_startup_errors]
// $error_reporting = new error_report(E_ALL,1,1);
$error_reporting = new error_report(0,0,0);
$error_reporting->error();

?>



<div class="chatlog" id="">
        <div class="w" style="width: 95%;height: 500px;border:0px solid #005784;margin: auto;">
          <ul class="uol">
<?php

$details = trim($_REQUEST['tbl']);
$split = explode("/", $details);
$tbl = trim($split[0]);
$username = trim($split[1]);
$email = trim($split[2]);

$user_photo="assets/images/disability.svg";
$checkt = $db->query("SELECT * FROM $tbl ORDER BY id DESC");
if ($checkt) {
  while( $row_chat = $checkt->fetch_assoc()){
    $me = $row_chat['human'];
    $bot = $row_chat['bot'];
    $time = $row_chat['date'];
?>
    <li class="chat-time-him"><?php echo $time; ?></li>
    <?php
    if ($me !== "none") { ?>
      <li class="me"><?php echo $me;?></li>
    <?php } ?>
      <?php
    if ($bot !== "none") { ?>
    <li class="him"><?php echo $bot; ?></li>
    <li class="chat-photo"><img src="<?php echo $user_photo; ?>" style="width: 20px;height: 20px;border-radius: 50%;"></li>
	  <?php } ?>
	<?php } }?>
          </ul>
        </div>
</div>

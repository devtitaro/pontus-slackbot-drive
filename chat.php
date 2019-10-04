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




function crypto_rand_secure($min, $max){
  $range = $max - $min;
  if($range < 1) return $min;
  $log = ceil(log($range, 2));
  $bytes = (int)($log / 8) + 1;
  $bits = (int)$log + 1;
  $filter = (int) (1 << $bits) - 1;
  do {
      $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
      $rnd = $rnd & $filter;
  }while($rnd > $range);
  return $min + $rnd;
}
function getToken($lengh){
  $token = "";
  $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $codeAlphabet .= "abcdefghijklmnopqrstuvwxyz";
  $codeAlphabet .= "0123456789";
  $max = strlen($codeAlphabet);
  for($i=0; $i < $lengh; $i++){
      $token .= $codeAlphabet[crypto_rand_secure(0, $max-1)];
  }
  return $token;
}

$csrf_token = getToken(120);
$_SESSION['csrf_token'] = $csrf_token;
$different_table = str_replace("@", "", $_SESSION["email"]);

$tbl_chat = PON_PREFIX."chat_".str_replace(".", "", $different_table);
$tbl_conversations = PON_PREFIX."convo";

$email=$_SESSION["email"];
$date = date("Y:m:d");
$user_photo="assets/images/disability.svg";

$chat_tbl_structure = "CREATE TABLE IF NOT EXISTS `$tbl_chat` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `bot` varchar(255) NOT NULL,
    `human` varchar(255) NOT NULL,
    `date` varchar(255) NOT NULL,
    `status` varchar(255) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1";
$db->query($chat_tbl_structure);


$tbl_conversations = PON_PREFIX."convo";//conversations_table_name_here
$tbl_conversations_id_name = "cid";//conversations_table id column name here
$tbl_conversations_email_column_name = "user_convo";//conversations_table email column name here
$tbl_conversations_conversation_column_name = "user_conversation";//conversations_table conversation column name here
$tbl_conversations_timestamp_column_name = "convo_time";

$theTableStructure = "CREATE TABLE IF NOT EXISTS `$tbl_conversations` (
                `$tbl_conversations_id_name` int(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY  NOT NULL,
                `$tbl_conversations_email_column_name` varchar(225) NOT NULL,
                `$tbl_conversations_conversation_column_name` varchar(225) NOT NULL,
                `$tbl_conversations_timestamp_column_name` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
              ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
$db->query($theTableStructure);
$check = $db->query("SELECT * FROM $tbl_chat ");
if ($check) {

}else{

  $db->query("INSERT INTO $tbl_chat(`bot`, `human`, `date`, `status`) VALUES('Welcome '".$username."', am your helper, Just type Help', 'none', '$date', 1)");
}


?>
<div class="row" style="" id="case_hole">
  <form name="form1" class="form1" method="post">
    <input type="hidden" name="csrf_field" value="<?php echo $_SESSION['csrf_token']; ?>" class="csrf_field" id="" />
    <input type="hidden" name="tbl" value="<?php echo $tbl_chat."/".$username."/".$email."/".$tbl_conversations; ?>" class="" id="" />

    <div class="chatbox" id="">

      <div class="chatlogsall" id="chatlogsall">
     <div class="chatlog" id="">
       <div class="w" style="width: 95%;height: 500px;border:0px solid #005784;margin: auto;">
          <ul class="uol">
<?php
$checkt = $db->query("SELECT * FROM $tbl_chat ORDER BY id DESC");
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
      
      </div>

    <div class="chat-from">
    <textarea name="msg" class="msg" placeholder="" wrap="hard" cols="40" rows="1"></textarea>           
    <a href="#" onclick="chatallstudent()" class="">Send</a>
    </div> 

  </div>

<script type="text/javascript">


      function chatallstudent(){
      var msg = form1.msg.value.split('\n');
      var msg = msg.join('<br />');
      var csrf = form1.csrf_field.value;
      var tbl = form1.tbl.value;
      
      var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange = function(){
      if(xmlhttp.readyState==4&&xmlhttp.status==200){
      document.getElementById('chatlogsall').innerHTML = xmlhttp.responseText;
      }

      }
      
      xmlhttp.open('GET','api/pontusbot.php?msg='+msg+'&csrf_field='+csrf+'&tbl='+tbl,true);
      xmlhttp.send();
      }

   
    </script>
  </form>
</div>

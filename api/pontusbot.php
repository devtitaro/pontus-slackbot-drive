<?php
/**
 * 
 */

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


class bot
{
	public $mysqli;
	public $test;
	public $keys;
	public $tbl;
	public $tbl_con;
	public $email;
	public $username;

	
	function __construct($mysqli,$test,$tbl,$tbl_con,$email,$username,$keys)
	{
		$this->mysqli = $mysqli;
		$this->test = strtolower($test);
		$this->keys = $keys;
		$this->tbl = $tbl;
		$this->tbl_con = $tbl_con;
		$this->email = $email;
		$this->username = $username;
	}
	public function chat(){

		if (strpos($this->test, $this->keys[0]) !== false) {
			$this->mysqli->query("DELETE  FROM $this->tbl");
			return ["Cleaning the Workspace...","Welcome ".$this->username.", I am your helper. Just type Help"];
		}elseif(strpos($this->test, $this->keys[1]) !== false){
				
			return ["Obtaining help options...","Type Clear to clean up this workspace, Type help to get the list of things you could do here, Type /Del  to view delete conversation modes based on date range. e.g: /Del"];
			
		}elseif(strpos($this->test, $this->keys[2]) !== false){
				return ['none',"You could type Delx-five-years-ago. This would delete conversation made five years ago. Use this format for weeks, days, months and years. To Delete all then type D-All or D-today"];
		}elseif(strpos($this->test, $this->keys[3]) !== false){
			$getStatus = explode("-", $this->test);
			$count_getstatus = count($getStatus);
			if ($count_getstatus > 1) {
				$this->mysqli->query("DELETE  FROM $this->tbl_con WHERE  `user_convo` = '$this->email'");
				return ["Cleaning all your Conversation...",$this->username.", your conversation has been cleared"];
			}else{
				return  ["none","Nothing to process, Follow the format given to you when you type help. E.g D-all"];
			}
		}elseif(strpos($this->test, $this->keys[4]) !== false){

			$getStatus = explode("-", $this->test);
			$count_getstatus = count($getStatus);
			if ($count_getstatus > 3) {
				$status = $this->mergevlaue($getStatus[1], str_replace('s', '', $getStatus[2]));
				$dates = $this->chatDelete(- $status, "-");

				if (str_replace('s', '', $getStatus[2]) === 'year') {
					$split = explode("-", $dates);
					$date = $split[0];
				}elseif (str_replace('s', '', $getStatus[2]) === 'month') {
					$split = explode("-", $dates);
					$date = $split[0]."-".$split[1];
				}else{
					$date = $this->chatDelete(- $status, "-");
				}
				$this->mysqli->query("DELETE  FROM $this->tbl_con WHERE `convo_time` = '%$date%' AND  `user_convo` LIKE '$this->email' ");
				return ["Cleaning  conversation ...",$this->username.", your Conversation Cleared"];
			}else{
				return  ["none","Nothing to process, Follow the format given to you when you type help. E.g Delx-five-years-ago"];
			}
		}elseif(strpos($this->test, $this->keys[5]) !== false){
			$getStatus = explode("-", $this->test);
			$count_getstatus = count($getStatus);
			if ($count_getstatus > 1) {
			    $date = date("Y-m-d");
				$this->mysqli->query("DELETE  FROM $this->tbl_con WHERE  `user_convo` = '$this->email' AND `convo_time` LIKE '%$date%' ");
				return ["Cleaning all your Conversation...",$this->username.", your conversation has been cleared"];
			}else{
				return  ["none","Nothing to process, Follow the format given to you when you type help. E.g D-today"];
			}
		}else{
			return  ["none","Nothing to process, Type Help to begin"];
		}
	}

	public function chatDelete($key,$separator){
		
		$interation = $key;
		date_default_timezone_set('Africa/Lagos');
		$date = date('Y'.$separator.'m'.$separator.'d',strtotime($interation." days"));
		return $date;
	}	

	public function mergevlaue($number,$keys){
		$number_array = ['one' => 1,'two' => 2,'three' => 3,'four' => 4,'five' => 5,'six' => 6,'seven' => 7,'eight' => 8,'nine' => 9,'ten' => 10,'eleven' => 11, 'twelve' => 12,'thirteen' => 13,'fourteen' => 14,'fifteen' => 15,'sixteen' => 16,'seventeen' => 17,'eighteen' => 18,'nineteen' => 19,'twenty' => 20,'twentyone' => 21,'twentytwo' => 22,'twentythree' => 23, 'twentyfour' => 24,'twentyfive' => 25,'twentysix' => 26,'twentyseven' => 27,'twentyeight' => 28,'twentynine' => 29,'thirty' => 30,'thirtyone' => 31,'thirtytwo' => 32,'thirtythree' => 33,'thirtyfour' => 34,'thirtyfive' => 35, 'thirtysix' => 36];

		$key_array = ['year' => 365, 'month' => 31, 'week' => 7, 'day' => 1];

		if ($keys === 'year') {
			$return = $number_array[$number]*365;
		}elseif($keys === 'month'){
			$return = $number_array[$number]*31;
		}elseif($keys === 'week'){
			$return = $number_array[$number]*7;
		}elseif($keys === 'day'){
			$return = $number_array[$number]*1;
		}elseif($keys === 'today'){
			$return = 0*1;
		}
		
		return $return;
	}	
}



$msg = htmlentities($_REQUEST['msg'],ENT_QUOTES);
$details = trim($_REQUEST['tbl']);
$split = explode("/", $details);
$tbl = trim($split[0]);
$username = trim($split[1]);
$email = trim($split[2]);
$tbl_conversation = trim($split[3]);
$bot_request = new bot($db, $msg, $tbl, $tbl_conversation, $email, $username, ["clear","help","/del","d-all","delx","d-today"]);
$bot = $bot_request->chat();

if (!empty($bot[0]) OR !empty($bot[1])) {
	$db->query("INSERT INTO $tbl(`bot`, `human`, `date`, `status`) VALUES('$bot[0]','$bot[1]',now(), 1)");
}

?>
<style>
*{margin: 0px; padding: 0px;  font-family: Helvetica, Arial, sans-serif;}
.w ul{
    list-style: none;
    margin: 0;
    padding: 0;
    position: relative;


}
 .w ul li{
    display: inline-block;
    clear: both;
    border-radius: 30px;
    margin-bottom: 2px;
    white-space: pre-wrap;
    list-style-type: none;
    -moz-transform:rotate(180deg);
-webkit-transform:rotate(180deg);
-o-transform:rotate(180deg);
-ms-transform:rotate(180deg);

}
.chat-time-me,.chat-time-him{
     float: right;
    margin-right:40%;
    font-size: 15px;
}

.chat-photo{
    float: right;
    margin-right:-15px;
    margin-top: -50px;
    margin-left: 10px;
    position: relative;
}

.him{
    background-color: #eee;
    float: right;
    margin-right:40px;
    font-size: 15px;
    position: relative;
    /*wrapping*/
    max-width: 600px;
word-wrap: break-word;
/*changing direction of text (left to right=ltr and right to left=rtl)*/
    direction: ltr;
}
.me{
  /*wrapping*/
  max-width: 600px;
  word-wrap: break-word;
  text-align: left;
    float: left;
    background-color: #0084ff;
    color: #fff;
    margin-left: 8px;
    font-size: 15px;
 /*changing direction of text (left to right=ltr and right to left=rtl)*/
    direction: ltr;
}

#hidehere{
  overflow-y: hidden  !important;
}

.chatlogsall{
 overflow-y: scroll  !important;
direction: rtl;
-moz-transform:rotate(180deg);
-webkit-transform:rotate(180deg);
-o-transform:rotate(180deg);
-ms-transform:rotate(180deg);
filter:progid:DXImageTransform.Microsoft.BaseImage(rotation=2);
}
.chat-photo +  .chat-time-me + .me{
    border-bottom-right-radius: 5px;
}
.chat-time-me + .me + .chat-time-me + .me{
   border-top-right-radius: 5px;
    border-bottom-right-radius: 5px;
}

.me:last-of-type{
    border-bottom-right-radius: 30px;
}

.me + .chat-time-me{
   display: none;
}
.chat-photo + .chat-time-him{
   display: none;
}


.chat-time-him + .him + .chat-photo + .chat-time-him + .him + .chat-photo{
    display: none;
}


</style>

<div class="chatlog" id="">
        <div class="w" style="width: 95%;height: 500px;border:0px solid #005784;margin: auto;">
          <ul class="uol">
<?php
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

<?PHP
	session_start();
	$user = $_SESSION['loggued_on_user'];
	if (strlen($user) == 0) {
		echo "not logged\n";
		return ;
	}

	if ($_POST['msg']) {
		$msg = $_POST['msg'];
		if (strlen($msg) == 0)
			return ;
		if (file_exists("../private/chat") == TRUE) {
			$fd = fopen("../private/chat", "rw");
			flock($fd, LOCK_SH);
			$messages = unserialize(file_get_contents("../private/chat"));	
			flock($fd, LOCK_UN);
			fclose($fd);
		}
		else
			$messages = array();
		date_default_timezone_set("Europe/Chisinau"); 
		$message = array("login" => $_SESSION['loggued_on_user'], "time" => time(), "msg" => $msg);
		array_push($messages, $message);
		file_put_contents("../private/chat", serialize($messages));
	}

?>
<html>
	<head>
	<title>Chat</title>
	<style ="text/css">
		button 
		{
			margin-left: 5%;
			position: absolute;
			margin-top: 12px;
			width: 150px;
			height: 50%;
		}
		button:hover 
		{
			margin-left: 5%;
			position: absolute;
			margin-top: 12px;
			width: 150px;
			height: 50%;
		    background-color :#51b8ef; 
			
		}
		
		textarea
		{
			overflow: auto;
			resize: none;
			outline: none;
			height: 80%;
			width:  80%;
			background-color: #dcdcdc;
		}	
	    	chat-operator-message {
  			 color:#fff;
 			 background-color: #329fd9;
		}
		chat-send 
		{
  			color:#fff;
 			 background-color: #329fd9;
	    }
		
	</style>
	<script langage="javascript">top.frames['chat'].location = 'chat.php'</script>
	</head>
	<body>
		<form action="speak.php" method="POST">
			<textarea pl
			aceholder="message" name="msg" value=""></textarea>
			<button type="chat-send" > BLA-BLA </button>
		</form>
	</body>
</html>

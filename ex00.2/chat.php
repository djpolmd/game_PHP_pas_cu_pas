<html>
	<body>
		<?PHP 
			if (file_exists("../private/chat") == TRUE) {
				$fd = fopen("../private/chat", "r");
				flock($fd, LOCK_SH);
				
				$messages = unserialize(file_get_contents("../private/chat"));
				foreach($messages as $message)
				{
					printf("[%s] %s : %s <br>", date("H:s", intval($message['time'])), $message['login'], $message['msg']);
				}
				flock($fd, LOCK_UN);
				fclose($fd);
			}
		?>	
	</body>
<a href="logout.php">Logout ....</a> 
</html>

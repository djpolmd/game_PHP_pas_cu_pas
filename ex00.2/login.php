<?php
	$user =   $_POST['login'];
	$passwd = $_POST['passwd'];

	if (strlen($user) == 0 || strlen($passwd) == 0)
		return ;
	require("auth.php");
	session_start();
	
	if (auth($user, $passwd) == true) {
		
		$servername = "localhost";
		$username   = "djpolmd";
		$password   = "";

		// Create connection MySQL
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		
			if ($conn->connect_error) {
			    die("Connection failed: " . $conn->connect_error);
			} 
			
			echo "Connected successfully";
			
			$sql = "CREATE DATABASE IF NOT EXISTS myGAME";
			
			if ($conn->query($sql) === TRUE) {
			    	echo 'base: was created';
			} else  echo 'cant create db myGame';
			
			
			$sql = "CREATE TABLE IF NOT EXISTS ft_table users
					(
					id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
					login VARCHAR(30) NOT NULL,
					x int(3),
					y int(3),
					pp int(3),
					id_ship(4)
					)";
	
				if ($conn->query($sql) === TRUE) {
				echo 'table was created';
			} else echo 'cant create table';
		
		$sql = "INSERT INTO users (login, x,y,pp, id_ship)
				VALUES             ('user' , 0, 0 , 10, 1 );";

		if ($conn->query($sql) === TRUE) {
			echo ' ___user a fost adaugat ';
			
		}
			else echo 'cant add user in table users.db';	
			
			
		$_SESSION['loggued_on_user'] = $user;
		echo '
		
		<iframe name="speak" src="speak.php" width="100%" height="50px"></iframe>
		<a href="logout.php">Logout ....</a>
		<iframe name="game" src="game.php" width="80%" height="1400px">
		</iframe>';

	}
	else {
		$_SESSION['loggued_on_user'] = "";
		echo "ERROR\n";
	}
?>

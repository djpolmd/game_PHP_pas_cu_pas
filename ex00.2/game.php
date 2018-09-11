 <?php

	        if (file_exists("../private/chat") == TRUE) {
				$fd = fopen("../private/chat", "r");
				flock($fd, LOCK_SH);
				
				$messages = unserialize(file_get_contents("../private/chat"));
				foreach($messages as $message)
				{
					printf(	"[%s] %s : %s <br>",
					date("H:s", intval($message['time'])),
					$message['login'], $message['msg']);
				}
				flock($fd, LOCK_UN);
				fclose($fd);
		    	}

session_start();

if ($_SESSION[player] === 'player1')
	$_SESSION[player] =   'player2';
else
	$_SESSION[player] = 'player1';
echo "<center><h1> This  $_SESSION[player] turn.</h1></center>";
require "Classes/Vessel.class.php";
require "Classes/Player.class.php";
require "Classes/Game.class.php";
require "Classes/Map.class.php";

if (!$_SESSION[player2X])
{
  $_SESSION[player2X] = 9;
  $_SESSION[player2Y] = 9;
}

$map = new Map(array('x' => 20, 'y' => 20));
$map->showMap();

$player1 = new Player(array('Player1', $_SESSION[player1X], $_SESION[player1Y] )); 
$player1 = new Player(array('Player1', $_SESSION[player2X], $_SESION[player2Y] )); 

 ?>

 <head>
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="css/format_.css">
 </head>
 <body>
        
 </br>
 </br>
   <center><div class=button>
 	<a href=move.php?dir=Up><button>UP</button></a>
 	<a href=move.php?dir=Down><button>Down</button></a>
</br>
 	<a href=move.php?dir=Left><button>Left</button></a>
 	<a href=move.php?dir=Right><button>Right</button></a>
</br>
  <a href=restart.php><button>      Restart</button></a>
  <a href=move.php?dir=Shut><button>Shut</button></a>
</div></center>
 
 
 </body>

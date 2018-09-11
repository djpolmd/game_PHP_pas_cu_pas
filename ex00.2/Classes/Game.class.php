<?php

session_start();
class Game
{
	public $player1 = "";
	public $player2 = "";
	public static $verbose = False;

	public static function doc() {
		return(file_get_contents("Game.doc.txt"));
	}

	public function __construct(){
		$this->player1 = new Player(array('name' => 'Player1', 'x' => 0, 'y' => 0));
		$this->player2 = new Player(array('name' => 'Player2', 'x' => 20, 'y' => 20));
		if (self::$verbose)
			print("$this constructed".PHP_EOL);
		return;
	}

	public function __toString() {
		return(
			sprintf(PHP_EOL)
			);
	}

	public function __destruct(){
		if (self::$verbose)
			print("$this destructed".PHP_EOL);
			return;
	}
}

?>

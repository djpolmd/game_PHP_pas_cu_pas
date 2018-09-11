<?php

session_start();
class Map
{
	private $_x = 0;
	private $_y = 0;
	public static $verbose = False;

	public function __construct(array $kwargs){
		if(!array_key_exists("x", $kwargs) || !array_key_exists("y", $kwargs))
			return;
		else {
			$this->setX($kwargs['x']);
			$this->setY($kwargs['y']);
		}
		if (self::$verbose)
			print("$this constructed".PHP_EOL);
		return;
	}
	public function getX() { return $this->_x; }
	public function getY() { return $this->_y; }
	public function setX($value) {
		$this->_x = $value;
		return;
	}
	
	public function setY($value) {
		$this->_y = $value;
		return;
	}
	
	public function __toString() {
		return(
			sprintf(
			   	"x: ".$this->getX().PHP_EOL
		       ."y: ".$this->getY().PHP_EOL
				)
			);
	}
	
	public function showMap()
	{session_start();
		echo "<center><table>";
		for ($i = 0; $i < $this->_y; $i++)
		{
			echo "<tr class='row'>";
			for ($j = 0; $j < $this->_x; $j++)
			{
				if ($_SESSION[player1X] == $i && $_SESSION[player1Y] == $j)
					echo "<td class='cell'>
									<img src='imgs/Tie-Striker.png'	class='ship1'></td>";

				else if ($_SESSION[player2X] == $i && $_SESSION[player2Y]  == $j)
					echo "<td class='cell'>
					<img src='imgs/Tfighter.png' class='ship2'></td>";
				else
					echo "<td class='cell'></td>";
			}
			echo "</tr>";
		}
		echo "</table></center>";

	}
	public function __destruct(){
		if (self::$verbose)
			print("$this destructed".PHP_EOL);
		return;
	}
}

?>

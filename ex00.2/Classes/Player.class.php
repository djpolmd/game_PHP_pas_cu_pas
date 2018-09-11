<?php

session_start();
Class Player {

	private $_name = "";
	private $_x = 0;
	private $_y = 0;
	public static $verbose = False;

	public static function doc() {
		return(file_get_contents("Vessel.doc.txt"));
	}

	public function __construct(array $kwargs){
		 if(!array_key_exists("name", $kwargs)
			|| !array_key_exists("x", $kwargs)
			|| !array_key_exists("y", $kwargs))
			return;
		else {
			$this->setName($kwargs['name']);
			$this->setX($kwargs['x']);
			$this->setY($kwargs['y']);
		}
		if (self::$verbose)
			print("$this constructed".PHP_EOL);
		return;
	}

	public function __destruct(){
		if (self::$verbose)
			print("$this destructed".PHP_EOL);
			return;
	}

	public function getName() { return $this->_name; }
	public function getX()    { return $this->_x; }
	public function getY()    { return $this->_y; }

	public function setName($value) {
		$this->_name = $value;
		return;
	}
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
				"name: ".$this->getName().PHP_EOL
	     			."x: ".$this->getX().PHP_EOL
		    		."y: ".$this->getY().PHP_EOL
				)
			);
	}

}

 ?>

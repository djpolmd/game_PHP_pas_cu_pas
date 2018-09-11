<?php

session_start();

	Class Vessel {

		private $_name       = "";
		private $_size	   	 = 0;
		private $_life	   	 = 10;
		private $_horses	 = 10;
		private $_speed      = 10;
		private $_inertia	 = 10;
		private $_shield	 = 10;
		private $_weapons    = [];
		public static $verbose = False;
	
		public static function doc() {
			return(file_get_contents("Vessel.doc.txt"));
		}

		public function __construct(array $kwargs){

			if(!array_key_exists("name", $kwargs) || !array_key_exists("speed", $kwargs))
				return;
			else {
				$this->setName($kwargs['name']);
				$this->setSpeed($kwargs['speed']);
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
	
			public function getName()   { return $this->_name; }
			public function getSize()   { return $this->_size; }
			public function getLife()   { return $this->_life; }
			public function getHorses() { return $this->_horses; }
			public function getSpeed()  { return $this->_speed; }
			public function getInertia(){ return $this->_inertia; }
			public function getShield() { return $this->_shield; }
			public function getWeapons(){ return $this->_weapons; }
	
		public function setName($value) {
			$this->_name = $value;
			return;
		}
		public function setSize($value) {
			$this->_size = $value;
			return;
		}
		public function setLife($value) {
			$this->_life = $value;
			return;
		}
		public function setHorses($value) {
			$this->_horses = $value;
			return;
		}
		public function setSpeed($value) {
			$this->_speed = $value;
			return;
		}
		public function setInertia($value) {
			$this->_inertia = $value;
			return;
		}
		public function setShield($value) {
			$this->_shield = $value;
			return;
		}
		public function setWeapons($value) {
			$this->_weapons = $value;
			return;
		}
	
		public function __toString() {
			return(
				sprintf(
				 	"name: ".$this->getName().PHP_EOL
					."size: ".$this->getSize().PHP_EOL
					."life: ".$this->getLife().PHP_EOL
					."horses: ".$this->getHorses().PHP_EOL
					."speed: ".$this->getSpeed().PHP_EOL
					."inertia: ".$this->getInertia().PHP_EOL
					."shield: ".$this->getShield().PHP_EOL
					."weapons: ".$this->getWeapons().PHP_EOL
					)
				);
		}


}



?>

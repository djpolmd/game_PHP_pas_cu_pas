<?php 


trait Movements {

	public function __call(string $name , array $arguments){
		$player = $arguments['player'];
		
		return;
	}

	public function Up(Player $player){
		$player->SetY($player->getY - 1);
		return;
	}
	
	public function Down(Player $player){
		$player->SetY($player->getY + 1);

		return;
	}
	
	public function Left(Player $player){
		$player->SetX($player->getX - 1);

		return;
	}
	
	public function Right(Player $player){
		$player->SetX($player->getX + 1);

		return;
	}
}


 ?>

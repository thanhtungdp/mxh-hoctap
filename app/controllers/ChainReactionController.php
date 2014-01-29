<?php
class ChainReactionController{
	protected $chat=array();
	public $equation_array=array();
	public function ChainReactionController($chuoiphanung){
		$this->chat=explode(" ",trim($chuoiphanung));
		$this->tachChuoi();
	}
	public function tachChuoi(){
		$i=0;
		foreach($this->chat as $chat)
		{
			//echo $chat;
			if($i!=0){
				$finds=new FindEquationController($this->chat[$i-1],$chat);
				if(count($finds->byAll())>0)
					foreach($finds->byAll() as $find){
						//echo "<br/>".ChemistryController::getEquationByID($find);
						$this->equation_array[]=EquationController::ConvertEquation(ChemistryController::getEquationByID($find));
						break;
					}
				else $this->equation_array[]="Không tìm thấy phương trình phù hợp";
			}
			$i++;
		}
	}
	public function returnJSON(){
		return json_encode($this->equation_array);
	}
	public function returnArray(){
		return $this->equation_array;
	}
}
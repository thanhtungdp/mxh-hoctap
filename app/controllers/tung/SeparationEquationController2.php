<?php
class SeparationEquationController2{
	protected $thamgia=array();				
	protected $taothanh=array();
	/*
	Fe + Cl3 = FeCl2 => thamgia=array("Fe","Cl3");
						taothanh=array("FeCl2");
	*/
	public function SeparationEquationController($equation){
		$thulium=explode("=", $equation);
		//Tách chất tham gia và phản ứng
		$this->thamgia=explode("+", $thulium[0]);
		$this->taothanh=explode("+", $thulium[1]);
		$this->DeleteSpace();
	}
	public function DeleteSpace(){
		//Loại bỏ khoảng trắng
		for($i=0;$i<count($this->thamgia);$i++){
			$this->thamgia[$i]=trim($this->thamgia[$i]);
		}
		for($i=0;$i<count($this->taothanh);$i++){
			$this->taothanh[$i]=trim($this->taothanh[$i]);
		}
	}
	public function getIdChat($chat){
		//Get id các chất
		if(ChemistryThulium::where('thuliumMolecular','=',$chat)->count()==0){
				$thamgia=new ChemistryThulium();
				$thamgia->thuliumMolecular=$chat;
				$thamgia->save();
				return $thamgia->id;			// Lấy id chất tham gia
			}
			else 
				return ChemistryController::getIDFromThuliumByName($chat);
	}
	public function getThamgia(){
		return $this->thamgia;
	}
	public function getTaoThanh(){
		return $this->taothanh;
	}
	public function UpdateDatabase($equationId){
		//Cập nhật cơ sở dẽ liệu
		foreach($this->thamgia as $chat){		
			$thamgia_id=$this->getIdChat($chat);
			$thuliumEquation=new ChemistryChatThamGia();
			$thuliumEquation->thuliumId=$thamgia_id;
			$thuliumEquation->equationId=$equationId;
			$thuliumEquation->save();
		}
		foreach($this->taothanh as $chat){		
			$thamgia_id=$this->getIdChat($chat);
			$thuliumEquation=new ChemistryChatTaoThanh();
			$thuliumEquation->thuliumId=$thamgia_id;
			$thuliumEquation->equationId=$equationId;
			$thuliumEquation->save();
		}
	}
}
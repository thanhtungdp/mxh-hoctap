<?php
class PhuongTrinhHoaHocController extends Controller{
	public $equation_object;
	public $equation_array=array();
	public $thamgia;
	public $taothanh;
	public function PhuongTrinhHoaHocController($thamgia,$taothanh){
		$this->thamgia=trim($thamgia);
		$this->taothanh=trim($taothanh);
		$this->TimPhuongTrinh();
	}
	public function FillColorChat($equation){
		$this->thamgia=explode(" ",$this->thamgia);
		$this->taothanh=explode(" ",$this->taothanh);
		
		$chat=explode("=",$equation);
		$thamgia=explode("+",$chat[0]);
		$taothanh=explode("+",$chat[1]);
		$equation="";
		foreach($thamgia as $thulium){
			foreach($this->thamgia as $thulium2){
				$t=str_replace($thulium2,"<span class='specialThulium'>".$thulium2."</span>+", $thulium);
				if($t!=$thulium)
					$equation.=$t;
			}
		}
		$equation2="";
		for($i=0;$i<strlen($equation)-1;$i++){
			$equation2.=$equation[$i];
		}
		$equation=$equation2."=";
		foreach($taothanh as $thulium){
			foreach($this->taothanh as $thulium2){
				echo $thulium2.'-'.$thulium;
				$t=str_replace($thulium2,"<span class='specialThulium'>".$thulium2."</span>+", $thulium);
				echo $t;
				if($t!=$thulium)
					$equation.=$t;
			}
		}
		echo $equation;
		//return $equation;
	}
	public function TimPhuongTrinh(){
		$finds=new FindEquationController($this->thamgia,$this->taothanh);
		$this->equation_object= new ArrayObject();
		if(!empty($this->thamgia) && !empty($this->taothanh)){
			$this->equation_object=$finds->byAll();
		}
		else if(!empty($this->thamgia) && empty($this->taothanh)){
			$this->equation_object=$finds->byChatThamGia(); 
		}			
		else {
			$this->equation_object=$finds->byChatTaoThanh();
		}
		foreach($this->equation_object as $equation_id){
			$equation=ChemistryController::getEquationByID($equation_id);
			$equation=EquationController::ConvertEquation($equation);
			$this->equation_array[]=$equation;
			
		}
	}
	public function returnJSON(){
		
		return json_encode($this->equation_array);
	}
	public function returnArray(){
		return $this->equation_array;
	}
}
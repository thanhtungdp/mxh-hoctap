<?php
class SeparationEquationController{
	protected $thamgia=array();				
	protected $taothanh=array();
	protected $equation;
	protected $error;
	/*
	Fe + Cl3 = FeCl2 => thamgia=array("Fe","Cl3");
						taothanh=array("FeCl2");
	*/
	/*public function SeparationEquationController(){
		$file1 = "pthh.txt";
		$equations = file($file1);
		$i=1;
		foreach($equations as $line_num => $equation)
		{
			if($equation!="")
				$this->Separation($equation);
			$i++;
			echo "<br/>".$this->error;
		}
		//$this->Separation("9Cl2  +  2C2S 4CCl4  +  S2Cl2");
	}*/
	public function Separation($equation=array()){
		$str_equation=str_replace("</tr'>","",$equation['phuong_trinh']);
		$str_equation=str_replace('   +  ','+',$str_equation);
		$str_equation=str_replace('  +  ','+',$str_equation);
		$str_equation=str_replace("  ","=", $str_equation);
		$str_equation=str_replace(" ","=", $str_equation);
		$equation['phuong_trinh']=$str_equation;
		/*$str_equation=str_replace("   +  ","+", $str_equation);
		$str_equation=str_replace("   +   ","+", $str_equation);*/
		// Fe + Cl2 FeCl3           =>           Fe + Cl2 = FeCl3
		$thulium=explode("=", $str_equation);
		$this->thamgia=explode("+", $thulium[0]);
		$this->taothanh=explode("+",$thulium[1]);
		
		$this->DeleteNumber();
		if(!ChemistryEquation::check_equation($str_equation)){
			$insertEquation=ChemistryEquation::add_equation($equation);
			$this->UpdateDatabase($insertEquation->id);
		}
		return $str_equation;
		//Thêm vào dữ liệu
	}
	public function DeleteNumber(){
		//Loại bỏ khoảng trắng
		for($i=0;$i<count($this->thamgia);$i++){
			$this->thamgia[$i]=trim($this->deleteNumberOfString($this->thamgia[$i]));
		}
		for($i=0;$i<count($this->taothanh);$i++){
			$this->taothanh[$i]=trim($this->deleteNumberOfString($this->taothanh[$i]));
		}
	}
	public function deleteNumberOfString($thulium){
		//Xóa số trước chất
		// 2Fe => Fe
		if(is_numeric($thulium[0]))
			$index_next=$this->getIndexAfterNumber($thulium,0);
		else $index_next=0;
		return substr($thulium,$index_next);
	}
	public function getIndexAfterNumber($thulium,$index){
		if(is_numeric($thulium[$index+1]))
			return $this->getIndexAfterNumber($thulium,$index+1);
		else return $index+1;
	}
	public function getIdChat($chat){
		//Get id các chất
		if(ChemistryThulium::check_thulium($chat)==false){
				$thamgia=new ChemistryThulium();
				$thamgia->ctpt=$chat;
				$thamgia->save();
				return $thamgia->id;		// Lấy id chất tham gia
			}
			else 
				return ChemistryThulium::get_id($chat);
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
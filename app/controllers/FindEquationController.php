<?php
class FindEquationController{
	protected $thamgia=array();
	protected $taothanh=array();

	public function FindEquationController($thamgia="",$taothanh=""){
		$this->thamgia=explode(" ",trim($thamgia));
		$this->taothanh=explode(" ", trim($taothanh));
	}
	public function kiemTra($equationID,$equation_id,$dem){
		// Array , mã phương trình, vị trí đếm, số vị trí đếm
		//Kiểm tra các thành phần tiếp theo có cùng giá trị id
		if($dem!=count($equationID)-1){
			if(in_array($equation_id,$equationID[$dem+1])){
				return $this->kiemTra($equationID,$equation_id,$dem+1);				
			}
			else return false;
		}
		else
			return true;
			//Kiểm tra đúng	
	}
	public function getCommonThulium($equationID){
		//Lấy giá trị mảng các phương trình của các chất
		$dem=0;
		$IDEquation=array();
		foreach($equationID as $equation){
			for($i=0;$i<count($equation);$i++){
				if(count($equationID)!=1){
					//Có 2 chất trở lên/
					if(in_array($equation[$i],$equationID[$dem+1])){
						//Kiểm tra sự tồn tại của phần tử trong mảng
						if($this->kiemTra($equationID,$equation[$i],$dem+1)){
							//echo $equation[$i];
							$IDEquation[]=$equation[$i];
							//Lấy mảng giá trị
						}
					}
				}
				else{
					$IDEquation[]=$equation[$i];
				}
			}
			break;
		}
		return $IDEquation;
	}
	public function byChatThamGia(){
		//	Al + S8 -> AlS
		// Chất tham gia array("Al","S8")
		foreach($this->thamgia as $chat){
			$thuliumId=ChemistryThulium::get_id($chat);
			// Lấy mã chất bởi tên chất
			$equationID[]=ChemistryChatThamGia::get_id_equation($thuliumId);
			// Láy mã phương trình bởi mã chất
		}
		return $this->getCommonThulium($equationID);
	}
	public function byChatTaoThanh(){
		foreach($this->taothanh as $chat){
			$thuliumId=ChemistryThulium::get_id($chat);($chat);
			// Lấy mã chất bởi tên chất
			$equationID[]=ChemistryChatTaoThanh::get_id_equation($thuliumId);
			// Láy mã phương trình bởi mã chất
		}
		return $this->getCommonThulium($equationID);
	}
	public function byAll(){
		//Lựa chọn bởi chất tham gia và chất tạo thành
		$equationByThamGia=$this->byChatThamGia();
		$equationbyTaoThanh=$this->byChatTaoThanh();
		$common=array_intersect($equationByThamGia,$equationbyTaoThanh);
		return $common;
	}
}
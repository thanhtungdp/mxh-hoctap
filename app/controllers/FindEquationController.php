<?php
class FindEquationController{
	protected $thamgia=array();
	protected $taothanh=array();
	protected $id_equations=array();
	protected $input_thamgia;
	protected $input_taothanh;
	public function FindEquationController($thamgia="",$taothanh=""){
		if(!empty($thamgia))
			$this->thamgia=explode(" ",trim($thamgia));
		if(!empty($taothanh))
			$this->taothanh=explode(" ", trim($taothanh));
		$this->input_thamgia=$thamgia;
		$this->input_taothanh=$taothanh;
	}
	public function detectFind(){
		if(count($this->thamgia)>0 and count($this->taothanh)>0){
			$this->id_equations=$this->byAll();
		}
		if(count($this->thamgia)>0 and count($this->taothanh)==0){
			$this->id_equations=$this->byChatThamGia();
		}
		if(count($this->thamgia)==0 and count($this->taothanh)>0){
			$this->id_equations=$this->byChatTaoThanh();
		}
	}
	public function getEquations(){
		$this->detectFind();
		$equations=new ArrayObject();
		if(count($this->id_equations)>0){
			$equation_data=ChemistryEquation::whereIn("id",$this->id_equations)->paginate(10);
			foreach($equation_data as $v)
			{
				$equation=new ArrayObject();
				$equation->phuong_trinh=$v->phuong_trinh;
				$equation->dieu_kien="";
				if(!empty($v->nhiet_do))
					$equation->dieu_kien.="Nhiệt độ: ".$v->nhiet_do;
				if(!empty($v->dieu_kien))
					$equation->dieu_kien=" - Chất xúc tác: ".$v->chat_xuc_tac;
				if(!empty($v->hien_tuong))
					$equation->hien_tuong=" - Hiện tương: ".$v->hien_tuong;
				if(!empty($v->loai_phan_ung))
					$equation->loai_phan_ung=" - Loại phản ứng: ".$v->loai_phan_ung;
				$equations[]=$equation;
			}
			$equations->show_pagination=(string) $equation_data->links();
			$equations->count_equations=count($this->id_equations);
		}
		else {
			$equations->show_pagination="";
			$equations->count_equations=0;
		}
		return $equations;
	}
	public function getJSON(){
		$equations=array();
		$data=$this->getEquations();
		$equations['equation']=array();
		foreach($data as $v){
			$equation=array();
			$equation['phuong_trinh']=EquationController::ConvertEquation($v->phuong_trinh);
			$equation['dieu_kien']=$v->dieu_kien;
			$equations['equation'][]=$equation;
		}
		$equations['show_pagination']=$data->show_pagination;
		$equations['count_equations']=$data->count_equations;
		$equations['input_taothanh']=$this->input_taothanh;
		$equations['input_thamgia']=$this->input_thamgia;
		return json_encode($equations);
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
		$equationID=array();
		foreach($this->thamgia as $chat){
			if(ChemistryThulium::check_thulium($chat))
			{
				$thuliumId=ChemistryThulium::get_id($chat);
				// Lấy mã chất bởi tên chất
				$equationID[]=ChemistryChatThamGia::get_id_equation($thuliumId);
				// Láy mã phương trình bởi mã chất
			}
			else break;
		}
		return $this->getCommonThulium($equationID);
	}
	public function byChatTaoThanh(){
		$equationID=array();
		foreach($this->taothanh as $chat){
			if(ChemistryThulium::check_thulium($chat))
			{
				$thuliumId=ChemistryThulium::get_id($chat);($chat);
				// Lấy mã chất bởi tên chất
				$equationID[]=ChemistryChatTaoThanh::get_id_equation($thuliumId);
				// Láy mã phương trình bởi mã chất
			}
			else break;
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
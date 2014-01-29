<?php
class ChemistryController{
	public static function getIDFromThuliumByName($name){
		//Lấy id bởi tên chất
		foreach(ChemistryThulium::where('thuliumName','=',$name)->get() as $chat){
			return $chat->id;
		}
	}
	public static function getIDEquationFromChatThamGiaByThuliumID($thuliumId){
		//lấy id của phương trình hóa học từ chất tạo thành bở id của chất
		/*
		*	Fe : id =2
		*	ChatThamGia 	2 3
		*					2 4
		*	@return array(3,4);
		*/ 	
		$arrayEquationId=array();
		foreach(ChemistryChatThamGia::where("thuliumId","=",$thuliumId)->get() as $chat){
			$arrayEquationId[]=$chat->equationId;
		}
		return $arrayEquationId;
	}
	public static function getIDEquationFromChatTaoThanhByThuliumID($thuliumId){
		//lấy id của phương trình hóa học từ chất tạo thành bở id của chất
		/*
		*	Fe : id =2
		*	ChatThamGia 	2 3
		*					2 4
		*	@return array(3,4);
		*/ 	
		$arrayEquationId=array();
		foreach(ChemistryChatTaoThanh::where("thuliumId","=",$thuliumId)->get() as $chat){
			$arrayEquationId[]=$chat->equationId;
		}
		return $arrayEquationId;
	}
	public static function getEquationByID($id){
		//Lấy phương trình bởi id
		foreach(ChemistryEquation::where('id','=',$id)->get() as $equation)
			return $equation->equation;
	}
	public static function getBalancedEquationByID($id){
		//Lấy phương trình cân bằng bởi id
		foreach(ChemistryEquation::where('id','=',$id)->get() as $equation)
			return $equation->balancedEquation;
	}
	public static function getAllThulium(){
		return ChemistryThulium::get();
	}
	//Add
	public static function addEquation($equation="",$balanced=""){
        $e=new ChemistryEquation();
		$e->equation=$equation;
		$e->balancedEquation=$balanced;
		$e->save();
        return $e;
	}
	public static function addThulium($thulium){
		$t=new ChemistryThulium();
		$t->thuliumName=$thulium;
		$t->save();
		return $t;
	}
	//Check
	public static function checkThuliumByName($name){
		if(ChemistryThulium::where("thuliumName","=",$name)->count()>0)
			return true;
		else return false;
	}
	public static function checkEquation($equation){
		if(ChemistryEquation::where("equation","=",$equation)->count()>0)
			return true;
		else return false;
	}
}
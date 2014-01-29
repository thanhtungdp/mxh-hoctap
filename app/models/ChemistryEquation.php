<?php

class ChemistryEquation extends Eloquent {
	/**
	 * Bảng phản ứng hóa học
	 * equation: phản ứng chưa cần bằng
	 * balancedEquation: Cần bằng pt hóa học
	*/
	protected $table = 'chemistry_equation';
	public static function check_equation($equation){
		if(ChemistryEquation::where("phuong_trinh","=",$equation)->count()>0)
			return true;
		else return false;
	}
	public static function add_equation($equation=array()){
		$equa=new ChemistryEquation();
		foreach ($equation as $key => $e) {
			$equa->$key=$e;
		}
		$equa->save();
		return $equa;
	}
	public static function get_equation($id){
		//get equation by id
		return ChemistryEquation::find($id);
	}
}
<?php
class ChemistryThulium extends Eloquent{
	/**
	 * @Bảng các chất
	 * thuliumMolecular : công thức phân tử
	 * thuliumName: 	tên chất
	*/
	protected $table="chemistry_thulium";
	public static function check_thulium($thulium){
		if(ChemistryThulium::where("ctpt","=",$thulium)->count()>0)
			return true;
		else return false;
	}
	public static function get_id($thulium){
		return ChemistryThulium::where("ctpt","=",$thulium)->get()->first()->id;
	}
}
<?php
class ChemistryChatTaoThanh extends Eloquent{
	protected $table="chemistry_chattaothanh";
	public static function get_id_equation($thuliumId){
		//lấy id của phương trình hóa học từ chất tạo thành bở id của chất
		/*
		*	Fe : id =2
		*	ChatThamGia 	2 3
		*					2 4
		*	@return array(3,4);
		*/ 
		$equationId=array();
		foreach(ChemistryChatTaoThanh::where("thuliumId",'=',$thuliumId)->get() as $thulium){
			$equationId[]=$thulium->equationId;
		}
		return $equationId;
	}
}
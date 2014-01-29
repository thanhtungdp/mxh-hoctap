<?php
class ChemistryChatThamGia extends Eloquent{
	/**
	 * @Bảng liên quan đến chất và phản ứng hóa học
	 * thuliumId: mã chất
	 * equationId: mã phương trình
	*/
	protected $table="chemistry_chatthamgia";
	public static function get_id_equation($thuliumId){
		//lấy id của phương trình hóa học từ chất tạo thành bở id của chất
		/*
		*	Fe : id =2
		*	ChatThamGia 	2 3
		*					2 4
		*	@return array(3,4);
		*/ 
		$equationId=array();
		foreach(ChemistryChatThamGia::where("thuliumId",'=',$thuliumId)->get() as $thulium){
			$equationId[]=$thulium->equationId;
		}
		return $equationId;
	}
}
<?php
class TimKiemController extends Controller{
	public static function TracNghiemTimKiem($search,$chuyenmuc_id=null){
		if($chuyenmuc_id!=null)
			$sql_chuyenmuc="AND chuyenmuc_id=?";
		else $sql_chuyenmuc="";
		$sql="SELECT * FROM tracnghiem_chude WHERE MATCH(chu_de,tu_khoa) AGAINST(? IN BOOLEAN MODE) {$sql_chuyenmuc} ORDER BY ROUND(MATCH(chu_de,tu_khoa) AGAINST(?), 7) DESC";
		if($chuyenmuc_id!=null)
			$data=DB::select($sql,array($search,$chuyenmuc_id,$search));
		else
			$data=DB::select($sql,array($search,$search));

		$data_chude=array();
		foreach($data as $d)
			$data_chude[]=$d;
		return $data_chude;		
	}
	public static function TracNghiemTimKiemJSON($search,$chuyenmuc_id){
		return ChuyenMucController::getChudeJSON(TimKiemController::TracNghiemTimKiem($search,$chuyenmuc_id));
	}
}
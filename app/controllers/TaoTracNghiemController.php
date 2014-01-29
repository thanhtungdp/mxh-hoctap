<?php
class TaoTracNghiemController extends Controller{
	public function insert(){
		$chu_de=htmlspecialchars(Input::get("chu_de"));
		if(Input::get("thoi_gian")!="")
			$thoi_gian=Input::get("thoi_gian");
		else $thoi_gian=0;
		$chuyen_muc=Input::get("chuyen_muc");
		$data_cauhoi=Input::get("cau_hoi");
		
		$chude_id=TracNghiemController::insertChuDe($chu_de,$thoi_gian,$chuyen_muc);
		TracNghiemController::insertCauHoi($data_cauhoi,$chude_id);

		$dataJson['url']=TracNghiemController::getUrlChude($chu_de,$chude_id);
		$dataJson['id']=$chude_id;
		$dataJson['check']=true;
		return json_encode($dataJson);
	}
}
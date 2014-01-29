<?php
class LamTracNghiemController extends Controller{
	public static function getCauHoi($chude_url,$id){
		$data_cauhoi=array();
		if($id==null){
			if(TracNghiemController::checkChudeByUrl($chude_url)){
				//Kiểm tra có tòn tại URL
				$id=TracNghiemController::getIdChudeByUrl($chude_url);
				$data_cauhoi=TracNghiemController::getCauhoiByChudeId($id);
			}
		}
		else{
			
			if(TracNghiemController::checkChudeById($id)){
				//Kiểm tra có tồn tại ID

				//Chuyển URL
				// database    1     |   trac-nghiem
				// url 			trac-ngh/1		=> false
				// chang url 	trac-nghiem/1
				if(!TracNghiemController::checkChudeByUrl($chude_url)){
					$chude_url=TracNghiemController::getUrlChudeById($id);
					return Redirect::to(Asset("trac-nghiem/lam-trac-nghiem/{$chude_url}/{$id}"));
				}

				$data_cauhoi=TracNghiemController::getCauhoiByChudeId($id);
				//Lấy dữ liệu câu hỏi từ chủ đề id
			}
		}
		return $data_cauhoi;
	}
	public static function getRandomCauHoi($url,$id){
		$data=LamTracNghiemController::getCauHoi($url,$id);
		$data=(array)$data;
		$data_cauhoi=array();
		foreach($data as $dt){
			$data_cauhoi=(array)$dt;
			shuffle($data_cauhoi);
			break;
		}
		return $data_cauhoi;
	}
}
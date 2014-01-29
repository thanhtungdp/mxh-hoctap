<?php
class ChuyenMucController extends Controller{
	public static function getChuDeInChuyenMuc($chuyenmuc_url,$id){
		$data_chude=array();
		if($id==null){
			if(TracNghiemController::checkChuyenmucByUrl($chuyenmuc_url)){
				$id=TracNghiemController::getIdChuyenmucByUrl($chuyenmuc_url);
				$data_chude=TracNghiemController::getChudeKiemduyetByChuyenmucId($id);
			}
		}
		else{
			if(TracNghiemController::checkChuyenmucById($id)){
				//Kiểm tra có tồn tại ID

				//Chuyển URL
				// database    1     |   trac-nghiem
				// url 			trac-ngh/1		=> false
				// chang url 	trac-nghiem/1
				if(!TracNghiemController::checkChuyenmucByUrl($chuyenmuc_url)){
					$chude_url=TracNghiemController::getUrlChuyenmucById($id);
					return Redirect::to(Asset("trac-nghiem/chuyen-muc/{$chuyenmuc_url}/{$id}"));
				}

				$data_chude=TracNghiemController::getChudeKiemduyetByChuyenmucId($id);
				//Lấy dữ liệu câu hỏi từ chủ đề id
			}
		}
		return $data_chude;
	}
	public static function getChudeJSON($data){
		$data_chude=array();
		foreach($data as $chude){
			$cd['chu_de']=$chude->chu_de;
			$cd['id']=$chude->id;
			$cd['url']=TracNghiemController::getUrlChude($chude->chu_de,$chude->id);
			$cd['count_cauhoi']=TracNghiemController::getCountCauHoi($chude->id);
			$cd['chuyenmuc_id']=$chude->chuyenmuc_id;
			$cd['chuyenmuc_name']=TracNghiemController::getChuyenmucNameById($chude->chuyenmuc_id);
			$cd['author_id']=$chude->author_id;
			$cd['author_username']=UserController::getUsernameById($chude->author_id);
			$data_chude[]=$cd;
		}
		return json_encode($data_chude);
	}
}
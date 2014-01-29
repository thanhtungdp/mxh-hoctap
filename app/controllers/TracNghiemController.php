<?php
class TracNghiemController extends Controller{
	public static function insertChuDe($chu_de,$thoi_gian,$chuyen_muc){
		$chude=new TracNghiemChuDe();
		$chude->chu_de=$chu_de;
		$chude->thoi_gian=$thoi_gian;
		$chude->chuyenmuc_id=$chuyen_muc;
		$chude->author_id=UserController::getSessionId();
		$chude->url=UrlController::replaceUrl($chu_de);
		$chude->save();
		//Tạo chủ đề
		return $chude->id;
	}

	public static function insertCauHoi($data,$chude_id){
		/* Thêm dữ liệu câu hoi */
		
		$i=0;
		foreach($data as $cau){
			if(($cau['xoa']=='false') && $i>0){
				$cauhoi=new TracNghiemCauHoi();			
				$cauhoi->noi_dung=BBCode::replace($cau['noi_dung']);
				$cauhoi->cau_a=BBCode::replace($cau['cau_a']);
				$cauhoi->cau_b=BBCode::replace($cau['cau_b']);
				$cauhoi->cau_c=BBCode::replace($cau['cau_c']);
				$cauhoi->cau_d=BBCode::replace($cau['cau_d']);
				$cauhoi->dap_an=$cau['dap_an'];
				$cauhoi->chude_id=$chude_id;
				$cauhoi->save();
			}
			$i++;
		}
	}

	public static function checkChudeByUrl($url){
		if(TracNghiemChuDe::where('url','=',$url)->get()->count()>0)
			return true;
		else return false;
	}
	public static function checkChudeById($id){
		if(TracNghiemChuDe::where('id','=',$id)->get()->count()>0)
			return true;
		else return false;
	}
	public static function checkChudeByIdUrl($id,$url){
		if(TracNghiemChuDe::where('id','=',$id)->where('url','=',$url)->get()->count()>0)
			return true;
		else return false;
	}
	public static function checkChuyenmucByUrl($url){
		if(TracNghiemChuyenMuc::where('url','=',$url)->get()->count()>0)
			return true;
		else return false;
	}
	public static function checkChuyenmucById($id){
		if(TracNghiemChuyenMuc::where('id','=',$id)->get()->count()>0)
			return true;
		else return false;
	}

	
	public static function getIdChuyenmucByUrl($url){
		$data=TracNghiemChuyenMuc::where('url','=',$url)->first();
		return $data['id'];
	}
	public static function getUrlChuyenmucById($id){
		$data=TracNghiemChuyenMuc::where('id','=',$id)->first();
		return $data['url'];
	}
	public static function getChuyenmucNameById($id){
		$data=TracNghiemChuyenMuc::where('id','=',$id)->first();
		return $data['chuyen_muc'];
	}
	public static function getCountCauHoi($chude_id){
		return TracNghiemCauHoi::where('chude_id','=',$chude_id)->count();
	}
	public static function getIdChudeByUrl($url){
		$data=TracNghiemChuDe::where('url','=',$url)->first();
		return $data['id'];
	}
	public static function getChudeNameById($id){
		$data=TracNghiemChuDe::where('id','=',$id)->first();
		return $data['chu_de'];
	}
	public static function getThoigianChudeById($id){
		$data=TracNghiemChuDe::where('id','=',$id)->first();
		return $data['thoi_gian'];
	}
	public static function getChudeByUrl($url){
		$data=TracNghiemChuDe::where('url','=',$url)->get();
		return $data;
	}
	public static function getChudeById($id){
		$data=TracNghiemChuDe::where('id','=',$id)->get();
		return $data;
	}
	public static function getChude(){
		return TracNghiemChuDe::get();
	}
	public static function getChudeByAuthorId($author_id){
		return TracNghiemChuDe::where('author_id','=',$author_id)->get();
	}
	public static function getChudeByChuyenmucId($chuyenmuc_id){
		$data=TracNghiemChuDe::where('chuyenmuc_id','=',$chuyenmuc_id)->orderBy('id','DESC')->get();
		return $data;
	}
	public static function getChudeKiemduyetByChuyenmucId($chuyenmuc_id){
		$data=TracNghiemChuDe::where('chuyenmuc_id','=',$chuyenmuc_id)->where('kiem_duyet','=',1)->orderBy('id','DESC')->get();
		return $data;
	}
	public static function getUrlChudeById($id){
		$data=TracNghiemChuDe::where('id','=',$id)->first()->toArray();
		return $data['url'];
	}

	public static function getCauhoiByChudeId($chude_id){
		return TracNghiemCauHoi::where('chude_id','=',$chude_id)->get();
	}

	//Get URL
	public static function getUrlChuDe($chude,$id){
		return Asset('trac-nghiem/lam-trac-nghiem').'/'.UrlController::replaceUrl($chude).'/'.$id;
	}
	public static function getUrlChuyenMuc($chuyenmuc,$id){
		return Asset('trac-nghiem/chuyen-muc').'/'.UrlController::replaceUrl($chuyenmuc).'/'.$id;
	}
}
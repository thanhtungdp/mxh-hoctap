<?php
class AdminController extends Controller{
	public static function insertTracNghiemChuyenmuc($chuyenmuc){
		$category=new TracNghiemChuyenMuc();
		$category->chuyen_muc=$chuyenmuc;
		$category->url=UrlController::replaceUrl($chuyenmuc);
		$category->save();
	}
}
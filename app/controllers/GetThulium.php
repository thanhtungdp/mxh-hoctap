<?php
class GetThulium extends Controller{
	public $url="http://phuongtrinhhoahoc.com/tra-cuu-chat-hoa-hoc?Substance%5Bsubstance_search%5D=&page=";
	public $count_chat=0;
	public function get_of_pages(){
		for($i=251;$i<=278;$i++){
			echo $this->url.$i."<br/>";
			$this->gets($this->url.$i);
		}
		echo $this->count_chat;
	}
	public function gets($url){
		$html=file_get_html($url);
		$thulium=array();
		foreach ($html->find("div.substance-container") as $value) {
			$tmp_array=array();
			foreach($value->find("div.substance-formula") as $v)
				$tmp_array['ctpt']=trim($v->plaintext);
				//Công thức phân tử
			foreach($value->find("div.substance-vietnamese-name") as $v)
				$tmp_array['vietnamese_name']=trim($v->plaintext);
				//Tên gọi Việt Nam
			foreach($value->find("div.substance-info-container table") as $v){
				$i=1;
				foreach($v->find("tr td") as $v2){
					switch($i){
						case 2:
							$tmp_array['english_name']=trim($v2->plaintext);break;
						case 4:
							$tmp_array['nguyen_tu_khoi']=trim($v2->plaintext);break;
						case 5:
							$tmp_array['khoi_luong_rieng']=trim($v2->plaintext);break;
						case 6:
							$tmp_array['mau_sac']=trim($v2->plaintext);break;
						case 7:
							$tmp_array['trang_thai']=trim($v2->plaintext);break;
						case 9:
							$tmp_array['nhiet_do_soi']=trim($v2->plaintext);break;
						case 10:
							$tmp_array['nhiet_do_nong_chay']=trim($v2->plaintext);break;
						case 11:
							$tmp_array['do_am_dien']=trim($v2->plaintext);break;
						case 12:
							$tmp_array['nang_luong_ion']=trim($v2->plaintext);break;
						case 14:
							$tmp_array['thong_tin_khac']=trim($v2->plaintext);break;
					}
					$i++;
				}
			}

			$thulium[]=$tmp_array;
		}
		//$this->insert_test();
		foreach ($thulium as $value) {
			$db=new ChemistryThulium();
			foreach ($value as $key => $v) {
				$db->$key=$v;
			}
			$this->count_chat++;
			$db->save();
		}
	}
	public function insert_test(){
		$db=new ChemistryThulium();
		$db->ctpt="Fe";
		$db->save();
	}
}
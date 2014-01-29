<?php
class GetEquationController{
	protected $url_default="http://phuongtrinhhoahoc.com/?";
	protected $url;
	protected $count_page=1;
	public $equations=array();
	public function GetEquationController($chatThamGia){
		$this->updateCountPage($chatThamGia);
		for($i=1;$i<=$this->count_page;$i++){
			$this->getEquation($chatThamGia,$i);
			if($i%10==0)
				sleep(1);
		}
		$data['check']=true;
		$data['equations']=$this->equations;
	}
	public function getEquation($chatThamGia,$page){
		$this->getURL($chatThamGia,"",$page);
		$html=cUrlController::getPage($this->url,"",30,1);
		$classname="formula-row";
		$dom = new DOMDocument;
		@$dom->loadHTML($html);
		$xpath = new DOMXPath($dom);
		//Cập nhất số trang số trang

		$equaitons=$xpath->query("//*[@class='" . $classname . "']");
		for($i=0;$i<$equaitons->length;$i++){
			$this->equations[]=$equaitons->item($i)->nodeValue;
			File::append('pthh2.txt', $equaitons->item($i)->nodeValue."\n");
		}
	}
	public function getURL($chatThamGia,$chatSanPham="",$page="1"){
		$this->url=$this->url_default;
		$this->url.="reactant_search={$chatThamGia}&product_search={$chatSanPham}&page={$page}";
	}
	public function updateCountPage($chatThamGia){
		$this->getURL($chatThamGia,"");
		$html=cUrlController::getPage($this->url,"",30,1);
		$classname="formula-row";
		$dom = new DOMDocument;
		@$dom->loadHTML($html);
		$xpath = new DOMXPath($dom);

		$count_page = $xpath->query("//*[@class='" . "last" . "']/a/@href");
		if($count_page->length>0){
			$this->count_page=$count_page->item(1)->nodeValue;
			$array=explode("=",$this->count_page);
			$this->count_page=$array[count($array)-1];
		}
	}
}
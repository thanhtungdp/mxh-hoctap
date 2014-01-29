<?php
class GetTracNghiem{
	public function getPage(){
	$html=cUrlController::getPage("http://hocmai.vn/course/266/12/luyen-thi-dai-hoc-kit-1-mon-toan.html","",30,1);
		//$html=file_get_contents("http://www.phimvips.com/");
		/*$classname="content";
		$dom = new DOMDocument;	
		@$dom->loadHTML($html);
		$xpath = new DOMXPath($dom);
		//Cập nhất số trang số trang

		$equaitons=$xpath->query("//*[@class='" . $classname . "']");
		for($i=0;$i<$equaitons->length;$i++){
			echo $equaitons->item($i)->nodeValue;
		}*/
		
		echo $html;
	}
}
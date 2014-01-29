<?php
class GetThuliumController{
	private $url="http://phuongtrinhhoahoc.com/tra-cuu-chat-hoa-hoc?Substance%5Bsubstance_search%5D=&page=";
	private $thulium=array();
	private $page;
	public function GetThuliumController(){
		$this->getThulium();
		for($i=13;$i<=13;$i++){
			$this->page=$i;
			$this->getThulium();
			$this->updateTableThulium();
			echo "<pre>";
			print_r($this->thulium);
			echo "</pre>";
			$this->thulium=array();
			//sleep(1);
		}
	}
	public function getThulium(){
		$html=cUrlController::getPage($this->url.$this->page,"",60,1);
		$classname="substance-formula";
		$dom = new DOMDocument;
		@$dom->loadHTML($html);
		$xpath = new DOMXPath($dom);
		$results = $xpath->query("//*[@class='" . $classname . "']");
		if($results->length==0){
			if(!empty($this->page)){
				echo "<br/>Không đọc được trang {$this->page}";
				File::append('tmp.txt', " ".$this->page);	
				}		
		}
		else{
			for($i=0;$i<$results->length;$i++){
				echo $results->item($i)->nodeValue;
				$this->thulium[]=trim($results->item($i)->nodeValue);
			}
		}
	}
	public function updateTableThulium(){
		for($i=0;$i<count($this->thulium);$i++){
			if(!ChemistryController::checkThulium($this->thulium[$i])){
				ChemistryController::addThulium($this->thulium[$i]);
			}
		}
	}
}
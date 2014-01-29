<?php
class BalancedEquationController{
	private $url="http://www.webqc.org/balance.php";
	private $data_post;
	private $data_html;
	public function BalancedEquationController($data_post){
		$this->data_html=cUrlController::postPage($this->url,$data_post);
	}
	public function getBalancedEquation(){
		//Sử dụng Dom để lấy phương trình hóa học
		$dom= new domDocument('1.0','utf-8');
		@$dom->loadHTML($this->data_html);
		$tables=$dom->getElementsByTagName("table");
		$tr=$this->repeatForEach($tables,"tr",1);
		$td=$this->repeatForEach($tr,"td",2);
		$b=$this->repeatForEach($td,"b",0);
		if($b->length>2){
			$return=$b->item($b->length-2)->nodeValue;
			//Length - 2 = index => giá trị 
		}
		else
			$return=$b->item(0)->nodeValue;
		return substr($return,18,strlen($return));
	}
	public function repeatForEach($elements,$tag_element_name,$element_index=0){
		//Lặp lại Foreach
		$i=0;
		foreach($elements as $element){		
			if($i==$element_index){
				$dom=$element->getElementsByTagName($tag_element_name);
				return $dom;
			}
			$i++;
		}
	}
}
?>
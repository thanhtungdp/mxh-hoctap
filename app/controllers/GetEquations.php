<?php
class GetEquations extends Controller{
	public $url="http://phuongtrinhhoahoc.com/?reactant_search=";
	public $pages=1;
	public $thulium;
	public $not_thulium;
	public $equations=array();
	public $equation_return=array();
	public function get_equations($thulium){
		$this->thulium=$thulium;
		$this->get_not_thulium();
		$html=file_get_html($this->get_url($thulium,1));
		$this->count_page($html);
		for($i=1;$i<=$this->pages;$i++){
			$this->get_equation($this->get_url($thulium,$i));
		}	
		return json_encode($this->equation_return);
	}
	public function get_not_thulium(){
		foreach(ChemistryThulium::select("ctpt")->where("ctpt","LIKE","%+%")->get() as $thulium)
			$this->not_thulium[]=$thulium->ctpt;
	}
	public function check_not_thulium($str){
		$this->get_not_thulium();
		$tmp_str=$str;
		foreach ($this->not_thulium as $thulium) {
				$tmp_str=str_replace($thulium,"",$tmp_str);
		}	
		if($tmp_str!=$str) return false;
		else return true;
	}
	public function get_equation($url){
		$html=file_get_html($url);
		foreach($html->find("div.equation_result") as $value){
			$i=0;
			$count_td=0;
			$equation=array();
			foreach ($value->find(".full_fomular_container .formula-table .formula-row") as $v) {
				$equation['phuong_trinh']=trim($v->plaintext);
				$equation['phuong_trinh']=str_replace("</tr'>","",$equation['phuong_trinh']);
			}
			foreach ($value->find(".conditions_container table tr td") as $v) {
				$count_td++;
			}
			if($count_td==6)
				foreach ($value->find(".conditions_container table tr td") as $v) {
				# code...
					switch ($i) {
						case '1':
							$equation['nhiet_do']=trim($v->plaintext);
							break;
						case '2':
							$equation['chat_xuc_tac']="";break;
						case '3':
							$equation['hien_tuong']=trim($v->plaintext);break;
						case '5':
							$equation['loai_phan_ung']=trim($v->plaintext);break;
					}
					$i++;
				}
			else{
				foreach ($value->find(".conditions_container table tr td") as $v) {
				# code...
					switch ($i) {
						case '1':
							$equation['nhiet_do']=trim($v->plaintext);
							break;
						case '2':
							$equation['chat_xuc_tac']=trim($v->plaintext);break;
						case '4':
							$equation['hien_tuong']=trim($v->plaintext);break;
						case '6':
							$equation['loai_phan_ung']=trim($v->plaintext);break;
					}
					$i++;
				}
			}
			$this->equations[]=$equation;
		}
		foreach($this->equations as $equation)
			{
				//var_dump($equation);
				if($this->check_not_thulium($equation['phuong_trinh'])){
					$sepa=new SeparationEquationController();
					$this->equation_return[]=$sepa->Separation($equation);
				}

				//Insert database			
			}
	}
	public function count_page($html){
		foreach ($html->find(".yiiPager .last a") as $key => $value) {
			$find='/?reactant_search='.$this->thulium.'&page=';
			$this->pages=str_replace('/?reactant_search=',"",$value->href);		
			$this->pages=str_replace($this->thulium,"", $this->pages);
			$this->pages=str_replace('&',"", $this->pages);
			$this->pages=str_replace('amp;page=',"", $this->pages);
			break;
		}
	}
	public function get_url($thulium,$page=null){
		return $this->url.$thulium."&page=".$page;
	}
}
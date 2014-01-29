<?php
class EquationController{
	public static function afterNumber($i,$equation,$returnS=false){
		//returnS=true Trả về giá trị là 1 chuỗi
		//returnS-false Trả về giá trị là 1 index
		$j=$i;
		$check=false;
		$s="";
		while($check==false){
			$j++;
			if(!is_numeric($equation[$j]))
				$check=true;
			else{
				$s.=$equation[$j];
				$i=$j;
			}
		}
		if($returnS) return $s;
		else return $i;
	}
	public static function ConvertEquation($equation){
		$s="";
		$equation=trim($equation);
		$equation=str_replace("+","  +  ",$equation);
		$equation=str_replace("=","  ->  ",$equation);
		for($i=0;$i<strlen($equation);$i++){
			if(is_numeric($equation[$i])){
				//Kiểm tra số học
				$before_number=isset($equation[$i-1])?$equation[$i-1]:-1;
				//Lấy phần tử trước số đó
				// Example Fe2 => trước 2 => e
				if($before_number==-1){//Không tồn tại trước số hạng
					$s.=$equation[$i];
					if(EquationController::afterNumber($i,$equation)!=$i){
							$s.=EquationController::afterNumber($i,$equation,true);
							$i=EquationController::afterNumber($i,$equation);
						}
				}
				else
					if($before_number=="+" || $before_number==" " || $before_number=="=" || $before_number=="*"){
						//Không phải là chỉ số => hệ số cân bằng
						//3Cl2 =>3 là hệ số cân bằng
						$s.=$equation[$i];
						if(EquationController::afterNumber($i,$equation)!=$i){
							$s.=EquationController::afterNumber($i,$equation,true);
							$i=EquationController::afterNumber($i,$equation);
						}

					}
					else
						$s.="<sub>".$equation[$i]."</sub>";
						//Là chỉ số nguyên tử
						//2Fe3 => 3 là chỉ số nguyên tử
			}
			else{
				//Ký tự thường
				// Example : Fe
				$s.=$equation[$i];
			}
		}
		return $s;
	}
	public static function replaceEquation($equation){
		//Loại bỏ (s) và (aq)
		$equation=str_replace("(s)","", $equation);
		$equation=str_replace("(aq)","", $equation);
		$equation=str_replace("(g)","", $equation);
		$equation=str_replace(" ","", $equation);
		return $equation;
	}
}
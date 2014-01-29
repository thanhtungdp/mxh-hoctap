<?php
class GetEquationController2{
    //A B C D E F G H I J K L M N O P Q R S T U V W
    public $url="http://www.gregthatcher.com/Chemistry/BalanceEquation/W";
    public function GetEquationController(){
        $data=cUrlController::getPage($this->url,"",30,1);
        $dom=new domDocument('1.0','utf-8');
        @$dom->loadHTML($data);
        $tables=$dom->getElementsByTagName("table");
        $trs=$this->repeatForEach($tables,"tr",4);
        var_dump($trs);
        $i=0;
        foreach($trs as $tr){
            
            if($i!=0){
                $td=$tr->getElementsByTagName("td");
                echo $td->item(1)->nodeValue." <br/>";
                $not_balanced=EquationController::replaceEquation(trim($td->item(0)->nodeValue));
                $balanced=EquationController::replaceEquation(trim($td->item(1)->nodeValue));

                if(ChemistryEquation::where("equation",'=',$not_balanced)->where("balancedEquation",'=',$balanced)->count()==0)
                {
                    //echo $td->item(1)->nodeValue." <br/>";
                    $equation=ChemistryController::addEquation($not_balanced,$balanced);
                    $equation_id=$equation->id;
                    //Example   Fe + Cl2 = FeCl3     and     2Fe + 3Cl2 = 2FeCl3
                    $tachchat=new SeparationEquationController($not_balanced);
                    $tachchat->updateDatabase($equation_id);
                    //Tách chất và đưa vào CSDL
                }
            }
            $i++;
        }
        echo $i;
    }
    
    function repeatForEach($elements,$tag_element_name,$element_index=0){
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
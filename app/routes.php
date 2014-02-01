<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
function getTitle(){
	return " Mạng xã hội học tập ";
}
Route::get('/',function(){
	return View::make('home');
});
Route::controller('tai-khoan','UserController');

Route::get('callback',function(){
	return View::make('test');
});

Route::filter('has-user',function(){
	if(Session::has('user'))
		return Redirect::to('trac-nghiem');
});
Route::filter('not-has-user',function(){
	if(!Session::has('user'))
		return Redirect::to('tai-khoan/dang-nhap');
});
Route::filter('admin',function(){
	if(UserController::getSessionGroup()!="admin")
		return 1;
});
Route::get('trac-nghiem',function(){
	return View::make("tracnghiem.home");
});
Route::group(array("prefix"=>"trac-nghiem"),function(){
	Route::get('danh-sach-trac-nghiem',function(){
		$data_chude=array();
		if(!isset($_GET['getJSON']))
			$data_chude=TracNghiemChuDe::orderBy('id','DESC')->where('kiem_duyet',1)->get();
		else
			return ChuyenMucController::getChudeJSON(TracNghiemChuDe::orderBy('id','DESC')->where('kiem_duyet',1)->get());

		return View::make("tracnghiem.list-quiz")->with('data_chude',$data_chude);
	});
	Route::get("lam-trac-nghiem/{chude_url}/{id?}",function($chude_url,$id=null){
		if($id!=null){
			if(TracNghiemController::checkChudeById($id)){
				//Kiểm tra có tồn tại ID
				//Chuyển URL
				// database    1     |   trac-nghiem
				// url 			trac-ngh/1		=> false
				// chang url 	trac-nghiem/1
				if(!TracNghiemController::checkChudeByIdUrl($id,$chude_url)){
					$chude_url=TracNghiemController::getUrlChudeById($id);
					return Redirect::to(Asset("trac-nghiem/lam-trac-nghiem/{$chude_url}/{$id}"));
				}
			}
		}
		else{
			$id=TracNghiemController::getIdChudeByUrl($chude_url);
		}
		$data_cauhoi=LamTracNghiemController::getRandomCauHoi($chude_url,$id);
		
		//Tạo ngẫu nhiên câu hỏi
		return View::make('tracnghiem.do-quiz')->with('data_cauhoi',$data_cauhoi)->with('chude_id',$id);
	});

	Route::get("tao-he-thong-trac-nghiem",array('before'=>'not-has-user',function(){
		return View::make("tracnghiem.create-quiz");
	}));
	Route::post("tao-he-thong-trac-nghiem",array('before'=>'not-has-user','uses'=>"TaoTracNghiemController@insert"));

	Route::get('chuyen-muc/{chuyenmuc_url}/{id?}',function($chuyenmuc_url,$id=null){
		if(!isset($_GET['getJSON'])){
			$data_chude=ChuyenMucController::getChudeInChuyenMuc($chuyenmuc_url,$id);
			return View::make('tracnghiem.list-quiz')->with('data_chude',$data_chude)->with('chuyenmuc_id',$id);
		}
		else return ChuyenMucController::getChudeJSON(ChuyenMucController::getChudeInChuyenMuc($chuyenmuc_url,$id));
	});
	Route::get("tim-kiem/{search}/{chuyenmuc_id?}",function($search,$chuyenmuc_id=null){
		if(isset($_GET['getJSON']))
			return TimKiemController::TracNghiemTimKiemJSON($search,$chuyenmuc_id);
		
		$data_chude=TimKiemController::TracNghiemTimKiem($search,$chuyenmuc_id);
		return View::make('tracnghiem.list-quiz')->with('data_chude',$data_chude)->with('text_search',$search);
	});
});

/* Hóa học */
Route::get('hoa-hoc',function(){
	return View::make("hoahoc.find-equations");
});
Route::group(array("prefix"=>"hoa-hoc"),function(){

	Route::get("tim-kiem-pt",function(){
		return View::make("hoahoc.find-equations");
	});
	Route::get("tim-kiem-pt/{chatThamGia?}/{chatTaoThanh?}",function($chatThamGia=null,$chatTaoThanh=null){
		$pt=new FindEquationController($chatThamGia,$chatTaoThanh);
		$data['input_chatThamGia']=trim($chatThamGia);
		$data['input_chatTaoThanh']=trim($chatTaoThanh);
		$data['equations']=$pt->getEquations();
		if(isset($_GET['getJSON']))
			return $pt->getJSON();
		return View::make("hoahoc.find-equations",$data);
	});
	Route::post("tim-kiem-pt",function(){
		$thamgia=trim(Input::get('chatThamGia'));
		$taothanh=trim(Input::get('chatTaoThanh'));
		$pt=new PhuongTrinhHoaHocController($thamgia,$taothanh);
		return $pt->returnJSON();
	});

	Route::get("can-bang-pt",function(){
		return View::make("hoahoc.balanced-equation");
	});
	Route::get("can-bang-pt/{equation?}",function($equation=null){
		$balanced=new BalancedEquationController($equation);
		$data['input_balanced']=$equation;
		$data['balanced_equation']=EquationController::ConvertEquation($balanced->getBalancedEquation());
		return View::make("hoahoc.balanced-equation",$data);
	});
	Route::post("can-bang-pt",function(){
		$balanced=new BalancedEquationController(Input::get("equation"));
		return json_encode(EquationController::ConvertEquation($balanced->getBalancedEquation()));
	});
	Route::get("chuoi-phan-ung",function(){
		return View::make("hoahoc.chain-reaction");
	});
	Route::get("chuoi-phan-ung/{chuoiPhanUng?}",function($chuoiPhanUng=null){
		$chuoi=new ChainReactionController($chuoiPhanUng);
		$data['input_chainReaction']=$chuoiPhanUng;
		$data['chainReactions']=$chuoi->returnArray();
		return View::make("hoahoc.chain-reaction",$data);
	});
	Route::post("/chuoi-phan-ung",function(){
		$chuoiphanung=trim(Input::get("chuoiPhanUng"));
		$chuoi=new ChainReactionController($chuoiphanung);
		return $chuoi->returnJSON();
	});

	Route::get("bang-tuan-hoan",function(){
		return View::make("hoahoc.periodic-table");
	});
	Route::get('getThulium',function(){
		$thuliums=array();
		foreach (ChemistryController::getAllThulium() as $thulium) {
			$thuliums[]=$thulium->thuliumName;
		}
		return json_encode($thuliums);
	});
});
Route::group(array("prefix"=>'test'),function(){
	Route::get("find",function(){
		$find=new FindEquationController("Fe O2");
		$find->getEquations();
		/*foreach($find->byChatThamGia() as $id){
			echo ChemistryEquation::get_equation($id)->phuong_trinh."<br/>";
		}*/
	});
});
Route::group(array("prefix"=>'get'),function(){
	Route::get('/',function(){
		return View::make("ajax");
	});
	Route::get("thuliums",function(){
		$get=new GetThulium();
		$get->get_of_pages();
		
	});
	Route::get("get-chat",function(){
		$id=array(620,858,881,890,1258,1275,1418,1458,1541,1549,1551,1557,1917,2080,2218,2229,2239,2243,2281,2337,2399,2438,2588,2591
			,1256,1266,1876,2577,2769,2770);
		$data=array();
		foreach(ChemistryThulium::select(array('ctpt','id'))->get() as $v){
			if(!in_array($v->id, $id))
				$data[]=$v->ctpt;
		}
		return json_encode($data);
	});
	Route::post("equations",function(){
		//$thulium=Input::get("thulium");
		$equation=new GetEquations();
		return $equation->get_equations(Input::get("thulium"));
		//$equation->get_equation("http://phuongtrinhhoahoc.com/?reactant_search=Ag&product_search=");
		/*$spa=new SeparationEquationController();
		$equation['phuong_trinh']="Fe + Cl2 FeCl2";
		$spa->Separation($equation);*/
	});
	Route::get("test",function(){
		//$thulium=Input::get("thulium");
		
		$data=array("Ca(NO3)2","Cl2","H2O","H2SO4","K2S","HNO3","KCl","Mg(NO3)2","Na2S2O3","NaOH","O2","SiO2");
		//return $equation->get_equations("AlCl3");
		$equation=new GetEquations();
		return $equation->get_equations("O2");
		//$equation->get_equation("http://phuongtrinhhoahoc.com/?reactant_search=Ag&product_search=");
		/*$spa=new SeparationEquationController();
		$equation['phuong_trinh']="Fe + Cl2 FeCl2";
		$spa->Separation($equation);*/
	});
	Route::get("delete",function(){
		//ChemistryThulium::truncate();
		ChemistryEquation::truncate();
		ChemistryChatTaoThanh::truncate();
		ChemistryChatThamGia::truncate();
	});
});
Route::group(array("prefix"=>'admin','before'=>'admin'),function(){
	Route::get('/',function(){
		return View::make('admin.list-chude');
	});
	Route::get('tao-chuyen-muc',function(){
		return View::make("admin.create-category");
	});
	Route::post('tao-chuyen-muc',function(){

		$chuyenmuc=Input::get('chuyenmuc');
		AdminController::insertTracNghiemChuyenmuc($chuyenmuc);
		return View::make("admin.create-category");
	});
	Route::get('danh-sach-chu-de',function(){
		
	});
	Route::get('duyet-chu-de',function(){
		return View::make('admin.list-chude');
	});
	Route::post('kiem-duyet-chu-de',function(){
		$chude=TracNghiemChuDe::find(Input::get('chude_id'));
		$chude->kiem_duyet=1;
		$chude->save();
	});
});
Route::get("search/{search?}",function($search=null){
	$sql="SELECT * FROM tracnghiem_chude WHERE MATCH(chu_de,tu_khoa) AGAINST('{$search}' IN BOOLEAN MODE) ORDER BY ROUND(MATCH(chu_de,tu_khoa) AGAINST('{$search}'), 7) DESC";
	$data=DB::select($sql);
	foreach($data as $d){
		print_r($d);echo "<br/>";
	}
});
/*Route::get("install",function(){
	/*Schema::create("tracnghiem-chuyenmuc",function($table){
		$table->increments("id");
		$table->text("chuyen_muc",200);
		$table->text("url");
		$table->timestamps();
	});

	Schema::create("articles",function($table){
		$table->increments("id");
		$table->text("title",200);
		$table->text("body");
		$table->timestamps();
	});
	
/*Schema::create("chude2",function($table){
		$table->increments("id");
		$table->text("chu_de",200);
		$table->string("url");
		$table->text("tu_khoa");
		$table->integer("chuyenmuc_id");
		$table->integer("author_id");
		$table->timestamps();
	});
DB::statement("ALTER TABLE chude2 ENGINE=MyISAM");
DB::statement("ALTER TABLE chude2 ADD FULLTEXT(chu_de,tu_khoa)");
Schema::table('tracnghiem_chude', function($table)
{
    $table->integer("kiem_duyet")->default(0);
});	
	/*Schema::create("tracnghiem-cauhoi",function($table){
		$table->increments("id");
		$table->text("noi_dung");
		$table->text("cau_a");
		$table->text("cau_b");
		$table->text("cau_c");
		$table->text("cau_d");
		$table->text("dap_an");
		$table->integer("chude_id");
		$table->timestamps();
	});
});
Route::get("delete",function(){
	TracNghiemChuDe::truncate();
	TracNghiemCauHoi::truncate();
});
Route::get("drop",function(){
	Schema::drop("tracnghiem_chude");
	//chema::drop("tracnghiem-chude");
	//Schema::drop("tracnghiem-cauhoi");
});
*/
Route::get('curl/get-trac-nghiem',function(){
	$tracnghiem=new GetTracNghiem();
	$tracnghiem->getPage();
});
Route::get("test",function(){
	$a="";
	if(empty($a))
		echo "Rỗng";
});
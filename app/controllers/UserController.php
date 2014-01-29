<?php
class UserController extends BaseController{
	protected $layout = "user.main";
	function __construct(){

	}
	public function getIndex(){
		$data_list=TracNghiemController::getChudeByAuthorId(UserController::getSessionId());
		return View::make('user.list-quiz')->with('data_list',$data_list);
	}
	public function getDangXuat(){
		Session::forget('user');
		return Redirect::to('trac-nghiem');
	}
	public function getDangKy(){
		 $this->layout->content = View::make('user.register');
	}
	public function getCaptcha(){
		$text = rand(10000,99999);
	    Session::put('captcha',$text);
	    $height = 30;
	    $width = 65;
	    $image_p = imagecreate($width, $height);
	    $black = imagecolorallocate($image_p, 255, 255, 255);
	    $white = imagecolorallocate($image_p, 41, 128, 185);
	    $font_size = 14;

	    imagestring($image_p, $font_size, 5, 5, $text, $white);
	    imagejpeg($image_p, null, 80);
	}
	public function postKiemTraDangKy(){
		$errors=array();
		if(User::where('username','=',Input::get('username'))->get()->count()>0)
			$errors[]="Tài khoản này đã tồn tài";
		if(User::where('email','=',Input::get('email'))->get()->count()>0)
			$errors[]="Email này đã tồn tại";
		if(Input::get('captcha')!=Session::get('captcha'))
			$errors[]="Mã xác nhận không đúng";
		if(count($errors)==0){
			$user=new User();
			$user->username=Input::get('username');
			$user->password=sha1(md5(Input::get('password')));
			$user->email=Input::get('email');
			$user->save();
		}
		return json_encode($errors);
	}

	public function getDangNhap(){
		$this->layout->content=View::make('user.login');		
	}
	public function getDanhSachTracNghiem(){
		$data_list=TracNghiemController::getChudeByAuthorId(UserController::getSessionId());
		return View::make('user.list-quiz')->with('data_list',$data_list);
	}

	public function postDangNhap(){
		$username=Input::get('username');
		$password=sha1(md5(Input::get('password')));

		//Get column or email
		if(filter_var($username, FILTER_VALIDATE_EMAIL))
			$column='email';
		else $column='username';
		

		if(User::where($column,'=',$username)->where('password','=',$password)->get()->count()>0){
			foreach(User::where($column,'=',$username)->get() as $u){
				$user['username']=$u->username;
				$user['id']=$u->id;
				$user['group']=$u->group;
			}
			Session::put('user',$user);
			return Redirect::to("trac-nghiem");

		}
		else{
			return View::make('user.login')->with('error','Tài khoản hoặc mật khẩu không đúng');
		}
	}
	public static function getSessionUsername(){
		$data=Session::get('user');
		return $data['username'];
	}
	public static function getSessionId(){
		$data=Session::get('user');
		return $data['id'];
	}
	public static function getUsernameById($id){
		foreach(User::where('id','=',$id)->get() as $user){
			return $user->username;
		}
	}
	public static function getSessionGroup(){
		$data=Session::get('user');
		return $data['group'];
	}
	public static function getUsernameByChudeId($chude_id){
		foreach(TracNghiemController::getChudeById($chude_id) as $chude)
			$id=$chude->author_id;
		return UserController::getUsernameById($id);
	}
	
}
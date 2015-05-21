<?php
class UserController extends BaseController{

	private $salt = 'mangoo'; 

	public function getToken(){
		$mobile = Input::get('mobile');
		$password = Input::get('password');
		if(self::check($mobile, $password)){
			$token = Token::firstOrCreate(array('mobile' => $mobile));
			if($token->token == null){
				$token->token = md5(md5($mobile) .  $this->salt);
				$token->uid = Auth::user()->id;
				$token->save();
			}
			return $token->token;
		}else{
			return json_encode(array('msg','user login fail'));
		}
        
	}

	private function check($mobile, $password){
		if(Auth::validate(array('mobile' => $mobile, 'password' => $password))){
			return true;
		}else{
			return false;
		}
	}

	public function updateToken(){
		$uid = Auth::user()->id;
		$mobile = Auth::user()->mobile;
		Token::where('uid', $uid)->update('token',md5(md5($mobile) .  $this->salt));
	}

	public function register(){
		$mobile = Input::get('mobile');
		$password = Input::get('password');
		if($mobile == "" || $password == ""){
			return Redirect::back()->with('msg','info lost');
		}else{
			$user = User::create(array(
				'mobile'	=>	$mobile,
				'password'	=>	Hash::make($password)
				));
			$user->save();
			return 'ok';
		}
	}

	public function login(){
		$mobile = Input::get('mobile');
		$password = Input::get('password');
		if($mobile == "" ||$password == ""){
			return Redirect::back()->with('msg', 'info lost');
		}else{
			if(Auth::attempt(array('mobile' => $mobile, 'password' => $password))){
				return 'login success !';
			}
		}
	}

	public function status(){
		if(Auth::check()){
			return 'already log in';
		}else{
			return 'not log in';
		}
	}

	public function logout(){
		Auth::logout();
		return 'log out';
	}
}
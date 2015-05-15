<?php
class UserController extends BaseController{

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
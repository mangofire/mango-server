<?php
class NotificationController extends BaseController{

	/*
	*	rec-msg //收到短信
	*	call-in-miss //未接来电
	*
	*/

	public function all(){
		$notifi = Notification::all();
		return json_encode($notifi);
	}

	public function store(){

		$token = Input::get('token');
		$mobile = Input::get('mobile');
		$fri = Contact::where('mobile', $mobile)->get();
		if(count($fri) > 0){
			$name = $fri->name;
		}else{
			$name = null;
		}
		$type = Input::get('type') == 0? 'rec-msg' : 'call-in-miss';
		$is_read = 0;
		$notification = Notification::create(array(
			'uid'		=>		$uid,
			'mobile'	=>		$mobile,
			'from'		=>		$name
			'type'		=>		$type
			'is_read'	=>		$is_read
			));
		if($notification != null){
			return json_encode(array('msg' => 'insert a notification success'));
		}else{
			return json_encode(array('msg' => 'insert a notification fail'));
		}
	}

	public function no_read(){
		$noti_no_read = Notification::where('is_read', '0')->get();
		return json_encode($noti_no_read);
	}

	public function set(){
		$nid = Input::get('nid');
		self::set_read(Notification::where('id', 'nid'));
		return json_encode(array('msg', 'success'));
	}

	private function set_read($noti){
		$noti->is_read = 1;
		$noti->save();
		return ;
	}
}
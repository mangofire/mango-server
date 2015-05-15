<?php
class SMSController extends BaseController{

	public function uploadSMSPage(){
		return View::make('upload');
	}

	public function getAll(){
		if(!Auth::check()){
			return Response::json(array('msg' => 'not login'));
		}
		$SMS = SMS::where('uid',Auth::user()->id)
				// ->whereIn('address', array('13269724359','10086'))
				->get()->toArray();
		return self::sortSMS($SMS);
		return $SMS;
	}

	/*
	*	信息分类 按照发信息的人
	*/
	function sortSMS($origin){
		$all_arr = array();
		$sorted = array();
		// print count($origin);
		foreach ($origin as $key => $value) {
			# code...
			if(!in_array($value['address'], $all_arr)){
				$sorted[$value['address']] = array();
				array_push($all_arr, $value['address']);
			}
			array_push($sorted[$value['address']], $value);
		}
		// print count($all_arr);
		return json_encode($sorted);
	}

	/*
	*	删除号码开头的+86
	*/
	function trimContact(){
		$SMS = SMS::all();
		$pattern = "/^+86$/";
		foreach ($SMS as $item ) {
			# code...
			if(starts_with($item->address, '+86')){
				
				$item->address = substr($item->address, 3);
				$item->save();
				Log::info($item->address);
			}
		}
		return 'well done !';
	}

	/*
	*	@处理上传短信XML
	*/
	public function uploadSMS(){
		if(Input::hasFile('SMS')){
			$file = Input::file('SMS');
			$storge_path = __DIR__."/../storage/upload";
			if(File::exists($storge_path)){
			}else{
				if(!File:: makeDirectory($storge_path)){
					return '创建文件夹失败';
				}
			}
			//return $file->getClientOriginalName();
			$file->move($storge_path, '001test.xml');

			return 'upload success';
		}else{
			return "请选择文件";
		}
	}


	/*
	*	@解析短信记录XML
	*/
	public function parseSMSXML($file = __DIR__){
		if($file == __DIR__){
			$file = __DIR__."/../storage/upload/001test.xml";
		}
		$doc = new DOMDocument();
		$doc->load($file);
		$SMS_arr = $doc->getElementsByTagName("SMS");
		$SMS_DB = null;
		$f = true;
		foreach ($SMS_arr as $sms ) {
			# code...
			$time = $sms->getElementsByTagName('Date')->item(0)->nodeValue;
			$type = $sms->getElementsByTagName('Type')->item(0)->nodeValue;
			$content = $sms->getElementsByTagName('Body')->item(0)->nodeValue;
			$address = $sms->getElementsByTagName('Address')->item(0)->nodeValue;
			if($time == null || $type == null
				|| $content == null || $address == null){
				dd("error");
			}
			if($f == true){
				$tem = SMS::create(array(
				'uid'		=>		Auth::user()->id,
				'content'	=>		$content,
				'type'		=>		$type,
				'is_read'	=>		'Y',
				'address'	=>		$address,
				'time'		=>		$time
				));
				$tem->save();
				Log::info(json_encode($tem));
			}else{
				$SMS_DB = SMS::where('time', $time)
							->where('content', $content)
							->update(array('from' => $from,
										'uid'	=>	Auth::user()->id));
			}
		}
		return $f ? 'create over' : 'update over';
	}
}
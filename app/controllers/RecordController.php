<?php 
class RecordController extends BaseController{

	public function insertPage(){
		return View::make("uploadpages.putcontact");
	}

	public function getall(){
		$uid = Auth::user()->id;
		$records = Record::where('uid', $uid)->get()->toArray();
		// $trimed = self::sortRec($records);
		return json_encode($records);
	}

	private function sortRec($rec){
		$index = array();
		$ret = array();
		foreach ($rec as $key => $value) {
			if(!in_array($value['mobile'], $index)){
				array_push($index, $value['mobile']);
				$ret[$value['mobile']] = array();
			}
			array_push($ret[$value['mobile']], (array)$value);
		}
		return $ret;
	}

	public function put(){
		$data = Input::get('data');
		$data = json_decode($data);
		$uid = Auth::user()->id;
		foreach ($data as $key => $value){
			$type = $value->type;
			$name = $value->name;
			$mobile = $value->mobile;
			$time = $value->time;
			$howlong = $value->howlong;
			$reco = Record::create(array(
				'uid'		=>		$uid,
				'type'		=>		$type,
				'name'		=>		$name,
				'mobile'	=>		$mobile,
				'time'		=>		$time,
				'howlong'	=>		$howlong
				));
			// Log::info($reco);
			// $reco->save();
		}
		return 'loged';
	}

	public function trimType(){

		$records = Record::all();
		foreach ($records as $key => $value) {
			$type = $value->type;
			$type = substr($type, 5);
			$value->update(array(
					'type'		=>		$type
				));
		}
		return 'done';
	}

}
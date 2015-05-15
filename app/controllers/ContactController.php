<?php
class ContactController extends BaseController{
	
	public function uploadPage(){
		return View::make('uploadpages.uploadContacts');
	}

	public function getall(){
		$uid = Input::get('uid');
		$contacts = Contact::where('uid',$uid)->get()->toArray();
		return json_encode($contacts);
	}

	public function upload(){
		if(!Input::hasFile('contacts')){
			return 'no file upload ';
		}else{
			$file = Input::file('contacts');
			$storge_path = __DIR__."/../storage/upload";
			if(!File::exists($storge_path)){
				if(!File:: makeDirectory($storge_path))
					return '创建文件夹失败';
			}
			//return $file->getClientOriginalName();
			$file->move($storge_path, 'contact.vcf');
			return 'upload success';
		}
	}

	public function parseVcf(){
		
		$file = __DIR__."/../storage/upload/contact.vcf";
		$vcard = new vCard($file);
		echo count($vcard).'<br>';
		$h = 0;
		foreach ($vcard as  $value) {
			# code...
       		if(count($value->tel) == 0){
       			continue;
       		}
       		$h++;
       		$name = $value->N[0]['FirstName'].$value->N[0]['LastName'];
       		// echo $value->tel[0]['Value'];
       		$flg = Contact::create(array(
       						'uid'		=>		Auth::user()->id,
       						'mobile'	=>		$value->tel[0]['Value'],
       						'name'		=>		$name,
       					))->save();
       		if($flg){
       			echo $name."insert !";
       		}
       		echo "<br>";
		}
		return 'done';
	}

	public function trimContact(){
		$contacts = Contact::all();
		foreach ($contacts as $key => $value) {
			# code...
			if(starts_with($value->mobile,"+86")){
				$value->update(array(
					'mobile'	=>	substr($value->mobile, 3)
					));
			}
		}
		return 'done';
	}
}
<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//Eloquent::unguard();

		//$this->call('UserTableSeeder');
		$this->call('SMSTableSeeder');
	}

}

class SMSTableSeeder extends Seeder{
	public function run(){
		SMS::create(array('id'=>1));
	}
}

class UserTableSeeder extends Seeder{
	public function run(){
		DB::table('users')->insert(array('id'		=> '3',
										'username'	=>	'004',
										'password'	=>	Hash::make('mango'),
										'mobile'	=>	self::gen_mobile(),
										));
		/*User::create(array('username'	=>	'002',
							'password'	=>	Hash::make('mango'),
							'mobile'	=>	self::gen_mobile()));*/
	}

	private function gen_mobile(){
		$twoArr = array(3,5,8);  //手机号的第二位
		$tArr = array(0,1,2,3,4,5,6,7,8,9);    //手机号第二位为3时，手机号的第3位数据集，以及手机号的第4位到第11位
		$ntArr = array(0,1,2,3,5,6,7,8,9); 
		$phone[0] = 1;                      //手机号第一位必须为1
		for($j=1;$j<11;$j++){
			if($j == 1){
			   $t = rand(0,2);          //随机生成手机号的第二位数字
			   $phone[$j] = $twoArr[$t];		   
			}elseif($j==2 && $phone[1] != 3){     //当第二位不为3时，随机生成其余手机号
			   $th = rand(0,8);
			   $phone[$j] = $ntArr[$th];
			}else{                                         //当第二位为3时，随机生成其余手机号
				$th = rand(0,9);
				$phone[$j] = $tArr[$th];
			}
		}
		return implode("", $phone);
	}
}
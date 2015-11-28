<?php namespace App\Core;

Use App\Core\Database\Database;


class Validator  {

	protected static $ctrl;
	
	public function __construct(){
	}
	public static function getCtrl(){
		return self::$ctrl;
	}

	public static function is_empty($input){
		return (isset($input))?true:false;
	}

	public static function array_has_empty($array){
		foreach ($array as $key=>$value){
			if(self::is_empty($value)){
				return false;
			} 
		}
		return true;
	}
	

	public static function is_equal($input, $input1){
		return $input == $input1;
	}

	public static function is_connected($user){
		return Session::get($user);
	}                                                           

	public static function is_registered($user, $table='tusers'){ 
		$db =  new Database(DB_NAME,DB_USER, DB_PASS, DB_HOST, $db_type = 'mysql');
		if (is_array($user)){
			$mail = $user['mail'];
			$pass = md5($user['password']);
			$sql ='SELECT * FROM '. $table.' WHERE mail= "'.$mail.'" AND password = "'.$pass.'"';
		}else {
			$sql ='SELECT mail FROM '. $table.' WHERE mail= "'.$user.'"';
		}   
		return $db->query($sql);
	}



}

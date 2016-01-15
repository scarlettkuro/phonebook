<?php
class UserController {
	
	//API
	
	static function index() {
		return json(UserStorage::getUsers());
	}
		
	static function get($id) {
		return json(UserStorage::getUser($id));
	}
		
	static function post() {
		$user = new User();
		$user->setName("dont give a shit");
		$user->setPhoneNumber("");
		return json(UserStorage::createUser($user));
	}
		
	static function put($id) {
		$user = new User();
		$user->setID($id);
		$user->setName("NEW " . $id);
		$user->setPhoneNumber("");
		return json(UserStorage::updateUser($user));
	}
		
	static function remove($id) {
		return "delete";
	}
		
	static function search($name) {
		return "delete";
	}
}

?>

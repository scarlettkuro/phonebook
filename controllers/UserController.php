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
		$json_user = json_decode($_POST['data'], true);
		$user = new User();
		$user->setName($json_user['name']);
		$user->setPhoneNumber($json_user['phoneNumber']);
		UserStorage::createUser($user);
	}
		
	static function put($id) {
		$json_user = json_decode($_POST['data'], true);
		$user = new User();
		$user->setID($id);
		$user->setName($json_user['name']);
		$user->setPhoneNumber($json_user['phoneNumber']);
		UserStorage::updateUser($user);
	}
		
	static function remove($id) {
		UserStorage::removeUser($id);
	}
		
	static function search($name) {
		return json(UserStorage::searchByName($name));
	}
}

?>

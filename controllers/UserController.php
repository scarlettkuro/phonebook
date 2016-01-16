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
		$json_user = json_decode(file_get_contents('php://input'));
		$user = new User();
		$user->setName($json_user['name']);
		$user->setPhoneNumber($json_user['phoneNumber']);
		UserStorage::createUser($user);
	}
		
	static function put($id) {
		$user = new User();
		$user->setID($id);
		$user->setName("NEW " . $id);
		$user->setPhoneNumber("");
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

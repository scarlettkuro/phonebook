<?php

class UserStorage {
	
	//path to json storage
	private static $db_filename = 'database.json';
		
	//load json as nested arrays
	static private function load() {
		$json = file_get_contents(self::$db_filename);
		return json_decode($json, true); 
	}
	
	//save nested array as json
	static private function save($db) {
		file_put_contents ( self::$db_filename, json_encode($db));
	}
	
	//convert nested array to object
	static private function getUserFromJSON($json) {
		$user = new User();
		$user->setID($json['id']);
		$user->setName($json['name']);
		$user->setPhoneNumber($json['phoneNumber']);
		
		return $user;
	}
	
	// public CRUD
	
	//return user with id as object
	
	static function getUser($id) {
		$db = self::load();
		$json_users = $db['users'];
		//find user
		foreach($json_users as $json_user)		
			if ($json_user['id'] == $id)
				return self::getUserFromJSON($json_user);
			
		return null;
	}
	
	//return all users as objects
		
	static function getUsers() {
		$db = self::load();
		$json_users = $db['users'];
		$users = array();
		
		//convert all users to objects
		foreach($json_users as $json_user)
			array_push($users,self::getUserFromJSON($json_user));
		
		return $users;
	}
	
	//create new id and save object with it
	
	static function createUser($user) {
		$db = self::load();
		$json_users = $db['users'];
		$id = $db['users'][0]['id'];
		
		//find max id		
		foreach($json_users as $json_user)
			if ((int)$json_user['id'] > $id)
				$id = (int)$json_user['id'];
		
		$id += 1; //make unique id
		$user->setID($id);
		
		//add new user to nested array with users		
		array_push($db['users'],json_decode(json_encode($user)));
		
		self::save($db);
		
		return $id;
	}
	
	//update user with by his id
	
	static function updateUser($user) {
		$db = self::load();
		$json_users = $db['users'];
		
		//find user
		foreach($json_users as $id=>$json_user)
			if ((int)$json_user['id'] == $user->getID()) {
				
				//replace all with the data from object
				$db['users'][$id] = json_decode(json_encode($user));
				
				break;
			}
		
		self::save($db);
	}
	
	//remove object
	
	static function removeUser($id) {
		$db = self::load();
		foreach($db['users'] as $index=>$json_user)
			if ((int)$json_user['id'] == $id)
				unset($db['users'][$index]);
				
		self::save($db);
	}
	
	
	//other services
		
	static function searchByName($name) {
		$db = self::load();
		$json_users = $db['users'];
		//find user
		foreach($json_users as $json_user)		
			if ($json_user['name'] == $name)
				return self::getUserFromJSON($json_user);
			
		return null;
	}
	
}
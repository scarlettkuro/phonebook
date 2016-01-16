var app = angular.module('App',[]);

app.controller('UserController', function($scope, $http) {
	
	$scope.edit = false;
	$scope.onEdit = function (user, edit) {
		if (edit == true) {
			//	alert(user.name);
			$scope.updateUser(user);
		}
		return !edit;
	};
	
	$scope.users = []; //array for view table
	
	//repository for users
	var userStorage = new UserStorage($http);
	
	$scope.createUser = function() {
		var user = {"name": $scope.new_name, "phoneNumber" : $scope.new_phoneNumber};
		var promise = userStorage.createUser(user);
		promise.success(function(data) {
			$scope.getUsers();
		});
		
	};
	
	$scope.updateUser = function(user) {
		var promise = userStorage.updateUser(user);
		promise.success(function(data) {
			$scope.getUsers();
		});
	};
	
	$scope.removeUser = function(id) {
		var promise = userStorage.removeUser(id);
		promise.success(function(data) {
			$scope.getUsers();
		});
	};
	
	$scope.getUsers = function() {
		var promise = userStorage.getUsers();
		promise.success(function(data) {
			$scope.users = data;
		});
	};
	
	$scope.searchUser = function() {
		var promise = userStorage.searchUser($scope.search_name);
		promise.success(function(data) {
			$scope.users = [data];
		});
	};
	
	$scope.getUsers();
	
});

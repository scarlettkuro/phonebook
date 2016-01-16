var app = angular.module('App',[]);

app.controller('UserController', function($scope, $http) {
	
	$scope.users = []; //array for view table
	
	//repository for users
	var userStorage = new UserStorage($http);
	
	$scope.createUser = function() {
		var user = {"name": $scope.new_name, "phoneNumber" : $scope.new_phoneNumber};
		userStorage.createUser(user);
		$scope.getUsers();
	};
	
	$scope.updateUser = function() {
		var user = {"name": $scope.new_name, "phoneNumber" : $scope.new_phoneNumber};
		userStorage.updateUser(user);
		$scope.getUsers();
	};
	
	$scope.removeUser = function(id) {
		userStorage.removeUser(id);
		$scope.getUsers();
	};
	
	$scope.getUsers = function() {
		userStorage.getUsers(function (data) {
			$scope.users = data;
		});
	};
	
	$scope.getUsers();
	
});

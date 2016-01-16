/*
	AJAX repository based on Angular $http
	
	clientSuccess | clientError - a user of object
	can it's own callbacks for each action
*/
function UserStorage ($http) {
	
	this.getUsers = function(clientSuccess, clientError) {
		$http({
			url: "/api/users",
			method: "GET"
		}).success(function(data, status, headers, config) {
			clientSuccess(data, status, headers, config);
		}).error(function(data, status, headers, config) {
			this.status = status;
			clientError(data, status, headers, config);
		});
	};
	this.getUser = function(id, clientSuccess, clientError) {
		$http({
			url: "/api/users/" + id,
			method: "GET"
		}).success(function(data, status, headers, config) {
			clientSuccess(data, status, headers, config);
		}).error(function(data, status, headers, config) {
			clientError(data, status, headers, config);
		});
	};
	
	this.createUser = function(user, clientSuccess, clientError) {
		$http({
			url: "/api/users",
			method: "POST",
			data: user
		}).success(function(data, status, headers, config) {
			clientSuccess(data, status, headers, config);
		}).error(function(data, status, headers, config) {
			clientError(data, status, headers, config);
		});
	};
	this.updateUser = function(user, clientSuccess, clientError) {
		$http({
			url: "/api/users/" + user.id,
			method: "PUT",
			data: user
		}).success(function(data, status, headers, config) {
			clientSuccess(data, status, headers, config);
		}).error(function(data, status, headers, config) {
			clientError(data, status, headers, config);
		});
	};
	
	this.removeUser = function(id, clientSuccess, clientError) {
		$http({
			url: "/api/users/" + id,
			method: "DELETE"
		}).success(function(data, status, headers, config) {
			clientSuccess(data, status, headers, config);
		}).error(function(data, status, headers, config) {
			clientError(data, status, headers, config);
		});
	};
}
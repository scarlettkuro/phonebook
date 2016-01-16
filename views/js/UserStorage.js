/*
	AJAX repository based on Angular $http
	
	_method emulation 
	
	each method return a promise of action
*/

function serializeData(obj) {
	var str = [];
	for(var p in obj)
		if (obj.hasOwnProperty(p)) 
			str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
	
	return str.join("&");
}

function emulateRequest(req) {
	req.headers = { 'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'};
	if (req.method != "GET") {
		req.data = serializeData({'data' : JSON.stringify(req.data) , '_method' : req.method});
		req.method = "POST";
	}
	return req;
}
					
function UserStorage ($http) {
	
	this.getUsers = function() {
		return $http(emulateRequest({
			url: "/api/users",
			method: "GET"
		}));
	};
	this.getUser = function(id) {
		return $http(emulateRequest({
			url: "/api/users/" + id,
			method: "GET"
		}));
	};
	
	this.createUser = function(user) {
		return $http(emulateRequest({
			url: "/api/users",
			method: "POST",
			data: user
		}));
	};
	this.updateUser = function(user) {
		return $http(emulateRequest({
			url: "/api/users/" + user.id,
			method: "PUT",
			data: user
		}));
	};
	
	this.removeUser = function(id) {
		return $http(emulateRequest({
			url: "/api/users/" + id,
			method: "DELETE"
		}));
	};
}
<!DOCTYPE html>
<html lang="en" ng-app="App">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>REST PhoneBook</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  </head>
  <body>
	<div class = "container" ng-controller="UserController">
		<form class="form-inline">
		  <div class="form-group">
			<label for="name">Name</label>
			<input ng-model = "new_name" type="text" class="form-control" id="name" placeholder="Jane Doe">
		  </div>
		  <div class="form-group">
			<label for="phoneNumber">Phone</label>
			<input ng-model = "new_phoneNumber" type="text" class="form-control" id="phoneNumber" placeholder="Phone Number">
		  </div>
		  <button ng-click="createUser()" class="btn btn-default">Add</button>
		</form>
		<form class="form-inline">
		  <div class="form-group">
			<label for="name">Name</label>
			<input ng-model = "search_name" type="text" class="form-control" id="name" placeholder="Jane Doe">
		  </div>
		  <button ng-click="searchUser()" class="btn btn-default">Search</button>
		</form>
		<table class="table table-striped">
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>Phone</th>
				<th></th>
			</tr>
			<tr ng-repeat = "user in users">
				<td>
					{{user.id}}
					<span ng-click = "edit = onEdit(user, edit)" class="btn glyphicon glyphicon-pencil" aria-hidden="true"></span>
				</td>
				<td>
					<span ng-hide = "edit" >{{user.name}}</span>
					<input ng-show = "edit"  ng-model = "user.name" type="text" class="form-control" id="name">
				</td>
				<td>
					<span ng-hide = "edit" >{{user.phoneNumber}}</span>
					<input ng-show = "edit"  ng-model = "user.phoneNumber" type="text" class="form-control" id="phoneNumber">
				</td>
				<td>
					<span ng-click="removeUser(user.id)" class="btn glyphicon glyphicon-remove" aria-hidden="true"></span></td>
			</tr>
		</table>
	</div>
	
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0-rc.0/angular.min.js"></script>
    <script src="/js/UserStorage.js"></script>
    <script src="/js/app.js"></script>
  </body>
</html>
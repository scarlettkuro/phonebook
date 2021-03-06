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
	
		<div class="row marketing">
        <div class="col-lg-8 col-lg-offset-2">
		<div class="jumbotron">
			<h1>Phonebook</h1>
			<form class="form-inline">
			  <div class="form-group">
				<input ng-model = "search_name" type="text" class="form-control" placeholder="Jane Doe">
			  </div>
			  <button ng-click="searchUser()" class="btn btn-default">Search</button>
			  <span>{{search_status}}</span>
			</form>
		</div> 
		<table class="table table-striped">
			<tr>
				<td></td>
				<td><input ng-model = "new_name" type="text" class="form-control" id="name" placeholder="Jane Doe"></td>
				<td><input ng-model = "new_phoneNumber" type="text" class="form-control" id="phoneNumber" placeholder="Phone Number"></td>
				<td><button ng-click="createUser()" class="btn btn-default">Add</button></td>
			</tr>
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
		</div> 
	</div>
	
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.0-rc.0/angular.min.js"></script>
    <script src="/js/UserStorage.js"></script>
    <script src="/js/app.js"></script>
  </body>
</html>
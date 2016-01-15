<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>REST Test</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
  </head>
  <body>
		<div class = "container">
			<form action = "/api/users" method = "GET">
				<button type="submit" class="btn btn-primary">GET</button>
			</form>
			<form action = "/api/users" method = "POST">
				<button type="submit" class="btn btn-primary">POST</button>
				<input type="hidden" name="_method" value="POST"/>
			</form>
			<form action = "/api/users/2" method = "POST">
				<button type="submit" class="btn btn-primary">PUT</button>
				<input type="hidden" name="_method" value="PUT"/>
			</form>
			<form action = "/api/users" method = "POST">
				<button type="submit" class="btn btn-primary">DELETE</button>
				<input type="hidden" name="_method" value="DELETE"/>
			</form>
		</div>
    
  </body>
</html>
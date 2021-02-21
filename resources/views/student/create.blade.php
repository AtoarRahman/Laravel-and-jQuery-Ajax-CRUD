<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title>Laravel Image CURD</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	
</head>
<body>
<div class="container mt-3">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron">
				<h5>Student Create</h5>
				<hr/>
				<form method="POST" action="{{route('students.store')}}" enctype="multipart/form-data">
					@csrf
				  <div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" placeholder="Enter name" class="form-control">
				  </div>
				  <div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" placeholder="Enter email" class="form-control">
				  </div>
				  <div class="form-group">
					<label for="department">Department</label>
					<input type="text" name="department" placeholder="Enter department" class="form-control">
				  </div>
				  <div class="form-group">
					<label for="image">Image</label>
					<input type="file" name="image" class="form-control">
				  </div>
				  <button type="submit" class="btn btn-success btn-sm">Submit</button>
				  <a href="{{url('/')}}" class="btn btn-info btn-sm">Back</a>
				</form>
			</div>		
		</div>
	</div>
</div>

</body>
</html>
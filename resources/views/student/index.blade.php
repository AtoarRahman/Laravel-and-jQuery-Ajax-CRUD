<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel - Student List</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        </style>
    </head>
<body>


<div class="container mt-3">
	<div class="row">
		<div class="col-md-12">
			<h5 class="float-left">Student List</h5>
			<a class="btn btn-info float-right" href="{{url('/')}}">Back</a>
			<a class="btn btn-success float-right mr-2" href="{{route('students.create')}}">Add Student</a>
		</div>
		<div class="col-md-12">
			<table class="table mt-3">
			  <thead class="thead-dark">
				<tr>
				  <th scope="col">SL</th>
				  <th scope="col">Name</th>
				  <th scope="col">E-mail</th>
				  <th scope="col">Department</th>
				  <th scope="col">Image</th>
				  <th scope="col">Action</th>
				</tr>
			  </thead>
			  <tbody id="table_data">
		
			  </tbody>
			</table>
		</div>
	</div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">
	
	(function getImageData(){
		axios.get('/getStudentData')
		.then(function(response) {
			var uploadURL = 'uploads/';
			var studentURL = "students/";
			var editURL = "/edit";
			
			var jsonData = response.data;
			var html = '';
			jsonData.forEach(function(item, index){
				html += '<tr>'
				html +='<td>' + (index+1) + '</td>'
				html +='<td>' + item.name + '</td>'
				html +='<td>' + item.email + '</td>'
				html +='<td>' + item.department + '</td>'
				html +="<td><img class='table-img' width='25' src=" + uploadURL + item.image + "></td>"
				html +="<td><a class='btn btn-sm btn-primary' href=" + studentURL + item.id + editURL + ">Edit</a></td>"	
			})
			$('#table_data').html(html);
			
			/*
			$.each(jsonData, function(i, item) {
				$('<tr>').html(
					"<td>" + i + "</td>" +
					"<td>" + jsonData[i].name + "</td>" +
					"<td>" + jsonData[i].email + "</td>" +
					"<td>" + jsonData[i].department + "</td>" +
					"<td><img class='table-img' width='25' src=" + imageURL + jsonData[i].image + "></td>"
				).appendTo('#table_data');
			});
			*/
		})
		.catch(function(error) {
            
        });
	})();
	
</script> 
</body>
</html>

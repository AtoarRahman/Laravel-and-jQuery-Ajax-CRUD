@extends('Layout.app')
@section('title','Home')
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="jumbotron pt-4 mt-3">
				<h5>Student Update</h5>
				<hr/>
				<form method="POST" action="{{ route('students.update', $editData->id) }}" enctype="multipart/form-data">
					@csrf
					@if (isset($editData))
						@method('PUT')
					@endif
				  <div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" value="{{$editData->name}}" class="form-control">
				  </div>
				  <div class="form-group">
					<label for="email">Email</label>
					<input type="email" name="email" value="{{$editData->email}}" class="form-control">
				  </div>
				  <div class="form-group">
					<label for="department">Department</label>
					<input type="text" name="department" value="{{$editData->department}}" class="form-control">
				  </div>
				  <div class="form-group">
					<label for="image">Image</label>
					<div class="row">
						<div class="col-md-4">
							<input type="file" name="image" class="form-control">
						</div>
						<div class="col-md-8">
							<img src="{{ asset('uploads/'.$editData->image) }}" alt="" width="50" />
						</div>
					</div>
				  </div>
				  <button type="submit" class="btn btn-success btn-sm">Update</button>
				  <a href="{{route('students.index')}}" class="btn btn-info btn-sm">Back</a>
				</form>
			</div>		
		</div>
	</div>
</div>


@endsection
@section('script')
<script type="text/javascript">

</script>
@endsection

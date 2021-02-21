<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <style type="text/css">
		.sitebar{background: #343a40;bottom: 0;float: none; height: 100vh;left: 0;position: fixed;top: 0;padding: 30px; z-index: 2; padding-top:60px;}
		.bodycontent{background: #d6d6d6;float: none; width: 100%; height:60px; right: 0;position: fixed;top: 0; z-index: 1;}
		</style>
		
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

<div class="container-fluid">
	<div class="row">
		<div class="col-md-3 p-0">
			<div class="sitebar">
				<a class="btn btn-info mb-2" href="{{route('images.index')}}">Image List</a><br/>
				<a class="btn btn-primary mb-2" href="{{route('multiImages.index')}}">Multi Image List</a><br/>
				<a class="btn btn-success mb-2" href="{{route('students.index')}}">Student List</a>
			</div>
		</div>
		<div class="col-md-9 p-0">
		<div class="bodycontent"></div>
		</div>
		
	</div>
</div>
        </div>
    </body>
</html>

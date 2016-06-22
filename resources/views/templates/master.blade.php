<!DOCTYPE html>
<html>
    <head>
		
		<title>facemash</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css')}}">

    </head>
    <body>
    	@include('templates.partials.navigation')
		<div class="container">
			@yield('content')
		</div>
   
    </body>
</html>

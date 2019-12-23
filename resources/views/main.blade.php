<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="Cache-Control" content="no-cache">
    <!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
		@stack('head')

    <title>@section('title') Админка @show</title>
		
  </head>
  <body>
	<div class="container">
		<header class="blog-header py-3">
		<div class="row">
			<div class="col text-center">
				<h2>Админка</h2>
				<hr />
			</div>
		</div>
		</header>
		<div class="row">
			<div class="col"></div>        
			<div class="col-5">
				<h4></h4>
				<div id="app">    
          @section('content') @show
				</div>
			</div> 
			<div class="col"></div>
		</div>
	</div>

	<footer class="pt-4 my-md-5 pt-md-5 border-top">
		<div class="row">
			
		</div>
	</footer>
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	@stack('scripts')
  </body>
</html>	
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>403 Forbidden | Travellers Inn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="description" content="">
	<meta name="keywords" content="coco bootstrap template, coco admin, bootstrap,admin template, bootstrap admin,">
	<meta name="author" content="Huban Creative">

	<!-- Base Css Files -->
	<link href="{{ asset('admin-panel-assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
	<link href="{{ asset('admin-panel-assets/libs/animate-css/animate.min.css') }}" rel="stylesheet" />

	<link href="{{ asset('admin-panel-assets/css/style.css') }}" rel="stylesheet" type="text/css" />

</head>
<body class="fixed-left full-content">

<!-- Begin page -->
<div class="container">
	<div class="full-content-center animated flipInX">
		<h2>Travellers Inn</h2>
		<h1>403</h1>
		<h2>Forbidden</h2>
		<h2>The page you are looking You have Insufficient Permission to access this!</h2><br>
		<p class="text-lightblue-2">Please Contact Admin for further information:</p>
		{{--<p class="text-lightblue-2">You better try our awesome search:</p>--}}
		{{--<div class="row">--}}
			{{--<div class="icon-added input-group col-sm-8 col-sm-offset-2">--}}
				{{--<i class="fa fa-search"></i>--}}
				{{--<input type="text" class="form-control">--}}
				{{--<span class="input-group-btn">--}}
				        {{--<button class="btn btn-success" type="button">Search</button>--}}
				      {{--</span>--}}
			{{--</div>--}}
		{{--</div><br>--}}
		<a class="btn btn-primary btn-sm" href="{{ route('traveller-inn-home') }}"><i class="fa fa-angle-left"></i> Back to Dashboard</a>
	</div>
</div>
<script src="{{ asset('admin-panel-assets/libs/jquery/jquery-1.11.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin-panel-assets/libs/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
</body>
</html>
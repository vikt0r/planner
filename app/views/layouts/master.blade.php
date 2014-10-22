<!DOCTYPE html>
<!--[if lt IE 7 ]><html ng-app="GaanBazna" class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html ng-app="GaanBazna" class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html ng-app="GaanBazna" class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html  ng-app="GaanBazna" lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs
  ================================================== -->
	<meta charset="utf-8">
	<title>{{ Lang::get('common.site_title') }}</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Metas
  ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- CSS
  ================================================== -->
  	{{ HTML::style('/css/base.css') }}
  	{{ HTML::style('/css/skeleton.css') }}
  	{{ HTML::style('/css/layout.css') }}
  	@section('headsection')
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- Favicons
	================================================== -->
	<link rel="shortcut icon" href="images/favicon.ico">
	<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

</head>
<body>



	<!-- Primary Page Layout
	================================================== -->

	<!-- Delete everything in this .container and get started on your own site! -->
	<div class="offset-by-fourteen">
		@if( Auth::check() )
			<Label>{{ Auth::user()->email }}</Label>
		@else
			<button class="">Login</button>
		@endif
	</div>
	<div class="container">
		<div class="sixteen columns">
			<h2>{{ Lang::get('common.site_title') }}</h2>
		</div>
		<!-- Give column value in word form (one, two..., twelve) -->
		<div class="sixteen columns clearfix">
			@yield('content')
		</div>

 
		
	</div><!-- container -->

		<!-- javascript files -->
		{{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js') }}
		<!-- {{ HTML::script('https://ajax.googleapis.com/ajax/libs/angularjs/1.3.0-beta.5/angular.min.js') }} -->
		<!-- {{ HTML::script('//ajax.googleapis.com/ajax/libs/angularjs/1.2.0/angular-route.js') }} -->
		{{ HTML::script('//cdnjs.cloudflare.com/ajax/libs/handlebars.js/2.0.0-alpha.1/handlebars.min.js') }}
		
		@yield('footsection')

		<!-- end of javascript files -->
	
<!-- End Document
================================================== -->
	
</body>
</html>
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
    {{ HTML::style('/css/style.css') }}

  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

  <!-- Favicons
  ================================================== -->
  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

</head>
<body>

	<div class="wrapper">
		<div class="bazana"> @include('layouts._partials.audio-player')</div>
		<div class="headbar">
			<div class="logo">G</div>
			<div class="login">
				 @if( Auth::check() )
			        <Label>{{ Auth::user()->name }}</Label>
			        <a href="/logout"><button>Logout</button></a>
			      @else
			        @include('layouts.forms.login')
			      @endif
			</div>
		</div>
	 	<div class="leftcol">LEFT</div>
  		<div class="rightcol">RIGHT</div>
	</div>

</body>
</html>


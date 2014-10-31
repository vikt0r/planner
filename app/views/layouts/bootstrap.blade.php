<!DOCTYPE html>
<html  lang="en" >
  <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <title>Planners BD</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @section( 'headsection' )
        {{ HTML::style('css/libs/bootstrap/bootstrap.min.css') }}
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        {{ HTML::style('css/libs/bootstrap/styles.css') }}
    @show
  </head>
  <body data-ng-controller="SimpleController">
<nav class="navbar navbar-static">
    <div class="container">
      <a class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
        <span class="glyphicon glyphicon-chevron-down"></span>
      </a>
      <div class="nav-collapse collase">
        <ul class="nav navbar-nav">
          <li><a href="{{ URL::route('document.index') }}">Documents</a></li>
          <li><a href="{{ URL::route('document.create') }}">Add New</a></li>
        </ul>
        <ul class="nav navbar-right navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-search"></i></a>
            <ul class="dropdown-menu" style="padding:12px;">
                <form class="form-inline">
            <button type="submit" class="btn btn-default pull-right"><i class="glyphicon glyphicon-search"></i></button><input type="text" class="form-control pull-left" placeholder="Search">
                </form>
              </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> <i class="glyphicon glyphicon-chevron-down"></i></a>
            <ul class="dropdown-menu">
              <li><a href="#"></a></li>
            @if ( $currentUser )
              <li><a href="#">{{ $currentUser->email }}</a></li>
              <a href="{{ URL::to('/logout') }}"><input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Logout"></a>
            @else
                {{ Form::open( array( 'url' => '/login', 'method' => 'post' ) ) }}
              <li>
                @include( 'partials.login' )
            </li>
                {{ Form::close() }}
            @endif
             </ul>
          </li>
        </ul>
      </div>
    </div>
</nav><!-- /.navbar -->

<header class="masthead">
  <div class="container">
    <div class="row">
      <div class="col col-sm-6">
        <h1><a href="#" title="scroll down for your viewing pleasure">Planners BD</a>
          <p class="lead">2-column Layout + Theme for Bootstrap 3</p></h1>
      </div>
      <div class="col col-sm-6">
        <div class="well pull-right">
          <img src="//placehold.it/280x100/E7E7E7">
        </div>
      </div>
    </div>
  </div>

  <div class="container">
  <div class="row">
      <div class="col col-sm-12">

        <div class="panel">
        <div class="panel-body">
            @if( ! empty($status) ) </p>{{ $status }}</p> @endif
            @if( ! empty($error) ) <p>ERROR:{{ $error }}</p> @endif
            <span class="glyphicon glyphicon-heart-empty"></span>
        </div>
        </div>

      </div>
    </div>
  </div>
</header>

<!-- Begin Body -->
<div class="container">
  <div class="row">
        <div class="col col-sm-3">
        @section( 'leftpanel' )
                <div id="sidebar">
            <ul class="nav nav-stacked">
                    <li><h3 class="highlight">Channels <i class="glyphicon glyphicon-dashboard pull-right"></i></h3></li>
                    <li><a href="#">Link</a></li>
                <li><a href="#">Link</a></li>
            </ul>
                <div class="accordion" id="accordion2">
                    <div class="accordion-group">
                        <div class="accordion-heading">
                            <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                Accordion
                            </a>
                        </div>
                        <div id="collapseOne" class="accordion-body collapse in">
                            <div class="accordion-inner">
                              <p>There is a lot to be said about RWD.</p>
                            </div>
                        </div>
                    </div>
                </div>
               </div>
            @show
          </div>

          <div class="col col-sm-9">
            @yield( 'content' )
        </div>
    </div>
</div>


    @section( 'footsection' )
      <!-- script references -->
        {{-- HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js') --}}
        {{ HTML::script('js/libs/jquery-1.7.2.min.js') }}

        {{-- HTML::script('https://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js') --}}
        {{ HTML::script('js/libs/bootstrap/bootstrap.min.js') }}
        {{ HTML::script('js/libs/bootstrap/scripts.js') }}
        {{ HTML::script('js/plannerbd.js') }}
    @show

    @if ( ! $currentUser )
        @include('partials.modal-password-reminder')
    @endif
  </body>
</html>

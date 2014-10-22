<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="A layout example with a side menu that hides on mobile, just like the Pure website.">

    <title>Side Menu &ndash; Layout Examples &ndash; Pure</title>


    {{ HTML::style('/css/pure/pure-min.css') }}

    <!--[if lte IE 8]>
        {{ HTML::style('/css/pure/side-menu-old-ie.css') }}
    <![endif]-->
    <!--[if gt IE 8]><!-->
        {{ HTML::style('/css/pure/side-menu.css') }}
    <!--<![endif]-->
    @section('headsection')

<!--[if lt IE 9]>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7/html5shiv.js"></script>
<![endif]-->

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">

</head>
<body>


<div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
        <!-- Hamburger icon -->
        <span></span>
    </a>

    <div id="menu">
        <div class="pure-menu pure-menu-open">
            <a class="pure-menu-heading" href="#">Bazana</a>

            <ul>
                <li><a href="#" class="pure-menu-selected">Gana</a></li>
                <li><a href="#" >About</a></li>

                <li class="menu-item-divided ">
                    <a href="#">Services</a>
                </li>

                <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </div>

    <div id="main">
        <div class="header">
            <h1>Page Title</h1>
            <h2>A subtitle for your page goes here</h2>
            <div class="pure-g">
                <div class="pure-u-1-1">
                    @if( Auth::check() )
                        <Label>{{ Auth::user()->email }}</Label>
                    @else
                          @if( Auth::check() )
                            <Label class="pure-u-1-4">{{ Auth::user()->name }}</Label>
                            <a href="/logout"><button>Logout</button></a>
                          @else
                            @include('layouts.forms.login')
                          @endif
                    @endif

                </div>
            </div>
        </div>

        <div class="content">
            @yield('content')
        </div>
    </div>
</div>


    {{ HTML::script('js/libs/jquery-1.10.2.js') }}
    {{ HTML::script('js/libs/handlebars-1.1.2.js') }}
    {{ HTML::script('js/libs/ember-1.5.0.js') }}

    {{ HTML::script('/js/ui.js') }}
    {{ HTML::script('js/app.js') }}

@yield('footsection')


</body>
</html>

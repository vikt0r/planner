<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ember Starter Kit</title>
    {{ HTML::style('css/normalize.css') }}
    {{ HTML::style('css/style.css') }}
    {{ HTML::style('css/bootstrap.min.css') }}
</head>
    <body>

        @include('layouts._partials.ember-navigation')
        @include('layouts._partials.ember-index')

        @include('layouts._partials.ember-artists-index')
        @include('layouts._partials.ember-artists')
        @include('layouts._partials.ember-artists-songs')


        {{ HTML::script('js/libs/jquery-1.10.2.js') }}
        {{ HTML::script('js/libs/handlebars-1.1.2.js') }}
        {{ HTML::script('js/libs/ember-1.5.1.js') }}
        {{ HTML::script('js/app.js') }}
      <!-- to activate the test runner, add the "?test" query string parameter -->
        {{-- HTML::script('tests/runner.js') --}}
    </body>
</html>


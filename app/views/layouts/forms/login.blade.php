
{{ Form::open( array( 'url'=>URL::to('user/login'), 'method'=>'post', 'id'=>'loginuser', 'class'=>'pure-form' ) ) }}
	<fieldset>
        <input name="email" type="email" placeholder="Email">
        <input name="password" type="password" placeholder="Password">

        <label for="remember">
            <input id="remember" type="checkbox"> Remember me
        </label>

        <button type="submit" class="pure-button pure-button-primary">Sign in</button>
    </fieldset>
	
{{ Form::close() }}

<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/


    public function pavilionIsLogin()
    {
        //load wordpress env
        define('WP_USE_THEMES', false);
        require base_path().'/public/pavilion360/wp-blog-header.php';
        wp();

        echo '<p>isLogin? '; var_dump(is_user_logged_in()); echo '</p>';
    }

    public function pavilionLogin()
    {
        //load wordpress env
        define('WP_USE_THEMES', false);
        require base_path().'/public/pavilion360/wp-blog-header.php';
        wp();

        $userdata = array(
            'user_login' => 'demouser',
            'user_password' => 'demopass'
        );
        $loginstatus = wp_signon($userdata );
        //echo '<p>User:<pre>'; var_dump(wp_get_current_user()); echo '</pre></p>';
    }

    public function pavilionLogout()
    {
        //load wordpress env
        define('WP_USE_THEMES', false);
        require base_path().'/public/pavilion360/wp-blog-header.php';
        wp();
        wp_logout();
    }

    public function pavilionCreateUser()
    {
        //load wordpress env
        define('WP_USE_THEMES', false);
        require base_path().'/public/pavilion360/wp-blog-header.php';
        wp();
        $username = 'demouser';
        $password = 'demopass';
        $email = 'demo@demo.com';

        $newuser = wp_create_user( $username, $password, $email );
        dd($newuser);
        echo 'create user';
    }



	public function showWelcome()
	{
		// echo 'jola';
		return View::make('index');
	}

	public function logoutUser()
	{

	}

	public function loginUser()
	{
		$loggedIn = Auth::attempt( array(
				'email' => Input::get('email'),
				'password' => Input::get('password')
			)
		);

		if(Auth::check())
			return Response::json(array('code' => 1, 'msg' => 'Login Success'));
		else
			return Response::json(array('code' => 0, 'msg' => 'Login Fail'));
	}

}

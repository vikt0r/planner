<?php

Route::get('/', function()
{

	return View::make('index');
});



/*
 * MEERKAT
 */

//Route::resource('kat', 'KatsController');
/*
 * END MEERKAT
 */



//RESOURCEFUL ROUTES
Route::resource('/artists', 'ArtistsController');
Route::resource('/album', 'AlbumsController');
//END RESOURCEFUL ROUTES

// PAVILION360
Route::resource('quizzes', 'QuizzesController');

Route::get('/pav/islogin', 'HomeController@pavilionIsLogin');
Route::get('/pav/login', 'HomeController@pavilionLogin');
Route::get('/pav/logout', 'HomeController@pavilionLogout');
// END PAVILION360


Route::post('/user/login', function(){
    $credential = array(
        'email' => Input::get('email'),
        'password' => Input::get('password')
    );
    $loggedIn = Auth::attempt( $credential );
    return $loggedIn;

		//if(Auth::check())
			//return Response::json(array('code' => 1, 'msg' => 'Login Success'));
		//else
			//return Response::json(array('code' => 0, 'msg' => 'Login Fail'));
});

Route::get('/logout', function(){
	Auth::logout();
	return Redirect::to('/');
});

Route::resource('gaan', 'GaansController' );
Route::resource('user', 'UsersController');

Route::get('/neat', function()
{
	return View::make('neat');
});





// Route::group( ['previx' => 'api/v1'], function()
//  {
// 	Route::resource('lessons', 'LessonsController');
// });

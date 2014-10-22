<?php
use Bazna\Repo\User\UserInterface;

class UsersController extends \BaseController {

	protected $user;

	public function __construct(UserInterface $user = null)
	{
		$this->user = ($user === null)? new UserInterface : $user;

		//filters
		$this->beforeFilter('csrf', array('on' => 'post'));
	}
	/**
	 * Display a listing of users
	 *
	 * @return Response
	 */
	public function index()
	{
		// echo 'user home page';
		$users = User::all();

		return View::make('users.index', compact('users'));
	}

	/**
	 * Show the form for creating a new user
	 *
	 * @return Response
	 */
	public function create()
	{
		// echo 'register user';
		return View::make('users.create');
	}

	/**
	 * Store a newly created user in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		// dd($input);
		$result = $this->user->create($input);
		if($result === 1)
			return Response::json(array('status'=>1, 'msg'=>'Registration Successfull'));
		else
			return Response::json(array('status'=>0, 'msg'=>'Failed to create'));
		// $validator = Validator::make($data = Input::all(), User::$rules);

		// if ($validator->fails())
		// {
		// 	return Redirect::back()->withErrors($validator)->withInput();
		// }

		// User::create($data);

		// return Redirect::route('users.index');
	}

	/**
	 * Display the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$user = User::findOrFail($id);

		return View::make('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified user.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$user = User::find($id);

		return View::make('users.edit', compact('user'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$user = User::findOrFail($id);

		$validator = Validator::make($data = Input::all(), User::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$user->update($data);

		return Redirect::route('users.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		User::destroy($id);

		return Redirect::route('users.index');
	}

}